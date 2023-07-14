@extends('layout.main')

@section('title', 'Dashboard')
@section('content')
    <div class="p-2">
        <p class="font-semibold text-xl">Overview</p>
        <p class="text-md pt-2">Berikut adalah informasi tentang semua Jajanin Anda</p>
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow mt-8 grid grid-cols-4 divide-x-2">
            <div class="pl-6">
                <p class="font-semibold text-primary text-2xl">Rp {{ number_format($balance, 0, ',', '.') }}</p>
                <p class="text-secondary text-md pt-2">Jumlah saldo saat ini</p>
            </div>
            <div class="pl-6">
                <p class="font-semibold text-primary text-2xl">{{ $transactions }} Supporter</p>
                <p class="text-secondary text-md pt-2">Jumlah support saat ini</p>
            </div>
            <div class="pl-6">
                <p class="font-semibold text-primary text-2xl">{{ $posts }} Post</p>
                <p class="text-secondary text-md pt-2">Jumlah post saat ini</p>
            </div>
            <div class="pl-6">
                <p class="font-semibold text-primary text-2xl">{{ $unit->name }} - Rp {{ number_format($unit->price, 0, ',', '.') }}</p>
                <p class="text-secondary text-md pt-2">Unit aktif</p>
            </div>
        </div>
    </div>
@endsection
