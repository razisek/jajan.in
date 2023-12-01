<?php

namespace App\Http\Controllers;

use App\Services\XenditService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BalanceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $balance = $user->page->balance->balance ?? 0;
        $bank = $user->page->bank;

        $xendit = new XenditService();
        $banks = $xendit->getAvailableBanks();

        return view('dashboard.balance.index', compact('balance', 'banks', 'bank'));
    }

    public function checkAccountBank(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_code' => 'required',
            'account_number' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $bank = $request->bank_code;
        $account_number = $request->account_number;

        $xendit = new XenditService();
        $response = $xendit->validateBankAccount($account_number, $bank);

        if ($response['status'] === 'SUCCESS') {
            return response()->json([
                'status' => 'success',
                'message' => 'Nomor rekening valid',
                'data' => $response['bank_account_holder_name'],
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Nomor rekening tidak valid',
            ], 422);
        }
    }

    public function saveBankAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_code' => 'required',
            'account_number' => 'required|numeric',
            'account_name' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $user = auth()->user();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Password yang kamu masukan salah',
            ], 422);
        }

        $xendit = new XenditService();
        $listBanks = $xendit->getAvailableBanks();

        $indexBank = array_search($request->bank_code, array_column($listBanks, 'code'));

        if ($indexBank === false) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bank tidak tersedia',
            ], 422);
        } else {
            $user->page->bank()->create([
                'bank_code' => $request->bank_code,
                'account_number' => $request->account_number,
                'holder_name' => $request->account_name,
                'bank_name' => $listBanks[$indexBank]['name'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menyimpan data bank',
            ], 200);
        }
    }
}
