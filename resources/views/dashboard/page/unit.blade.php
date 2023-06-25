@extends('layout.main')

@section('title', 'Manage Jajanin Unit')

@section('content')
    <div>
        <div id="loading" class="hidden fixed inset-0 bg-gray-800 bg-opacity-70 z-50">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl">Creating
                Post...
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
            <div class="flex gap-4 justify-center flex-wrap">
                <div id="unit1"
                    class="relative h-48 justify-center border-2 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40"
                    onclick="selectCard('unit1')">
                    <img src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687680385/donut_ycyqcs.png" alt="icon"
                        class="h-12 w-12 object-cover">
                    <p class="font-medium text-lg mt-3">Donut</p>
                    <p class="text-[#A8A8A8] text-sm font-medium">Rp 5.000</p>
                </div>
                <div id="unit2"
                    class="relative h-48 justify-center border-2 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40 border-primary"
                    onclick="selectCard('unit2')">
                    <p class="absolute top-2 left-2 text-primary px-2 py-px rounded-md text-xs text bg-primaryLight">Unit
                        Aktif</p>
                    <img src="https://cdn.trakteer.id/images/mix/ice-cream.png" alt="icon"
                        class="h-12 w-12 object-cover">
                    <p class="font-medium text-lg mt-3">Es Krim</p>
                    <p class="text-[#A8A8A8] text-sm font-medium">Rp 10.000</p>
                </div>
                <div id="unit3"
                    class="relative h-48 justify-center border-2 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40"
                    onclick="selectCard('unit3')">
                    <img src="https://cdn.trakteer.id/images/mix/coffee.png" alt="icon" class="h-12 w-12 object-cover">
                    <p class="font-medium text-lg mt-3">Kopi</p>
                    <p class="text-[#A8A8A8] text-sm font-medium">Rp 15.000</p>
                </div>
                <div id="unit4"
                    class="relative h-48 justify-center border-2 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40"
                    onclick="selectCard('unit4')">
                    <img src="https://cdn.trakteer.id/images/mix/pizza.png" alt="icon" class="h-12 w-12 object-cover">
                    <p class="font-medium text-lg mt-3">Pizza</p>
                    <p class="text-[#A8A8A8] text-sm font-medium">Rp 20.000</p>
                </div>
                <div id="unit5"
                    class="relative h-48 justify-center border-2 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40"
                    onclick="selectCard('unit5')">
                    <img src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687685188/two_tiered_strawberry_cake_on_a_plate_brsrdd.png"
                        alt="icon" class="h-12 w-12 object-cover">
                    <p class="font-medium text-lg mt-3">Kue</p>
                    <p class="text-[#A8A8A8] text-sm font-medium">Rp 50.000</p>
                </div>
            </div>
            <div class="flex gap-4 justify-center flex-wrap mt-4">
                <div id="add-unit"
                    class="relative h-48 justify-center border-4 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40 border-dashed">
                    <i class="bi bi-plus-circle-fill text-5xl text-[#747474]"></i>
                    <p class="text-[#A8A8A8] text-sm font-medium mt-2">Buat Unitmu!</p>
                </div>
                <div id="add-unit"
                    class="relative h-48 justify-center border-4 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40 border-dashed">
                    <i class="bi bi-plus-circle-fill text-5xl text-[#747474]"></i>
                    <p class="text-[#A8A8A8] text-sm font-medium mt-2">Buat Unitmu!</p>
                </div>
                <div id="add-unit"
                    class="relative h-48 justify-center border-4 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40 border-dashed">
                    <i class="bi bi-plus-circle-fill text-5xl text-[#747474]"></i>
                    <p class="text-[#A8A8A8] text-sm font-medium mt-2">Buat Unitmu!</p>
                </div>
                <div id="add-unit"
                    class="relative h-48 justify-center border-4 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40 border-dashed">
                    <i class="bi bi-plus-circle-fill text-5xl text-[#747474]"></i>
                    <p class="text-[#A8A8A8] text-sm font-medium mt-2">Buat Unitmu!</p>
                </div>
                <div id="add-unit"
                    class="relative h-48 justify-center border-4 flex flex-col items-center rounded-xl cursor-pointer max-w-[160px] w-40 border-dashed">
                    <i class="bi bi-plus-circle-fill text-5xl text-[#747474]"></i>
                    <p class="text-[#A8A8A8] text-sm font-medium mt-2">Buat Unitmu!</p>
                </div>
            </div>
        </div>
        <div id="modal-unit" class="fixed hidden inset-0 bg-gray-800 bg-opacity-70 z-50 transition-all duration-300">
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-2xl transition-all duration-300">
                <div class="relative max-h-full transition-all duration-300">
                    <div class="bg-white p-4 rounded-md">
                        <div class="w-[600px] flex justify-between items-center font-semibold">
                            <p class="text-lg">Kelola Unit</p>
                            <i id="modal-close" class="bi bi-x-lg cursor-pointer"></i>
                        </div>
                        <hr class="w-full h-px my-4 bg-gray-300 border-0">
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
                                        <input type="number" min="0" value="5000"
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
                            <button
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

        modalClose.addEventListener('click', function() {
            modalUnit.classList.add('hidden');
        });

        addUnit.forEach(function(unit) {
            unit.addEventListener('click', function() {
                modalUnit.classList.remove('hidden');
            });
        });

        function selectCard(selectedCard) {
            const cards = document.querySelectorAll('[id^="unit"]');
            cards.forEach(function(card) {
                if (card.id === selectedCard) {
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
    </script>
@endsection
