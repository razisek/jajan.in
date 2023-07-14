<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Explore | Jajan.in</title>
    <link rel="icon" type="image/x-icon"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-white">
        <div class="flex items-center justify-between mx-9 p-4">
            <a href="#" class="p-4">
                <img src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687234627/logo_tddyns.png" class="h-10"
                    alt="jajanin Logo" />
            </a>
            <div class="flex items-center divide-x-2 divide-gray-300 text-xl" id="navbar-default">
                <div class="relative pr-8">
                    <a href="{{ route('page.explore') }}" class="flex items-center gap-2 text-primary font-medium">
                        <i class="bi bi-search"></i>
                        Explore Creator
                    </a>
                </div>
                <div class="pl-8 flex items-center gap-4">
                    @if (Auth::check())
                        <a href="{{ route('page.dashboard') }}"><button
                                class="lgn_btn inline-flex items-center border-0 mx-4 py-2 px-8 focus:outline-none rounded-full text-base mt-4 md:mt-0">Dashboard
                            </button></a>
                    @else
                        <a href="{{ route('page.register') }}" class="text-primary">Register</a>
                        <a href="{{ route('page.login') }}"><button
                                class="lgn_btn inline-flex items-center border-0 mx-4 py-2 px-8 focus:outline-none rounded-full text-base mt-4 md:mt-0">Login
                            </button></a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <div class="bg-[#E4DDF5] w-full h-auto pb-24 pt-16">
        <p class="text-center font-extrabold text-3xl">Temukan Content Creator yang Menarik</p>
        <div class="flex justify-center">
            <div class="relative tex[#898989] w-2/4">
                <span class="absolute inset-y-0 left-3 top-8 flex items-center pl-2">
                    <i class="bi bi-search"></i>
                </span>
                <input onkeydown="search(this)" type="text" value="{{ request()->query('search') }}"
                    placeholder="Explore Creator"
                    class="w-full rounded-full px-4 py-2 pl-12 focus:border-primary focus:border-1 outline-none text-lg mt-8 ">
            </div>
        </div>
        <div class="flex justify-center">
            <ul class="flex flex-wrap -mb-px text-lg font-medium text-center text-black mt-5">
                <li class="mr-2">
                    <a href="{{ route('page.page.index') }}"
                        class="inline-flex p-4 rounded-t-lg group font-semibold text-primary border-b-2 border-primary">
                        <i class="bi bi-star mr-2"></i>Favorite
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('page.unit.index') }}"
                        class="inline-flex p-4 rounded-t-lg group hover:text-primary hover:border-b hover:border-primary">
                        <i class="bi bi-person-check mr-2"></i>Pilihan
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('page.unit.index') }}"
                        class="inline-flex p-4 rounded-t-lg group hover:text-primary hover:border-b hover:border-primary">
                        <i class="bi bi-trophy mr-2"></i>Popular
                    </a>
                </li>
                <li class="mr-2">
                    <a href="{{ route('page.unit.index') }}"
                        class="inline-flex p-4 rounded-t-lg group hover:text-primary hover:border-b hover:border-primary">
                        <i class="bi bi-graph-up-arrow mr-2"></i>Trending
                    </a>
                </li>
            </ul>
        </div>
        @if ($pages->count() == 0)
            <div class="w-full h-[350px] flex items-center justify-center font-bold text-xl">
                Tidak ada halaman creator yang ditemukan
            </div>
        @endif
        <div class="flex justify-center mt-6">
            @if ($pages->count() != 0)
                <div class="grid grid-cols-4 gap-5 w-4/5">
                    @foreach ($pages as $page)
                        <a href="{{ route('page.creator', $page->user->username) }}"
                            class="bg-white rounded-3xl cursor-pointer hover:shadow-xl transition-all duration-300">
                            <img src="{{ $page->getFirstMediaUrl('header') != '' ? $page->getFirstMediaUrl('header') : 'https://placehold.co/900x225/EEE/31343C' }}"
                                alt="header profile" class="rounded-t-3xl w-full h-36 object-cover">
                            <div class="flex items-center flex-col mb-4">
                                <img src="{{ $page->user->getFirstMediaUrl('avatar') != '' ? $page->user->getFirstMediaUrl('avatar') : 'https://ui-avatars.com/api/?background=random&name=' . $page->user->name }}"
                                    alt="avatar" class="w-24 h-24 object-cover rounded-full p-2 bg-white -mt-10">
                                <p class="font-extrabold text-xl mt-4">{{ $page->user->name }}</p>
                                <p class="text-[#737373] mt-2">{{ '@' . $page->user->username }}</p>
                                <p class="p-2
                                font-light">
                                    {{ $page->category->name ?? '' }}
                                </p>
                                <p class="font-extrabold"><i class="bi bi-star-fill text-primary"></i> Favorite</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="footer ">
        <footer class="">
            <div
                class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
                <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
                    <img src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687538877/jajanin_logo2_clbyam.png"
                        alt="">
                    <p class="mt-2 text-sm text-white">Our vision is to provide convenience and help increase your
                        sales business.</p>
                </div>
                <div
                    class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center justify-end">
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                        <h2 class="title-font font-bold text-white tracking-widest text-slg mb-3">Produk</h2>
                        <nav class="list-none mb-10">
                            <li>
                                <a class="text-slate-300 hover:text-slate-400 font-medium">Explore</a>
                            </li>
                            <li>
                                <a class="text-slate-300 hover:text-slate-400 font-medium">Cari Kreator</a>
                            </li>
                            <li>
                                <a class="text-slate-300 hover:text-slate-400">Buat Halaman</a>
                            </li>
                        </nav>
                    </div>
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                        <h2 class="title-font font-bold text-white tracking-widest text-slg mb-3">Infomasi</h2>
                        <nav class="list-none mb-10">
                            <li>
                                <a class="text-slate-300 hover:text-slate-400 font-medium">Tentang</a>
                            </li>
                            <li>
                                <a class="text-slate-300 hover:text-slate-400 font-medium">Syarat dan ketentuan</a>
                            </li>
                            <li>
                                <a class="text-slate-300 hover:text-slate-400 font-medium">Bantuan</a>
                            </li>
                        </nav>
                    </div>
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                        <h2 class="title-font font-bold text-white tracking-widest text-slg mb-3">Socials</h2>
                        <nav class="list-none mb-10">
                            <li>
                                <a class="text-slate-300 hover:text-slate-400 font-medium">Discord</a>
                            </li>
                            <li>
                                <a class="text-slate-300 hover:text-slate-400 font-medium">Instagram</a>
                            </li>
                            <li>
                                <a class="text-slate-300 hover:text-slate-400 font-medium">Twitter</a>
                            </li>
                            <li>
                                <a class="text-slate-300 hover:text-slate-400 font-medium">Facebook</a>
                            </li>
                        </nav>
                    </div>

                </div>
            </div>
            <div class="line_separator justify-center mx-20"></div>
            <div>
                <div class="container mx-auto py-4 flex flex-wrap flex-col sm:flex-row">
                    <p class="text-slate-300 text-sm text-center sm:text-left">@Jajan.In. All rights reserved
                    </p>
                    <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start text-slate-300">
                        <a class="px-10" href="">Privaci & Policy</a>
                        <a class="" href="">Term & Condition</a>
                    </span>
                </div>
            </div>
        </footer>
    </div>
    <script>
        function search(ele) {
            if (event.key === 'Enter') {
                if (ele.value == '') {
                    window.location.href = "{{ route('page.explore') }}";
                } else {
                    window.location.href = "{{ route('page.explore') }}?search=" + ele.value;
                }
            }
        }
    </script>
</body>

</html>
