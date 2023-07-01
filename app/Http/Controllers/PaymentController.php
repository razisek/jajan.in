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
use Illuminate\Support\Facades\Http;

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

        $midtrans = Http::withBasicAuth(env('SERVER_KEY_MIDTRANS'), '')->post(env('SANDBOX_MIDTRANS') . 'v2/charge', [
            "payment_type" => "qris",
            "transaction_details" => [
                "order_id" => $uuid,
                "gross_amount" => $total
            ],
            "qris" => [
                "acquirer" => "gopay"
            ]
        ]);

        $response = $midtrans->json();

        if (!$response['status_code'] == 201) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error generate payment'
            ], 500);
        }

        $page->transactions()->create([
            'transaction_no' => $response['transaction_id'],
            'invoice_no' => 'JJN-' . time() . $page->id,
            'payment_method' => 'qris',
            'payment_status' => 'pending',
            'user_id' => auth()->user()->id,
            'message' => $request->message,
            'unit_id' => $page->unit_id,
            'name' => $request->display_name,
            'email' => auth()->user()->email,
            'quantity' => $request->quantity,
            'is_anonymous' => $request->anonymous,
            'price' => $page->unit->price,
            'total' => $total,
            'qr' => $response['qr_string'],
            'link_qr' => $response['actions'][0]['url'],
            'expired_at' => $response['expiry_time'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Success generate payment',
            'redirect_url' => route('page.checkout', $response['transaction_id'])
        ], 200);
    }

    public function notification(Request $request)
    {
        if ($request->transaction_status == 'settlement') {
            $transaction = Transaction::where('transaction_no', $request->transaction_id)->firstOrFail();
            $transaction->update([
                'payment_status' => 'paid'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Payment success'
            ], 200);
        } else if ($request->transaction_status == 'expire') {
            $transaction = Transaction::where('transaction_no', $request->transaction_id)->firstOrFail();
            $transaction->update([
                'payment_status' => 'expired'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Payment expired'
            ], 200);
        } else if ($request->transaction_status != 'settlement' || $request->transaction_status != 'expire' || $request->transaction_status != 'pending') {
            $transaction = Transaction::where('transaction_no', $request->transaction_id)->firstOrFail();
            $transaction->update([
                'payment_status' => 'cancel'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Payment cancel'
            ], 200);
        }
    }

    public function checkout(string $transaction)
    {
        $transaction = Transaction::where('transaction_no', $transaction)->firstOrFail();

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
        $transaction = Transaction::where('transaction_no', $transaction)->firstOrFail();

        return view('payment.status', compact('transaction'));
    }
}
