@extends('layout.main')

@section('title', 'Balance - Jajan.in')

@section('content')
    <div id="loading" class="hidden fixed inset-0 bg-gray-800 bg-opacity-70 z-[999999]">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl">Please wait...
        </div>
    </div>
    <div>
        <p class="font-semibold text-3xl mb-3">My Balance</p>
        <div class="grid grid-cols-1 px-4 pt-3 xl:grid-cols-3 xl:gap-4">
            <div class="col-span-full xl:col-auto">
                <div class="p-5">
                    <p class="font-semibold text-xl text-primary">Saldo Aktif</p>
                    <div class="flex items-center gap-4 text-xl mt-4">
                        <p class="font-bold">Rp {{ number_format($balance, 0, ',', '.') }}</p>
                        <i class="bi bi-eye cursor-pointer"></i>
                    </div>
                    <button
                        class="border-2 border-secondary text-secondary text-xs px-4 py-1 rounded-full border-b-[6px] mt-4">
                        <i class="bi bi-cash-coin"></i>
                        Tarik Saldo
                    </button>
                    <p class="text-xs text-red-500 mt-1">tarik saldo comming soon</p>
                </div>
            </div>
            <div class="col-span-1">
                <div class="p-5">
                    <p class="font-semibold text-xl text-primary">Tujuan Penarikan Utama</p>
                    @if (!$bank)
                        <div class="bg-[#FFF5E3] text-blackText p-3 my-3 font-semibold text-sm">
                            Kamu belum mengatur akun rekening bank sebagai tujuan penarikan
                        </div>
                    @else
                        <div class="my-3">
                            <p class="font-semibold text-lg">{{ $bank->bank_name }} - {{ $bank->account_number }}</p>
                            <p class="font-semibold">({{ $bank->holder_name }})</p>
                        </div>
                    @endif
                    <p data-modal-target="add-bank" data-modal-toggle="add-bank"
                        class="text-primary mt-2 cursor-pointer hover:underline"><i class="bi bi-pencil-square mr-2"></i>
                        Ubah / Tambah Tujuan
                        Penarikan</p>
                </div>
            </div>
        </div>

        <div id="add-bank" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Ubah / Tambah Tujuan Penarikan
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="add-bank">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <span class="hidden" id="action">cek</span>
                        <div id="bank-alert"
                            class="hidden my-2 font-regular relative w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100"
                            data-dismissible="alert">
                            <div class="mr-12" id="msg-popup">Alert dismissible</div>
                            <div class="absolute top-2.5 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20"
                                data-dismissible-target="alert">
                                <button role="button" class="w-max rounded-lg p-1" data-alert-dimissible="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label for="number_rekening" class="block mb-2 text-sm font-medium text-gray-900">Nomor
                                    Rekening</label>
                                <input type="number" name="number_rekening" id="number_rekening"
                                    placeholder="Nomor Rekening"
                                    class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 outline-none"
                                    required>
                            </div>
                            <div>
                                <label for="bank" class="block mb-2 text-sm font-medium text-gray-900">Bank</label>
                                <select id="bank" name="bank"
                                    class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary border-2 focus:border-primary block w-full p-2.5 outline-none">
                                    <option value="" selected disabled>-- Please Select Bank --</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank['code'] }}" {{ $bank['can_disburse'] ? '' : 'disabled' }}>
                                            {{ $bank['name'] }}{{ $bank['can_disburse'] ? '' : ' (MAINTENANCE)' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="hidden space-y-4" id="rekening_data">
                                <div>
                                    <label for="rekening_name" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                        Pemilik Rekening</label>
                                    <input type="text" name="rekening_name" id="rekening_name"
                                        placeholder="Nama Pemilik Rekening"
                                        class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 outline-none"
                                        disabled required>
                                </div>
                                <div>
                                    <label for="bank_password"
                                        class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi
                                        Password</label>
                                    <input type="password" name="bank_password" id="bank_password" placeholder="••••••••"
                                        class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 outline-none"
                                        required>
                                </div>
                            </div>
                            <button type="submit" id="check_bank"
                                class="w-full text-white bg-primary hover:bg-primaryDark focus:ring-4 focus:outline-none focus:ring-primaryLight font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cek
                                Rekening Bank</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        var bankSelect = new Choices('#bank', {
            removeItemButton: true,
        });

        bankSelect.passedElement.element.addEventListener(
            'addItem',
            function(event) {
                console.log(event.detail.value);
            },
            false,
        );

        $('#check_bank').on('click', function() {
            $('#loading').removeClass('hidden');
            $('#bank-alert').addClass('hidden');
            const action = $('#action').text();

            if (action == 'cek') {
                $('#check_bank').text('Checking...');
                fetch("{{ route('api.balance.check-bank') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            bank_code: $('#bank').val(),
                            account_number: $('#number_rekening').val()
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        $('#loading').addClass('hidden');
                        if (data.status == 'error') {
                            $('#bank-alert').removeClass('hidden');
                            $('#bank-alert').removeClass('bg-green-500');
                            $('#bank-alert').addClass('bg-pink-500');
                            $('#msg-popup').text(data.message);
                            $('#check_bank').text('Cek Rekening Bank');
                        } else {
                            $('#action').text('save');
                            $('#bank-alert').removeClass('hidden');
                            $('#bank-alert').removeClass('bg-pink-500');
                            $('#bank-alert').addClass('bg-green-500');
                            $('#msg-popup').text('Rekening valid, konfirmasi password untuk menyimpan');
                            $('#rekening_data').removeClass('hidden');
                            $('#rekening_name').val(data.data);
                            $('#number_rekening').attr('disabled', true);
                            bankSelect.disable();
                            $('#bank_password').focus();
                            $('#check_bank').text('Simpan Rekening Bank');
                        }
                    });
            } else if ('save') {
                $('#check_bank').text('Menyimpan...');
                fetch("{{ route('api.balance.save-bank') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            bank_code: $('#bank').val(),
                            account_number: $('#number_rekening').val(),
                            account_name: $('#rekening_name').val(),
                            password: $('#bank_password').val()
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        $('#loading').addClass('hidden');
                        if (data.status == 'error') {
                            $('#bank-alert').removeClass('hidden');
                            $('#bank-alert').removeClass('bg-green-500');
                            $('#bank-alert').addClass('bg-pink-500');
                            $('#msg-popup').text(data.message);
                            $('#check_bank').text('Simpan Rekening Bank');
                        } else {
                            $('#bank-alert').removeClass('hidden');
                            $('#bank-alert').removeClass('bg-pink-500');
                            $('#bank-alert').addClass('bg-green-500');
                            $('#msg-popup').text('Rekening berhasil disimpan');
                            $('#check_bank').text('Cek Rekening Bank');
                            $('#action').text('cek');
                            $('#rekening_data').addClass('hidden');
                            $('#number_rekening').attr('disabled', false);
                            bankSelect.enable();
                            $('#bank').val('').trigger('change');
                            $('#number_rekening').val('');
                            $('#rekening_name').val('');
                            $('#bank_password').val('');
                            location.reload();
                        }
                    });
            }
        });
    </script>
@endsection
