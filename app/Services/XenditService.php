<?php

namespace App\Services;

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
}
