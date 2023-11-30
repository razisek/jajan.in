<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Transaction;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Services\XenditService;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'creator_id' => 'required|exists:pages,id',
            'quantity' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $page = Page::find($request->creator_id);
        $total = $page->unit->price * $request->quantity;
        $uuid = Str::uuid();

        $xenditService = new XenditService();

        $xendit = $xenditService->createQR($total, 'Jajanin untuk ' . $page->user->username . ' sebesar ' . $total . ' untuk ' . $request->quantity . ' ' . $page->unit->name);

        if ($xendit->getStatus() != 'PENDING') {
            return response()->json([
                'status' => 'error',
                'message' => 'Error generate payment'
            ], 500);
        }

        $page->transactions()->create([
            'payment_request_id' => $xendit->getId(),
            'payment_method_id' => $xendit->getPaymentMethod()->getId(),
            'reference_id' => $xendit->getReferenceId(),
            'invoice_no' => 'JJN-' . time() . $page->id,
            'payment_method' => 'QRIS',
            'payment_status' => 'PENDING',
            'user_id' => auth()->user()->id,
            'message' => $request->message,
            'unit_id' => $page->unit_id,
            'name' => $request->display_name,
            'email' => auth()->user()->email,
            'quantity' => $request->quantity,
            'is_anonymous' => $request->anonymous,
            'price' => $page->unit->price,
            'total' => $total,
            'qr' => $xendit->getPaymentMethod()->getQRCode()->getChannelProperties()->getQRString(),
            'expired_at' => $xendit->getPaymentMethod()->getQRCode()->getChannelProperties()->getExpiresAt(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Success generate payment',
            'redirect_url' => route('page.checkout', $xendit->getId())
        ], 200);
    }

    public function notification(Request $request)
    {
        file_get_contents('https://api.telegram.org/bot676746656:AAFyAvp391W3IHW8x55mz1iNFJ2hBA_XC-0/sendMessage?chat_id=466992772&text=' . json_encode($request->all()));
        if ($request->data['status'] == 'SUCCEEDED') {
            $transaction = Transaction::where('payment_request_id', $request->data['payment_request_id'])->firstOrFail();
            $transaction->update([
                'payment_status' => 'SUCCEEDED'
            ]);

            $transaction->page->balance()->update(
                [
                    'balance' => $transaction->page->balance->balance + $transaction->total
                ]
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Payment success'
            ], 200);
        } else if ($request->data['status'] == 'EXPIRED') {
            $transaction = Transaction::where('payment_request_id', $request->data['payment_request_id'])->firstOrFail();
            $transaction->update([
                'payment_status' => 'EXPIRED'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Payment expired'
            ], 200);
        } else if ($request->data['status'] == 'FAILED') {
            $transaction = Transaction::where('payment_request_id', $request->data['payment_request_id'])->firstOrFail();
            $transaction->update([
                'payment_status' => 'CANCELED'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Payment cancel'
            ], 200);
        }
    }

    public function checkout(string $transaction)
    {
        $transaction = Transaction::where('payment_request_id', $transaction)->firstOrFail();

        if ($transaction->payment_status != 'PENDING') {
            return redirect()->route('page.payment-status', $transaction->payment_request_id);
        }

        $qr =  Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($transaction->qr)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->backgroundColor(new Color(212, 200, 233, 1))
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->logoPath(public_path('image/qris.png'))
            ->logoResizeToWidth(150)
            ->logoPunchoutBackground(true)
            ->validateResult(false)
            ->build();

        $qris = $qr->getDataUri();

        return view('payment.checkout', compact('transaction', 'qris'));
    }

    public function paymentStatus(string $transaction)
    {
        $transaction = Transaction::where('payment_request_id', $transaction)->firstOrFail();

        return view('payment.status', compact('transaction'));
    }
}
