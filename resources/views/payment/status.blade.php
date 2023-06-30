<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Pembayaran - Jajan.in</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body class="bg-[#F3F3F3] h-screen w-full grid place-items-center">
    <div class="bg-white p-10 rounded-lg shadow-lg">
        <div class="flex items-center gap-3">
            <div
                class="w-24 h-24 {{ $transaction->payment_status == 'paid' ? 'bg-[#3CD178]' : 'bg-secondary' }} flex justify-center items-center text-white rounded-full">
                <i
                    class="bi {{ $transaction->payment_status == 'paid' ? 'bi-check-lg' : 'bi-hourglass-bottom' }} text-[50px]"></i>
            </div>
            <div>
                <p
                    class="{{ $transaction->payment_status == 'paid' ? 'text-[#3CD178]' : 'text-secondary' }} font-bold text-2xl">
                    {{ $transaction->payment_status == 'paid' ? 'Pembayaran Berhasil' : 'Menunggu Pembayaran' }}</p>
                <p class="text-sm text-gray-400">
                    {{ $transaction->payment_status == 'paid' ? 'Dibayar ' . \Carbon\Carbon::create($transaction->updated_at)->format('d F Y, H:i:s') : 'Selesaikan sebelum' . \Carbon\Carbon::create($transaction->expired_at)->format('d F Y, H:i:s') }}
                </p>
            </div>
        </div>
        <div class="flex items-center justify-center gap-3 mt-4">
            <img src="{{ $transaction->page->user->getFirstMediaUrl('avatar') == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $transaction->page->user->name : $transaction->page->user->getFirstMediaUrl('avatar') }}"
                alt="ava"
                class="w-16 h-16 object-contain rounded-full border-2 {{ $transaction->payment_status == 'paid' ? 'border-[#3CD178]' : 'border-secondary' }}">
            <div>
                <p class="text-base text-gray-600 mb-3">{{ $transaction->payment_status == 'paid' ? 'Terima kasih sudah Jajanin ' : 'Selesaikan trakteeran untuk ' }} {{ $transaction->page->user->name }}
                    :)
                </p>
                @if ($transaction->payment_status == 'paid')
                    <a href="{{ route('page.creator', $transaction->page->user->username) }}"
                        class="bg-primary px-4 py-2 rounded-full shadow-lg font-semibold text-white cursor-pointer">
                        <i class="bi bi-repeat"></i>
                        Jajanin Lagi
                    </a>
                @else
                    <div class="flex items-center gap-2 mt-3">
                        <div onClick="window.location.reload();"
                            class="bg-[#E7E7E7] px-3 py-1 rounded-full shadow-lg font-semibold text-[#737373] cursor-pointer">
                            <i class="bi bi-arrow-clockwise"></i>
                            Refresh
                        </div>
                        <a href="{{ route('page.checkout', $transaction->transaction_no) }}"
                            class="bg-[#E7E7E7] px-3 py-1 rounded-full shadow-lg font-semibold text-[#737373] cursor-pointer">
                            <i class="bi bi-question-circle"></i>
                            Cara Bayar
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <hr class="w-full h-px my-8 bg-gray-300 border-0">
        <div class="flex justify-between items-center bg-primaryLight p-4 rounded-lg">
            <div>
                <div class="flex items-center gap-2">
                    <img src="{{ $transaction->unit->getFirstMediaUrl('unit') }}" alt="icon unit"
                        class="w-5 h-5 object-contain">
                    <p class="font-semibold">{{ $transaction->quantity }} {{ $transaction->unit->name }}</p>
                </div>
                <p class="text-sm mt-2">Rp {{ number_format($transaction->price, 0, ',', '.') }} x
                    {{ $transaction->quantity }}</p>
            </div>
            <p class="font-extrabold text-lg">Rp {{ number_format($transaction->total, 0, ',', '.') }}</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
            <div class="text-sm">
                <p>Tanggal Order</p>
                <p class="font-semibold">{{ \Carbon\Carbon::create($transaction->created_at)->format('d F Y, H:i:s') }}
                </p>
            </div>
            <div>
                <p>Metode</p>
                <p class="font-semibold">QRIS</p>
            </div>
        </div>
        <p class="text-sm mt-4">Order ID</p>
        <p class="font-semibold text-sm">{{ $transaction->transaction_no }}</p>
    </div>
</body>

</html>
