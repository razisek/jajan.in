<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Xendit\Configuration;
use Xendit\PaymentRequest\PaymentRequestApi;
use Xendit\PaymentRequest\PaymentRequestParameters;
use Xendit\PaymentRequest\PaymentRequestCurrency;
use Xendit\PaymentRequest\PaymentMethodParameters;
use Xendit\PaymentRequest\PaymentMethodType;
use Xendit\PaymentRequest\PaymentMethodReusability;
use Xendit\PaymentRequest\QRCodeParameters;
use Xendit\PaymentRequest\QRCodeChannelCode;

class XenditService
{
    private $prApiInstance;

    function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_API_KEY'));
        $this->prApiInstance = new PaymentRequestApi();
    }

    public function createQR(int $amount, string $description)
    {
        $QrParam = new PaymentRequestParameters([
            'amount' => $amount,
            'currency' => PaymentRequestCurrency::IDR,
            'payment_method' => new PaymentMethodParameters([
                'type' => PaymentMethodType::QR_CODE,
                'reusability' => PaymentMethodReusability::ONE_TIME_USE,
                'qr_code' => new QRCodeParameters([
                    "channel_code" => QRCodeChannelCode::DANA,
                ]),
            ]),
            "description" => $description,
            'metadata' => [
                "foo" => "bar"
            ],
        ]);
        $response = $this->prApiInstance->createPaymentRequest(
            null,
            null,
            $QrParam
        );

        return $response;
    }

    public function getAvailableBanks()
    {
        $request = Http::withBasicAuth(env('XENDIT_API_KEY'), '')
            ->get('https://api.xendit.co/available_disbursements_banks');

        $banks = $request->json();
        return $banks;
    }

    private function apiValidateBankAccout(string $number, string $bank)
    {
        $request = Http::withBasicAuth(env('XENDIT_API_KEY'), '')
            ->post('https://api.xendit.co/bank_account_data_requests', [
                'bank_account_number' => $number,
                'bank_code' => $bank
            ]);

        $bank = $request->json();

        return $bank;
    }

    public function validateBankAccount(string $number, string $bank)
    {
        $bankApi = $this->apiValidateBankAccout($number, $bank);

        if (!isset($bankApi['status'])) {
            return [
                'status' => 'ERROR',
                'message' => 'Nomor rekening bank penerima tidak valid'
            ];
        }

        while ($bankApi['status'] == 'PENDING') {
            sleep(5);
            $bankApi = $this->apiValidateBankAccout($number, $bank);
            if ($bankApi['status'] != 'PENDING') {
                break;
            }
        }

        return $bankApi;
    }
}
