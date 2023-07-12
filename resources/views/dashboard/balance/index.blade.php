@extends('layout.main')

@section('title', 'Balance - Jajan.in')

@section('content')
    <div>
        <p class="font-semibold text-3xl mb-3">My Balance</p>
        <div class="flex items-center">
            <div class="p-5 w-4/12">
                <p class="font-semibold text-xl text-primary">Saldo Aktif</p>
                <div class="flex items-center gap-4 text-xl mt-4">
                    <p class="font-bold">Rp {{ number_format($balance, 0, ',', '.') }}</p>
                    <i class="bi bi-eye cursor-pointer"></i>
                </div>
                <button class="border-2 border-secondary text-secondary text-xs px-4 py-1 rounded-full border-b-[6px] mt-4">
                    <i class="bi bi-cash-coin"></i>
                    Tarik Saldo
                </button>
            </div>
            <div class="p-5 w-8/12">
                <p class="font-semibold text-xl text-primary">Tujuan Penarikan Utama</p>
                <p class="text-xl font-bold mt-4">-</p>
                <p class="font-bold mt-2">-</p>
                <p class="text-primary mt-2 cursor-pointer"><i class="bi bi-pencil-square mr-2"></i> Ubah / Tambah Tujuan
                    Penarikan</p>
            </div>
        </div>
    </div>
@endsection
