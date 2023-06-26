@extends('layout.main')

@section('title', 'Manage Page')

@section('content')
    <div id="loading" class="hidden fixed inset-0 bg-gray-800 bg-opacity-70 z-50">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl">Please wait...
        </div>
    </div>
    <div>
        <p class="font-semibold text-3xl mb-3">Edit Page Information</p>
        <div class="border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="mr-2">
                    <a href="{{ route('page.page.index') }}"
                        class="inline-flex p-4 border-b-2 rounded-t-lg group text-primary border-primary">
                        <i class="bi bi-grid-1x2-fill mr-2"></i>Profile Page
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('page.unit.index') }}"
                        class="inline-flex p-4 border-b-2 rounded-t-lg group hover:text-primary">
                        <i class="bi bi-coin mr-2"></i>Unit Jajanin
                    </a>
                </li>
            </ul>
        </div>
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
        @if (\Session::has('success'))
            <div
                class="font-regular relative my-4 block w-full rounded-lg bg-green-500 p-4 text-base leading-5 text-white opacity-100">
                {!! \Session::get('success') !!}
            </div>
        @endif
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow grid grid-cols-2">
            <div>
                <div>
                    <p class="text-xs font-bold text-[#747474]">Profile Picture</p>
                    <div class="mt-3 flex gap-4">
                        <img src="{{ $avatar == '' ? 'https://media.istockphoto.com/id/1327592449/id/vektor/ikon-tempat-penampung-foto-avatar-default-gambar-profil-abu-abu-pebisnis.jpg?s=170667a&w=0&k=20&c=zPNFIk-DGCMcFNoYVt-WsaqkNEpJW8vIuOYtcU-MvaA=' : $avatar }}"
                            alt="avatar" id="avatarPreview" class="w-24 h-24 rounded-full object-cover">
                        <div>
                            <label
                                class="flex gap-3 justify-center items-center px-6 py-1 font-bold text-primary border-primary transition-all duration-300 rounded-full shadow-lg tracking-wide border-2 cursor-pointer">
                                <i class="bi bi-upload"></i>
                                <p class="text-[12px]">Upload New Picture</p>
                                <input type="file" class="hidden" id="avatarInput" accept="image/*" name="avatar" />
                            </label>
                            @if ($avatar != '')
                                <p onclick="confirmModalDeleteAvatar()"
                                    class="border-2 text-center py-1 mt-3 rounded-full cursor-pointer hover:bg-[#E7E7E7] hover:border-[#A7A7A7]">
                                    <i class="bi bi-x-lg mr-3"></i> Remove
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="text-xs font-bold text-[#747474]">Profile Header</p>
                    <img src="{{ $header == '' ? 'https://placehold.co/900x225/EEE/31343C' : $header }}" alt="header"
                        id="headerPreview" class="w-80 h-48 object-cover rounded-t-2xl mt-2">
                    <p class="text-[10px] text-[#747474] font-light pt-2 pb-4">Header resolution : 900 x 225</p>
                    <div class="flex items-center gap-3 w-3/5">
                        <label
                            class="flex w-2/3 gap-3 justify-center items-center px-6  font-bold text-primary border-primary transition-all duration-300 rounded-full shadow-lg tracking-wide border-2 cursor-pointer">
                            <i class="bi bi-upload"></i>
                            <p class="text-[12px]">Upload New Picture</p>
                            <input type="file" class="hidden" id="headerInput" accept="image/*" name="header" />
                        </label>
                        @if ($header != '')
                            <p onclick="confirmModalDeleteHeader()"
                                class="border-2 w-1/3 text-center py-1 mt-3 rounded-full cursor-pointer hover:bg-[#E7E7E7] hover:border-[#A7A7A7]">
                                <i class="bi bi-x-lg mr-3"></i> Remove
                            </p>
                        @endif
                    </div>
                </div>
                <div class="mt-8">
                    <p class="text-xs font-bold text-[#747474]">Social Media Links</p>
                    <div id="open-sosmed"
                        class="mt-4 text-sm text-primary flex items-center gap-3 border-2 w-56 justify-center py-1 border-primary rounded-full shadow-lg cursor-pointer">
                        <i class="bi bi-plus-circle-fill"></i>
                        <p class="font-medium">Add Social Media Links</p>
                    </div>
                    @foreach ($medsos as $social)
                        <div class="bg-[#E7E7E7] rounded-sm w-4/6 flex items-center justify-between py-1 px-2 mt-2">
                            <p class="text-sm text-[#747474]">
                                {{ $social['link'] }}{{ $social['user'] }}</p>
                            <i class="bi bi-x-lg cursor-pointer" onclick="confirmModal('{{ $social['id'] }}')"></i>
                        </div>
                    @endforeach
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
                    <input type="text" id="name" name="name" value="{{ $page->user->name }}"
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
                        <input type="text" id="username" name="username" value="{{ $page->user->username }}"
                            class="w-full p-2 text-gray-900 border-2 border-[#D9D9D9] rounded-r-lg focus:ring-primary focus:border-primary"
                            autocomplete="off">
                    </div>
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="category"
                        class="mb-2 inline-block text-xs font-bold text-[#747474] clear-both">Category</label>
                    <select id="category"
                        class="border-2 border-[#D9D9D9] text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-priring-primary block w-full p-2.5">
                        <option disabled selected value="0">Choose a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $page->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="name"
                        class="mb-2 inline-block text-xs font-bold text-[#747474] clear-both">About</label>
                    <textarea id="about" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border-2 border-[#D9D9D9] focus:ring-primary focus:border-primring-primary"
                        placeholder="About">{{ $page->about }}</textarea>
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <div class="flex items-center gap-2 mb-2 text-[#747474]">
                        <i class="bi bi-envelope-fill"></i>
                        <label for="name" class="text-xs font-bold">Pesan Untuk Supporter</label>
                    </div>
                    <textarea id="message" rows="3"
                        class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border-2 border-[#D9D9D9] focus:ring-primary focus:border-primring-primary"
                        placeholder="Pesan untuk supporter yang mau jajanin">{{ $page->message }}</textarea>
                </div>
                <button id="save-page"
                    class="w-44 bg-secondary text-white py-4 rounded-full shadow-lg mt-6 font-bold text-sm">
                    <i class="fa-solid fa-floppy-disk mr-3"></i>
                    Save Changes
                </button>
            </div>
        </div>

        <div id="modal-sosmed" class="fixed hidden inset-0 bg-gray-800 bg-opacity-70 z-30 transition-all duration-300">
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-2xl transition-all duration-300">
                <div class="relative max-h-full transition-all duration-300">
                    <div class="bg-white p-4 rounded-md">
                        <div class="w-[600px] flex justify-between items-center font-semibold">
                            <p class="text-Dlg">Social and Links</p>
                            <i id="modal-sosmed-close" class="bi bi-x-lg cursor-pointer"></i>
                        </div>
                        <hr class="w-full h-px my-4 bg-gray-300 border-0">
                        <div id="social-alert"
                            class="hidden mt-4 font-regular relative w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100"
                            data-dismissible="alert">
                            <div class="mr-12" id="msg">Alert dismissible</div>
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
                                <p class="text-base font-medium w-2/6">Social Platform</p>
                                <select id="social-list"
                                    class="w-4/6 border text-base border-gray-300 rounded-md px-3 py-2 placeholder-primaryLight focus:border-primary focus:border-1 outline-none">
                                    <option disabled selected>Choose a social platform</option>
                                    @foreach ($socialLinks as $social)
                                        <option value="{{ $social->id }}">{{ $social->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center mt-5">
                                <p class="text-base font-medium w-2/6">Social Link</p>
                                <div class="w-4/6">
                                    <div class="relative flex flex-wrap items-stretch">
                                        <span
                                            class="flex items-center whitespace-nowrap bg-primaryLight border border-primaryLight rounded-l-md border-r-0 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-black"
                                            id="social-link">?</span>
                                        <input type="text" id="social-user"
                                            class="border text-base relative m-0 block w-[1px] min-w-0 flex-auto border-gray-300 rounded-r-md px-4 py-2 focus:border-primary focus:border-1 outline-none ">
                                    </div>
                                </div>
                            </div>
                            <button id="add-social-link"
                                class="w-44 bg-secondary text-white py-2 rounded-full shadow-lg mt-6 font-bold text-sm">
                                <i class="fa-solid fa-floppy-disk mr-3"></i>
                                Simpan
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

        const openSosmed = document.getElementById('open-sosmed');
        const modalSosmed = document.getElementById('modal-sosmed');
        const modalSosmedClose = document.getElementById('modal-sosmed-close');

        openSosmed.addEventListener('click', () => {
            modalSosmed.classList.remove('hidden');
        });

        modalSosmedClose.addEventListener('click', () => {
            modalSosmed.classList.add('hidden');
        });

        $('#social-list').on('change', function() {
            @foreach ($socialLinks as $social)
                if ($(this).val() == {{ $social->id }}) {
                    $('#social-link').text('{{ $social->link }}');
                }
            @endforeach
        });

        $('#add-social-link').on('click', function() {
            $('#loading').removeClass('hidden');
            $('#social-alert').addClass('hidden');
            fetch("{{ route('api.social-links') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        social_id: $('#social-list').val(),
                        user: $('#social-user').val()
                    })
                })
                .then(response => response.json())
                .then(data => {
                    $('#loading').addClass('hidden');
                    if (data.status == 'error') {
                        $('#social-alert').removeClass('hidden');
                        $('#msg').text(data.message);
                    } else {
                        location.reload();
                    }
                });
        });

        const confirmModal = function(id) {
            var r = confirm("Apa kamu yakin akan menghapus social media ini?");
            if (r == true) {
                var url = '{{ route('api.social-links.delete', ':slug') }}';
                url = url.replace(':slug', id);
                window.location.href = url;
            }

            return false;
        };

        $('#save-page').on('click', function() {
            const formData = new FormData();
            if ($('#avatarInput')[0].files[0] != undefined) {
                formData.append('avatar', $('#avatarInput')[0].files[0]);
            }
            if ($('#headerInput')[0].files[0] != undefined) {
                formData.append('header', $('#headerInput')[0].files[0]);
            }
            if ($('#message').val() != '') {
                formData.append('message', $('#message').val());
            }
            formData.append('name', $('#name').val());
            formData.append('username', $('#username').val());
            formData.append('category_id', $('#category').val());
            formData.append('about', $('#about').val());

            $('#loading').removeClass('hidden');
            $('#social-alert').addClass('hidden');
            fetch("{{ route('page.page.store') }}", {
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
                        $('#page-alert').removeClass('hidden');
                        $('#msg').text(data.message);
                        window.scrollTo(0, 0);
                    } else {
                        window.location.href = "{{ route('page.page.index') }}" + '?s';
                    }
                });
        });

        const confirmModalDeleteAvatar = function() {
            var r = confirm("Apa kamu yakin akan menghapus avatar?");
            if (r == true) {
                window.location.href = "{{ route('page.avatar.delete') }}";
            }

            return false;
        };

        const confirmModalDeleteHeader = function() {
            var r = confirm("Apa kamu yakin akan menghapus header?");
            if (r == true) {
                window.location.href = "{{ route('page.header.delete') }}";
            }

            return false;
        };
    </script>
@endsection
