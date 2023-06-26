<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex">
        <div class="w-full ml-auto z-50">
            <nav class="bg-white shadow-md">
                <div class="max-w-screen-2xl flex items-center justify-between mx-9 p-4">
                    <a href="#" class="py-1">
                        <img src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687234627/logo_tddyns.png"
                            class="h-10" alt="jajanin Logo" />
                    </a>
                    <div class="flex items-center divide-x-2 divide-gray-300" id="navbar-default">
                        <div class="relative pr-8">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="search-navbar"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-[#D9D9D9] focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Explore Creator">
                        </div>
                        <div class="pl-8 flex items-center">
                            <a href="#"><i class="bi bi-bell-fill text-[#6D6D6D] pr-8 text-xl"></i></a>
                            <img src="{{ auth()->user()->getFirstMediaUrl('avatar') != ''? auth()->user()->getFirstMediaUrl('avatar'): 'https://ui-avatars.com/api/?background=random&name=' . auth()->user()->name }}"
                                alt="avatar" class="w-10 h-10 rounded-full">
                            <div class="pl-3">
                                <p class="text-primary font-medium text-md">{{ Auth::user()->name }}</p>
                                <p class="text-[#D9D9D9] text-sm font-light">{{ Auth::user()->username }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="flex">
                <div class="sticky top-0 left-0 w-1/6 bg-[#F8F7F7] text-[#747474] h-screen text-md px-6">
                    <nav class="mt-4">
                        <ul class="space-y-2">
                            <li
                                class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary {{ Route::is('page.dashboard') ? 'bg-primaryLight text-primary' : '' }}">
                                <i class="bi bi-bar-chart-line"></i>
                                <a href="{{ route('page.dashboard') }}" class="block py-2 px-4">Overview</a>
                            </li>
                            <li class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary">
                                <i class="bi bi-wallet2"></i>
                                <a href="#" class="block py-2 px-4">My Balance</a>
                            </li>
                            <li
                                class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary {{ Route::is('page.page.index') ? 'bg-primaryLight text-primary' : '' }}">
                                <i class="bi bi-pencil-square"></i>
                                <a href="{{ route('page.page.index') }}" class="block py-2 px-4">Edit Page</a>
                            </li>
                            <hr class="w-4/5 h-px my-8 bg-[#E9E8E8] border-0">
                            <li
                                class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary {{ Route::is('page.post.index') || Route::is('page.post.create') ? 'bg-primaryLight text-primary' : '' }}">
                                <i class="bi bi-file-text"></i>
                                <a href="{{ route('page.post.index') }}" class="block py-2 px-4">Post</a>
                            </li>
                            <li class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary">
                                <i class="bi bi-gift"></i>
                                <a href="#" class="block py-2 px-4">Rewards</a>
                            </li>
                            <hr class="w-4/5 h-px my-8 bg-[#E9E8E8] border-0">
                            <li class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary">
                                <i class="bi bi-people"></i>
                                <a href="#" class="block py-2 px-4">My Supporters</a>
                            </li>
                            <li class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary">
                                <i class="bi bi-people"></i>
                                <a href="#" class="block py-2 px-4">My Followers</a>
                            </li>
                            <hr class="w-4/5 h-px my-8 bg-[#E9E8E8] border-0">
                            <li class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary">
                                <i class="bi bi-person"></i>
                                <a href="#" class="block py-2 px-4">My Account</a>
                            </li>
                            <li class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary">
                                <i class="bi bi-gear-fill"></i>
                                <a href="#" class="block py-2 px-4">Settings</a>
                            </li>
                            <hr class="w-4/5 h-px my-8 bg-[#E9E8E8] border-0">
                            <li class="flex items-center pl-4 rounded-full hover:bg-primaryLight hover:text-primary">
                                <i class="bi bi-arrow-repeat rotate-90"></i>
                                <a href="#" class="block py-2 px-4">Open as Supporter</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="p-8 w-5/6">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>
