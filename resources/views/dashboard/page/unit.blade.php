@extends('layout.main')

@section('title', 'Manage Jajanin Unit')

@section('content')
    <div>
        <div id="loading" class="hidden fixed inset-0 bg-gray-800 bg-opacity-70 z-50">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl">Please
                Wait...
            </div>
        </div>
        <p class="font-semibold text-3xl mb-3">Edit Page Information</p>
        <div class="border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="mr-2">
                    <a href="{{ route('page.page.index') }}"
                        class="inline-flex p-4 border-b-2 rounded-t-lg group hover:text-primary">
                        <i class="bi bi-grid-1x2-fill mr-2"></i>Profile Page
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('page.unit.index') }}"
                        class="inline-flex p-4 border-b-2 rounded-t-lg group text-primary border-primary">
                        <i class="bi bi-coin mr-2"></i>Unit Jajanin
                    </a>
                </li>
            </ul>
        </div>
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
            <p class="text-center font-semibold text-xl pt-8 pb-6">Pilih unit jajanin sesuai dengan yang kamu mau</p>
            @if (\Session::has('error'))
                <div
                    class="font-regular relative my-4 block w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100">
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <div id="page-alert"
                class="hidden my-4 font-regular relative w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100"
                data-dismissible="alert">
                <div class="mr-12" id="msg">Alert dismissible</div>
                <div class="absolute top-2.5 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20"
                    data-dismissible-target="alert">
                    <button role="button" class="w-max rounded-lg p-1" data-alert-dimissible="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex gap-4 justify-center flex-wrap">
                @foreach ($units as $unit)
                    <div data-id="{{ $unit['id'] }}" id="unit{{ $unit['id'] }}"
                        class="relative h-48 justify-center border-2 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40 {{ $unit['id'] == auth()->user()->page->unit_id ? 'border-primary' : '' }}"
                        onclick="selectCard('unit{{ $unit['id'] }}')">
                        @if ($unit['id'] == auth()->user()->page->unit_id)
                            <p
                                class="absolute top-2 left-2 text-primary px-2 py-px rounded-md text-xs text bg-primaryLight">
                                Unit
                                Aktif</p>
                        @endif
                        <img src="{{ $unit['icon'] }}" alt="icon" class="h-12 w-12 object-contain">
                        <p class="font-medium text-lg mt-3">{{ $unit['name'] }}</p>
                        <p class="text-[#A8A8A8] text-sm font-medium">Rp
                            {{ number_format($unit['price'], 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
            <div class="flex gap-4 justify-center flex-wrap mt-4">
                @foreach ($pageUnits as $unit)
                    <div data-id="{{ $unit['id'] }}" id="unit{{ $unit['id'] }}"
                        class="relative h-48 justify-center border-2 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40 {{ $unit['id'] == auth()->user()->page->unit_id ? 'border-primary' : '' }}"
                        onclick="selectCard('unit{{ $unit['id'] }}')">
                        @if ($unit['id'] == auth()->user()->page->unit_id)
                            <p
                                class="absolute top-2 left-2 text-primary px-2 py-px rounded-md text-xs text bg-primaryLight">
                                Unit
                                Aktif</p>
                        @endif
                        @if ($unit['id'] != auth()->user()->page->unit_id)
                            <p onclick="confirmModalDeleteUnit('{{ $unit['id'] }}')"
                                class="absolute -top-2 -right-2 text-xl text-[#939393] hover:text-red-600 z-30"><i
                                    class="bi bi-x-circle"></i></p>
                        @endif
                        <img src="{{ $unit['icon'] }}" alt="icon" class="h-12 w-12 object-contain">
                        <p class="font-medium text-lg mt-3">{{ $unit['name'] }}</p>
                        <p class="text-[#A8A8A8] text-sm font-medium">Rp
                            {{ number_format($unit['price'], 0, ',', '.') }}</p>
                    </div>
                @endforeach
                @for ($i = 0; $i < 5 - count($pageUnits); $i++)
                    <div id="add-unit"
                        class="relative h-48 justify-center border-4 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40 border-dashed">
                        <i class="bi bi-plus-circle-fill text-5xl text-[#747474]"></i>
                        <p class="text-[#A8A8A8] text-sm font-medium mt-2">Buat Unitmu!</p>
                    </div>
                @endfor
            </div>
            <div class="text-center">
                <button id="save-unit"
                    class="bg-secondary py-2 px-4 rounded-full text-white shadow-lg my-12 font-bold text-sm">
                    <i class="fa-solid fa-floppy-disk mr-3"></i>
                    Save Changes
                </button>
            </div>
        </div>
        <div id="modal-unit" class="fixed hidden inset-0 bg-gray-800 bg-opacity-70 z-40 transition-all duration-300">
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-2xl transition-all duration-300">
                <div class="relative max-h-full transition-all duration-300">
                    <div class="bg-white p-4 rounded-md">
                        <div class="w-[600px] flex justify-between items-center font-semibold">
                            <p class="text-lg">Kelola Unit</p>
                            <i id="modal-close" class="bi bi-x-lg cursor-pointer"></i>
                        </div>
                        <hr class="w-full h-px my-4 bg-gray-300 border-0">
                        <div id="unit-alert"
                            class="hidden mt-4 font-regular relative w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100"
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
                        <div class="p-6">
                            <div class="flex items-center">
                                <p class="text-base font-medium w-1/5">Nama Unit</p>
                                <input type="text" placeholder="Nama"
                                    class="w-4/5 border text-base border-gray-300 rounded-md px-3 py-2 placeholder-primaryLight focus:border-primary focus:border-1 outline-none">
                            </div>
                            <div class="flex items-center mt-5">
                                <p class="text-base font-medium w-1/5">Harga Unit</p>
                                <div class="w-4/5">
                                    <div class="relative flex flex-wrap items-stretch">
                                        <span
                                            class="flex items-center whitespace-nowrap bg-primaryLight border border-primaryLight rounded-l-md border-r-0 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-black"
                                            id="basic-addon3">Rp</span>
                                        <input type="number" min="1000" max="500000" value="5000"
                                            class="border text-base relative m-0 block w-[1px] min-w-0 flex-auto border-gray-300 rounded-r-md px-4 py-2 focus:border-primary focus:border-1 outline-none ">
                                    </div>
                                    <p class="text-xs py-1">Minimal: Rp 1.000 | Maximal: Rp 500.000</p>
                                </div>
                            </div>
                            <div class="flex items-center mt-5">
                                <p class="text-base font-medium w-1/5">Gambar Unit</p>
                                <div class="w-4/5 flex items-center gap-2">
                                    <div id="icon-preview"
                                        class="border-2 rounded-lg border-primaryLight w-20 h-16 flex justify-center items-center">
                                    </div>
                                    <input id="iconInput" type="file" name="icon" accept="image/*"
                                        class="border w-full text-base border-gray-300 rounded-md px-3 py-2 placeholder-primaryLight focus:border-primary focus:border-1 outline-none">
                                </div>
                            </div>
                            <button id="submit-unit"
                                class="w-44 bg-secondary text-white py-2 rounded-full shadow-lg mt-6 font-bold text-sm">
                                Tambah Unit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const addUnit = document.querySelectorAll('#add-unit');
        const modalUnit = document.querySelector('#modal-unit');
        const modalClose = document.querySelector('#modal-close');
        let id = {{ auth()->user()->page->unit_id ?? 0 }};

        modalClose.addEventListener('click', function() {
            modalUnit.classList.add('hidden');
        });

        addUnit.forEach(function(unit) {
            unit.addEventListener('click', function() {
                modalUnit.classList.remove('hidden');
            });
        });

        const selectCard = function(selectedCard) {
            const cards = document.querySelectorAll('[id^="unit"]');
            cards.forEach(function(card) {
                if (card.id === selectedCard) {
                    id = card.dataset.id;
                    card.classList.add('border-primary');
                } else {
                    card.classList.remove('border-primary');
                }
            });
        }

        const iconInput = document.getElementById('iconInput');
        iconInput.addEventListener('change', (e) => {
            const image = document.createElement('img');
            const file = e.target.files[0];
            const url = URL.createObjectURL(file);
            image.src = url;
            image.classList.add('h-12', 'w-12', 'rounded-md');
            const container = document.getElementById('icon-preview');
            container.innerHTML = '';
            container.appendChild(image);
        });

        $('#submit-unit').on('click', function() {
            $('#loading').removeClass('hidden');
            $('#unit-alert').addClass('hidden');
            const name = $('input[placeholder="Nama"]').val();
            const price = $('input[type="number"]').val();
            const icon = $('#iconInput').prop('files')[0];
            const formData = new FormData();
            formData.append('name', name);
            formData.append('price', price);
            formData.append('icon', icon);

            fetch("{{ route('page.unit.store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    $('#loading').addClass('hidden');
                    if (data.status == 'error') {
                        $('#unit-alert').removeClass('hidden');
                        $('#msg-popup').html(data.message);
                    } else {
                        $('#unit-alert').removeClass('hidden');
                        $('#unit-alert').removeClass('bg-pink-500');
                        $('#unit-alert').addClass('bg-green-500');
                        $('#msg-popup').html(data.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                });
        })

        $('#save-unit').on('click', function() {
            $('#loading').removeClass('hidden');
            $('#page-alert').addClass('hidden');
            fetch("{{ route('page.unit.update') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        unit_id: id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    $('#loading').addClass('hidden');
                    if (data.status == 'error') {
                        $('#page-alert').removeClass('hidden');
                        $('#msg').html(data.message);
                        window.scrollTo(0, 0);
                    } else {
                        location.reload();
                    }
                });
        })

        const confirmModalDeleteUnit = function(id) {
            var r = confirm("Apa kamu yakin akan menghapus unit ini?");
            if (r == true) {
                var url = '{{ route('page.unit.delete', ':slug') }}';
                url = url.replace(':slug', id);
                window.location.href = url;
            }

            return false;
        };
    </script>
@endsection
