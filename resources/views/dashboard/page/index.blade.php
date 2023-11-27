@extends('layout.main')

@section('title', 'Manage Page')

@section('content')
    <div id="loading" class="hidden fixed inset-0 bg-gray-800 bg-opacity-70 z-50">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl">Please wait...
        </div>
    </div>
    <nav class="flex mb-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
            <li class="inline-flex items-center">
                <a href="#"
                    class="inline-flex items-center text-gray-700 hover:text-primary-600">
                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <a href="#"
                        class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2">User</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-gray-400 md:ml-2" aria-current="page">Page Setting</span>
                </div>
            </li>
        </ol>
    </nav>
    <div>
        <p class="font-semibold text-3xl mb-3">Edit Page Information</p>
        <div class="border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
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

        <div class="grid grid-cols-1 px-4 pt-3 xl:grid-cols-3 xl:gap-4">
            <div class="col-span-full xl:col-auto">
                <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 sm:p-6">
                    <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                        <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0 object-cover"
                            src="{{ $avatar == '' ? 'https://media.istockphoto.com/id/1327592449/id/vektor/ikon-tempat-penampung-foto-avatar-default-gambar-profil-abu-abu-pebisnis.jpg?s=170667a&w=0&k=20&c=zPNFIk-DGCMcFNoYVt-WsaqkNEpJW8vIuOYtcU-MvaA=' : $avatar }}"
                            alt="Avatar" id="avatarPreview">
                        <div>
                            <h3 class="mb-1 text-lg font-bold text-[#747474]">Profile picture</h3>
                            <div class="mb-4 text-xs text-gray-500">
                                JPG or PNG. Max size of 2MB.
                            </div>
                            <div class="flex items-center space-x-4">
                                <label
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 cursor-pointer">
                                    <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                        </path>
                                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                    </svg>
                                    <input type="file" class="hidden" id="avatarInput" accept="image/*" name="avatar" />
                                    Upload New picture
                                </label>
                                @if ($avatar != '')
                                    <button type="button" onclick="confirmModalDeleteAvatar()"
                                        class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                        <i class="bi bi-x-lg mr-3"></i> Delete
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        <p class="text-base font-bold text-[#747474]">Profile Header</p>
                        <img src="{{ $header == '' ? 'https://placehold.co/900x225/EEE/31343C' : $header }}" alt="header"
                            id="headerPreview" class="w-80 h-48 object-cover rounded-t-2xl mt-2">
                        <p class="text-xs text-[#747474] font-light pt-2 pb-4">Header resolution : 900 x 225</p>
                        <div class="flex items-center space-x-4">
                            <label
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 cursor-pointer">
                                <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                    </path>
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                </svg>
                                <input type="file" class="hidden" id="headerInput" accept="image/*" name="header" />
                                Upload New picture
                            </label>
                            @if ($header != '')
                                <button type="button" onclick="confirmModalDeleteHeader()"
                                    class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                    <i class="bi bi-x-lg mr-3"></i> Delete
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2">
                    <div class="flow-root">
                        <h3 class="text-xl font-semibold">Social Media Link</h3>
                        <ul class="divide-y divide-gray-200">
                            @foreach ($medsos as $social)
                                <li class="py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            {!! $social['icon'] !!}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <span class="block text-base font-semibold text-gray-900 truncate">
                                                {{ $social['name'] }} account
                                            </span>
                                            <a href="{{ $social['link'] }}{{ $social['user'] }}" target="_blank"
                                                class="block text-sm font-normal truncate text-blue hover:underline">
                                                {{ $social['link'] }}{{ $social['user'] }}
                                            </a>
                                        </div>
                                        <div class="inline-flex items-center">
                                            <a onclick="confirmModal('{{ $social['id'] }}')"
                                                class="px-3 py-2 mb-3 mr-3 text-sm font-medium text-center text-red bg-white border border-red rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-red cursor-pointer">Delete</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="flex justify-center w-full mt-4">
                            <button id="open-sosmed"
                                class="text-white bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <i class="bi bi-plus mr-3"></i>
                                Add Social Media Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" name="name" id="name" value="{{ $page->user->name }}"
                                class="shadow-sm bg-gray-50 border-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 outline-none"
                                placeholder="Dimas" required>
                        </div>
                        <div class="col-span-6">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-[#9CA3AF] bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                                    @
                                </span>
                                <input type="text" id="username" name="username"
                                    value="{{ $page->user->username }}"
                                    class="shadow-sm rounded-none rounded-e-lg bg-gray-50 border-2 border-gray-300 text-gray-900 focus:ring-primary focus:border-primary block flex-1 min-w-0 w-full sm:text-sm p-2.5 outline-none"
                                    placeholder="jajanin" required>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <select id="category" name="category"
                                class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary border-2 focus:border-primary block w-full p-2.5 outline-none">
                                <option disabled selected value="0">Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $page->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6">
                            <label for="about" class="block mb-2 text-sm font-medium text-gray-900">About</label>
                            <textarea id="about" rows="4"
                                class="block p-2.5 w-full sm:text-sm text-gray-900 bg-gray-50 rounded-lg border-2 border-gray-300 focus:ring-primary focus:border-primary outline-none"
                                placeholder="About You">{{ $page->about }}</textarea>
                        </div>
                        <div class="col-span-6">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Message for
                                supporter</label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full sm:text-sm text-gray-900 bg-gray-50 rounded-lg border-2 border-gray-300 focus:ring-primary focus:border-primary outline-none"
                                placeholder="Leave a message...">{{ $page->message }}</textarea>
                        </div>
                        <div class="col-span-6 sm:col-full">
                            <button id="save-page"
                                class="inline-flex items-center px-4 py-3 text-sm font-medium text-center text-white rounded-lg bg-secondary cursor-pointer">
                                <i class="fa-solid fa-floppy-disk mr-3"></i>
                                Save All
                            </button>
                        </div>
                    </div>
                </div>
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
                        $('#msg-popup').text(data.message);
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
