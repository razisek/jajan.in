@extends('layout.main')

@section('title', 'Manage Page')

@section('content')
    <div>
        <p class="font-semibold text-3xl mb-3">Edit Page Information</p>
        <div class="border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="mr-2">
                    <a href="{{ route('page.page.index') }}" class="inline-flex p-4 border-b-2 rounded-t-lg group text-primary border-primary">
                        <i class="bi bi-grid-1x2-fill mr-2"></i>Profile Page
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('page.unit.index') }}" class="inline-flex p-4 border-b-2 rounded-t-lg group hover:text-primary">
                        <i class="bi bi-coin mr-2"></i>Unit Jajanin
                    </a>
                </li>
            </ul>
        </div>
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow grid grid-cols-2">
            <div>
                <div>
                    <p class="text-xs font-bold text-[#747474]">Profile Picture</p>
                    <div class="mt-3 flex gap-4">
                        <img src="https://media.istockphoto.com/id/1327592449/id/vektor/ikon-tempat-penampung-foto-avatar-default-gambar-profil-abu-abu-pebisnis.jpg?s=170667a&w=0&k=20&c=zPNFIk-DGCMcFNoYVt-WsaqkNEpJW8vIuOYtcU-MvaA="
                            alt="avatar" id="avatarPreview" class="w-24 h-24 rounded-full object-cover">
                        <div>
                            <label
                                class="flex gap-3 justify-center items-center px-6 py-1 font-bold text-primary border-primary transition-all duration-300 rounded-full shadow-lg tracking-wide border-2 cursor-pointer">
                                <i class="bi bi-upload"></i>
                                <p class="text-[12px]">Upload New Picture</p>
                                <input type="file" class="hidden" id="avatarInput" accept="image/*" name="avatar" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="text-xs font-bold text-[#747474]">Profile Header</p>
                    <img src="https://placehold.co/900x225/EEE/31343C" alt="header" id="headerPreview"
                        class="w-80 h-48 object-cover rounded-t-2xl mt-2">
                    <p class="text-[10px] text-[#747474] font-light pt-2 pb-4">Header resolution : 900 x 225</p>
                    <label
                        class="flex w-56 gap-3 justify-center items-center px-6 py-1 font-bold text-primary border-primary transition-all duration-300 rounded-full shadow-lg tracking-wide border-2 cursor-pointer">
                        <i class="bi bi-upload"></i>
                        <p class="text-[12px]">Upload New Picture</p>
                        <input type="file" class="hidden" id="headerInput" accept="image/*" name="header" />
                    </label>
                </div>
                <div class="mt-8">
                    <p class="text-xs font-bold text-[#747474]">Social Media Links</p>
                    <div
                        class="mt-4 text-sm text-primary flex items-center gap-3 border-2 w-56 justify-center py-1 border-primary rounded-full shadow-lg cursor-pointer">
                        <i class="bi bi-plus-circle-fill"></i>
                        <p class="font-medium">Add Social Media Links</p>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="text-xs font-bold text-[#747474]">Active Goal</p>
                    <div
                        class="mt-4 text-sm text-primary flex items-center gap-3 border-2 w-44 justify-center py-1 border-primary rounded-full shadow-lg cursor-pointer">
                        <i class="bi bi-plus-circle-fill"></i>
                        <p class="font-medium">Add New Goal</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="name" class="mb-2 inline-block text-xs font-bold text-[#747474] clear-both">Name</label>
                    <input type="text" id="name" name="name" value="Leo Messi"
                        class="w-full p-2 text-gray-900 border-2 border-[#D9D9D9] rounded-lg focus:ring-primary focus:border-primary"
                        autocomplete="off">
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="name"
                        class="mb-2 inline-block text-xs font-bold text-[#747474] clear-both">Username</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-[#6D6D6D] bg-[#D9D9D9] border border-r-0 border-gray-300 rounded-l-md">
                            @
                        </span>
                        <input type="text" id="name" name="name" value="leomessi"
                            class="w-full p-2 text-gray-900 border-2 border-[#D9D9D9] rounded-r-lg focus:ring-primary focus:border-primary"
                            autocomplete="off">
                    </div>
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="name"
                        class="mb-2 inline-block text-xs font-bold text-[#747474] clear-both">Category</label>
                    <select id="countries"
                        class="border-2 border-[#D9D9D9] text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-priring-primary block w-full p-2.5">
                        <option disabled>Choose a category</option>
                        <option value="cosplayer" selected>Cosplayer</option>
                        <option value="art">Art</option>
                        <option value="gaming">Gaming</option>
                    </select>
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="name"
                        class="mb-2 inline-block text-xs font-bold text-[#747474] clear-both">About</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border-2 border-[#D9D9D9] focus:ring-primary focus:border-primring-primary"
                        placeholder="About"></textarea>
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <div class="flex items-center gap-2 mb-2 text-[#747474]">
                        <i class="bi bi-envelope-fill"></i>
                        <label for="name" class="text-xs font-bold">Pesan Untuk Supporter</label>
                    </div>
                    <textarea id="message" rows="3"
                        class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border-2 border-[#D9D9D9] focus:ring-primary focus:border-primring-primary"
                        placeholder="Pesan untuk supporter yang mau jajanin"></textarea>
                </div>
                <button class="w-44 bg-secondary text-white py-4 rounded-full shadow-lg mt-6 font-bold text-sm">
                    <i class="fa-solid fa-floppy-disk mr-3"></i>
                    Create Post
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const avatarInput = document.getElementById('avatarInput');
        avatarInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            const url = URL.createObjectURL(file);
            const img = document.getElementById('avatarPreview');
            img.src = url;
        });

        const headerInput = document.getElementById('headerInput');
        headerInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            const url = URL.createObjectURL(file);
            const img = document.getElementById('headerPreview');
            img.src = url;
        });
    </script>
@endsection
