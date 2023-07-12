@extends('layout.main')

@section('title', 'Support Anonim')

@section('content')
    <div>
        <div class="border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
                <li class="mr-2">
                    <a href="{{ route('page.support.user') }}"
                        class="inline-flex p-4 border-b-2 rounded-t-lg group hover:text-primary">
                        <i class="bi bi-person-fill mr-2"></i>User
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('page.support.anonim') }}"
                        class="inline-flex p-4 border-b-2 rounded-t-lg group text-primary border-primary">
                        <i class="bi bi-person-fill-x mr-2"></i>Anonim
                    </a>
                </li>
            </ul>
        </div>
        <div class="relative overflow-x-auto mt-6">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-sm text-black bg-gray-100 font-bold">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-l-lg">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Invoice No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pesan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Waktu
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($transactions->count() == 0)
                        <tr>
                            <th colspan="5" class="text-center">
                                Tidak ada data
                            </th>
                        </tr>
                    @else
                        @foreach ($transactions as $key => $trans)
                            <tr class="bg-white">
                                <th scope="row" class="px-6 py-4">
                                    {{ ++$key }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $trans->invoice_no }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($trans->total, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $trans->message ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::create($trans->expired_at)->format('d F Y H:i') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-[#3CD278] bg-green-100 rounded-full">
                                        Success
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
