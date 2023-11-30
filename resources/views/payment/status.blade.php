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
            @if ($transaction->payment_status == 'SUCCEEDED')
                <div class="w-24 h-24 bg-[#3CD178] flex justify-center items-center text-white rounded-full">
                    <i class="bi bi-check-lg text-[50px]"></i>
                </div>
                <div>
                    <p class="text-[#3CD178] font-bold text-2xl">
                        Pembayaran Berhasil</p>
                    <p class="text-sm text-gray-400">
                        Dibayar {{ \Carbon\Carbon::create($transaction->updated_at)->format('d F Y, H:i:s') }}
                    </p>
                </div>
            @elseif ($transaction->payment_status == 'PENDING')
                <div class="w-24 h-24 bg-secondary flex justify-center items-center text-white rounded-full">
                    <i class="bi bi-hourglass-bottom text-[50px]"></i>
                </div>
                <div>
                    <p class="text-secondary font-bold text-2xl">
                        Menunggu Pembayaran</p>
                    <p class="text-sm text-gray-400">
                        Selesaikan sebelum
                        {{ \Carbon\Carbon::create($transaction->expired_at)->format('d F Y, H:i:s') }}
                    </p>
                </div>
            @elseif ($transaction->payment_status == 'cancel')
                <div class="w-24 h-24 bg-red-600 flex justify-center items-center text-white rounded-full">
                    <i class="bi bi-x-octagon text-[50px]"></i>
                </div>
                <div>
                    <p class="text-red-600 font-bold text-2xl">
                        Pembayaran Dibatalkan</p>
                    <p class="text-sm text-gray-400">
                        Dibatalkan
                        {{ \Carbon\Carbon::create($transaction->updated_at)->format('d F Y, H:i:s') }}
                    </p>
                </div>
            @elseif ($transaction->payment_status == 'expired')
                <div class="w-24 h-24 bg-gray-500 flex justify-center items-center text-white rounded-full">
                    <i class="bi bi-clock-history text-[50px]"></i>
                </div>
                <div>
                    <p class="text-gray-500 font-bold text-2xl">
                        Pembayaran Kadaluarsa</p>
                    <p class="text-sm text-gray-400">
                        Kadaluarsa
                        {{ \Carbon\Carbon::create($transaction->expired_at)->format('d F Y, H:i:s') }}
                    </p>
                </div>
            @endif
        </div>
        <div class="flex items-center justify-between mx-5 gap-3 mt-4">
            @if ($transaction->payment_status == 'SUCCEEDED')
                <img src="{{ $transaction->page->user->getFirstMediaUrl('avatar') == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $transaction->page->user->name : $transaction->page->user->getFirstMediaUrl('avatar') }}"
                    alt="ava" class="w-16 h-16 object-contain rounded-full border-2 border-[#3CD178]">
            @elseif ($transaction->payment_status == 'PENDING')
                <img src="{{ $transaction->page->user->getFirstMediaUrl('avatar') == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $transaction->page->user->name : $transaction->page->user->getFirstMediaUrl('avatar') }}"
                    alt="ava" class="w-16 h-16 object-contain rounded-full border-2 border-secondary">
            @elseif ($transaction->payment_status == 'cancel')
                <img src="{{ $transaction->page->user->getFirstMediaUrl('avatar') == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $transaction->page->user->name : $transaction->page->user->getFirstMediaUrl('avatar') }}"
                    alt="ava" class="w-16 h-16 object-contain rounded-full border-2 border-red-600">
            @elseif ($transaction->payment_status == 'expired')
                <img src="{{ $transaction->page->user->getFirstMediaUrl('avatar') == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $transaction->page->user->name : $transaction->page->user->getFirstMediaUrl('avatar') }}"
                    alt="ava" class="w-16 h-16 object-contain rounded-full border-2 border-gray-500">
            @endif
            <div>
                @if ($transaction->payment_status == 'SUCCEEDED')
                    <p class="text-base text-gray-600 mb-3">
                        Terima kasih sudah Jajanin {{ $transaction->page->user->name }} :)
                    </p>
                    <a href="{{ route('page.creator', $transaction->page->user->username) }}"
                        class="bg-primary px-4 py-2 rounded-full shadow-lg font-semibold text-white cursor-pointer">
                        <i class="bi bi-repeat"></i>
                        Jajanin Lagi
                    </a>
                @elseif ($transaction->payment_status == 'PENDING')
                    <p class="text-base text-gray-600 mb-3">
                        Selesaikan jajanin untuk {{ $transaction->page->user->name }} :)
                    </p>
                    <div class="flex items-center gap-2 mt-3">
                        <div onClick="window.location.reload();"
                            class="bg-[#E7E7E7] px-3 py-1 rounded-full shadow-lg font-semibold text-[#737373] cursor-pointer">
                            <i class="bi bi-arrow-clockwise"></i>
                            Refresh
                        </div>
                        <a href="{{ route('page.checkout', $transaction->payment_request_id) }}"
                            class="bg-[#E7E7E7] px-3 py-1 rounded-full shadow-lg font-semibold text-[#737373] cursor-pointer">
                            <i class="bi bi-question-circle"></i>
                            Cara Bayar
                        </a>
                    </div>
                @elseif ($transaction->payment_status == 'cancel')
                    <p class="text-base text-gray-600 mb-3">
                        Yah, Gagal Jajanin {{ $transaction->page->user->name }} :(
                    </p>
                    <a href="{{ route('page.creator', $transaction->page->user->username) }}"
                        class="bg-primary px-4 py-2 rounded-full shadow-lg font-semibold text-white cursor-pointer">
                        <i class="bi bi-repeat"></i>
                        Jajanin Lagi
                    </a>
                @elseif ($transaction->payment_status == 'expired')
                    <p class="text-base text-gray-600 mb-3">
                        Yah, Gagal Pembayaran Jajanin {{ $transaction->page->user->name }} :(
                    </p>
                    <a href="{{ route('page.creator', $transaction->page->user->username) }}"
                        class="bg-primary px-4 py-2 rounded-full shadow-lg font-semibold text-white cursor-pointer">
                        <i class="bi bi-repeat"></i>
                        Jajanin Lagi
                    </a>
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
        <p class="text-sm mt-4">Reference ID</p>
        <p class="font-semibold text-sm">{{ $transaction->reference_id }}</p>
    </div>
</body>

</html>
