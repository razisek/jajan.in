<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout - Jajan.in</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body class="bg-[#F3F3F3] h-screen w-full grid place-items-center">
    <div class="bg-white p-10 rounded-lg shadow-lg">
        <div class="flex flex-col items-center">
            <div class="flex items-center gap-3 font-semibold text-xl mt-2">
                <i class="bi bi-qr-code"></i>
                <p>Pembayaran dengan Scan QRIS</p>
            </div>
            <p class="mt-6">Scan QR Code menggunakan aplikasi bank/ewallet</p>
            <p class="text-sm underline italic font-medium mt-4">Bayar sebelum
                {{ \Carbon\Carbon::create($transaction->expired_at)->format('d F Y H:i:s') }}</p>
            <img src="{{ $qris }}" alt="qris_qr" class="mt-4 rounded-lg">
            <a href="{{ $transaction->link_qr }}" target="_blank" class="border-b-[6px] border-2 cursor-pointer mt-4 p-2 text-sm rounded-sm border-[#38C516] text-[#38C516] hover:text-white hover:bg-[#38C516] hover:border-b-2 hover:border-t-[6px] transition-all duration-300">
                Unduh QR Code
            </a>
        </div>
        <p class="font-semibold text-base mt-6">Pembayaran untuk:</p>
        <p class="text-sm font-semibold text-[#666666]">Dukungan {{ $transaction->quantity }}
            {{ $transaction->unit->name }} untuk
            {{ $transaction->page->user->name }} senilai Rp {{ number_format($transaction->total, 0, ',', '.') }}</p>

        <div class="p-3 bg-primaryLight mt-6 rounded-lg">
            <p class="font-bold test-base">Perhatian!</p>
            <p class="text-sm">QR Code di atas hanya dapat digunakan untuk 1x transaksi</p>
        </div>
        <a href="{{ route('page.payment-status', $transaction->transaction_no) }}">
            <div
                class="bg-primary text-white px-4 py-2 text-center font-semibold text-base rounded-full mt-4 cursor-pointer">
                Periksa Status Pembayaran
            </div>
        </a>
    </div>
</body>

</html>
