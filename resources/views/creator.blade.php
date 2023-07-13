<!doctype html>
<html>

<head>
    <title>{{ $page->user->name }} - Jajan.in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    @vite('resources/css/creator_profil.css')
    @vite('resources/css/creator_pop_up.css')
</head>

<body>
    <div id="loading" class="hidden fixed inset-0 bg-gray-800 bg-opacity-70 z-50">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl">Please
            wait...
        </div>
    </div>
    <div class="header justify-between p-5 px-24 flex flex-wrap flex-col md:flex-row md:items-center items-center">
        <div class="logo">
            <a href="/"><img src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687234627/logo_tddyns.png"
                    alt="Jajanin Logo" class="h-10"></a>
        </div>
        <div class="menu_navigation">
            <ul class="flex content-center">
                <li><a class="nav_pad flex" href="#"><i class="bi bi-search mr-3"></i>Explorer Creator</a>
                </li>
                <li>
                    <div class="menu_separator"></div>
                </li>
                @if (Auth::check())
                    <li><a href="{{ route('page.dashboard') }}"><button
                                class="lgn_btn inline-flex items-center border-0 mx-4 py-2 px-8 focus:outline-none rounded-full text-base mt-4 md:mt-0">Dashboard
                            </button></a></li>
                @else
                    <li><a class="nav_pad flex" href="{{ route('page.register') }}">Register</a></li>
                    <li><a href="{{ route('page.login') }}"><button
                                class="lgn_btn inline-flex items-center border-0 mx-4 py-2 px-8 focus:outline-none rounded-full text-base mt-4 md:mt-0">Login
                            </button></a></li>
                @endif
            </ul>
        </div>
    </div>

    <div style="background-size: 100% 100%;"
        class="profil_pict px-24 bg-[url('https://res.cloudinary.com/dgmwbkto1/image/upload/v1688098659/pd_bg_nkdtvg.png')] bg-center bg-no-repeat">
        <img class="mx-auto w-4/5 h-[400px] rounded-[150px] object-cover"
            src="{{ $header == '' ? 'https://placehold.co/900x225/EEE/31343C' : $header }}" alt="Header">
        <div class="flex justify-center items-center gap-5 -mt-24">
            <button class="py-3 px-12 bg-primary rounded-full text-white font-bold text-lg object-cover"><i
                    class="bi bi-rocket-takeoff mr-3"></i>Follow</button>
            <img class="h-48 w-48 rounded-full bg-white p-4 shadow-lg object-cover"
                src="{{ $avatar == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $page->user->name : $avatar }}"
                alt="Profile">
            <button class="py-3 px-12 bg-primary rounded-full text-white font-bold text-lg"><i
                    class="bi bi-share-fill mr-3"></i>Share</button>
        </div>
    </div>
    <div class="text-center">
        <h1 class="font-extrabold text-3xl py-2">{{ $page->user->name }}</h1>
        <h3 class="text-base pb-4">{{ $page->category->name ?? '' }}</h3>
        <p class="text-lg max-w-3xl m-auto">{{ $page->about ?? '-' }}</p>
    </div>

    {{-- goal --}}
    <div class="flex mt-8 justify-center">
        <div class="max-w-screen-xl w-4/5 bg-primary rounded-3xl p-6 text-white">
            <p class="font-bold text-2xl">Beli Pedang Baru</p>
            <p class="text-xl mt-4"><span class="font-bold">Rp 450.000</span> terkumpul dari Rp 1.000.000 </p>
            <div class="w-full bg-primary border-[4px] border-white rounded-full h-8 mt-2">
                <div class="bg-secondary h-6 rounded-full" style="width: 45%"></div>
            </div>
            <p class="text-xl text-center mt-2"><span class="font-bold">45%</span> tercapai</p>
            <a id="open-donate" class="flex justify-center mt-4">
                <button
                    class="border-2 border-white text-base py-2 px-8 rounded-full hover:bg-white hover:text-primary font-medium">Support</button>
            </a>
        </div>
    </div>

    <!-- social media -->
    <div class="flex justify-center mt-8">
        <div class="w-4/5 bg-primary py-4 max-w-screen-xl rounded-3xl mb-8">
            <h1 class="text-center text-white text-xl font-bold pb-5">Social Media</h1>
            <div class="flex justify-center items-center gap-2 flex-wrap">
                @foreach ($medsos as $social)
                    <a href="{{ $social['link'] }}{{ $social['user'] }}" target="_blank"
                        class="flex items-center gap-2 bg-white py-1 px-5 rounded-full cursor-pointer">
                        <img src="{{ $social['icon'] }}" alt="icon_sosmed" class="w-6 h-6 object-contain">
                        <p class="text-primary font-bold">{{ $social['name'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="w-4/5 py-4 max-w-screen-xl flex items-center gap-2 text-lg text-[#818181] font-semibold">
            <p class="border py-2 px-4 rounded-lg cursor-pointer text-primary border-primary bg-primaryLight">Home</p>
            <p class="border border-[#818181] py-2 px-4 rounded-lg cursor-pointer">Post &nbsp;<span
                    class="bg-primary text-white py-2 px-3 rounded-full">0</span></p>
            <p class="border border-[#818181] py-2 px-4 rounded-lg cursor-pointer">Reward &nbsp;<span
                    class="bg-primary text-white py-2 px-3 rounded-full">0</span></p>
        </div>
    </div>

    <div class="flex justify-center mt-2">
        <div class="w-4/5 p-8 max-w-screen-xl bg-[#E4DCF4] rounded-3xl">
            @if ($transactions->count() == 0)
                <div class="text-center">
                    Tidak ada aktivitas
                </div>
            @else
                @foreach ($transactions as $trans)
                    <div class="flex gap-3 mt-4">
                        @if ($trans->is_anonymous)
                            <img src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1689228392/default_wju6xf.png"
                                alt="avatar" class="object-cover w-16 h-16 rounded-full">
                        @else
                            <img src="{{ $trans->user->getFirstMediaUrl('avatar') != '' ? $trans->user->getFirstMediaUrl('avatar') : 'https://res.cloudinary.com/dgmwbkto1/image/upload/v1689228392/default_wju6xf.png' }}"
                                alt="avatar" class="object-cover w-16 h-16 rounded-full">
                        @endif
                        <div>
                            <p class="text-[#6D6D6D] text-lg"><span
                                    class="font-semibold text-black">{{ $trans->is_anonymous ? 'Seseorang' : $trans->name }}</span>
                                mentraktir <span class="text-primary font-semibold">{{ $trans->quantity }}
                                    {{ $trans->unit->name }}</span> pada <span
                                    class="text-black">{{ $trans->page->user->name }}</span></p>
                            <p class="text-[#6D6D6D]">{{ $trans->created_at->diffForHumans() }}</p>
                            @if ($trans->message)
                                <div
                                    class="relative border-2 border-primary bg-white rounded-2xl py-1 px-2 mt-4 after:absolute after:top-0 after:left-8 after:w-0 after:h-0 after:border-[15px] after:border-solid after:border-transparent after:border-b-primary after:border-t-0 after:border-l-0 after:-ml-2 after:-mt-4">
                                    {{ $trans->message }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="footer mt-8">
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

    <!-- reword pop up -->
    {{-- <div id="view" class="pop_up">
        <div class="pop_view">
            <div class="view_header flex justify-between">
                <h1 class="text-base font-extrabold pt-0.5 ml-4">Reward Jajan.in Asta Black Bull</h1>
                <a href="#"><img class="close_btn_img2" src="{{ URL('assets/icon_close.png') }}"
                        alt=""></a>
            </div>
            <div class="viewreward_content">
                <div class="vrc_main">
                    <div class="vrc_reward_row1 flex">
                        <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png') }}" alt="">
                        <img class="img_reward_view" src="{{ URL('assets/astatembaga.png') }}" alt="">
                        <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
                        <a href="#donate1"><button class="view_donate_btn"><img class="kucing"
                                    src="{{ URL('assets/icon_kucing.png') }}" alt=""><span
                                    class="pt-0.5">Jajan.in 5 Unit</span></button></a>
                    </div>
                    <div class="vrc_reward_row2">
                        <div class="gembok_line"></div>
                        <div class="vrc_content">
                            <div class="vrc_row">
                                <div class="vrc_col mb-2">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="vrc_col">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vrc_main">
                    <div class="vrc_reward_row1 flex">
                        <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png') }}" alt="">
                        <img class="img_reward_view" src="{{ URL('assets/astatembaga.png') }}" alt="">
                        <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
                        <a href="#donate1"><button class="view_donate_btn"><img class="kucing"
                                    src="{{ URL('assets/icon_kucing.png') }}" alt=""><span
                                    class="pt-0.5">Jajan.in 5 Unit</span></button></a>
                    </div>
                    <div class="vrc_reward_row2">
                        <div class="gembok_line"></div>
                        <div class="vrc_content">
                            <div class="vrc_row">
                                <div class="vrc_col mb-2">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="vrc_col">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vrc_main">
                    <div class="vrc_reward_row1 flex">
                        <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png') }}" alt="">
                        <img class="img_reward_view" src="{{ URL('assets/astatembaga.png') }}" alt="">
                        <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
                        <a href="#donate1"><button class="view_donate_btn"><img class="kucing"
                                    src="{{ URL('assets/icon_kucing.png') }}" alt=""><span
                                    class="pt-0.5">Jajan.in 5 Unit</span></button></a>
                    </div>
                    <div class="vrc_reward_row2">
                        <div class="gembok_line"></div>
                        <div class="vrc_content">
                            <div class="vrc_row">
                                <div class="vrc_col mb-2">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="vrc_col">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vrc_main">
                    <div class="vrc_reward_row1 flex">
                        <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png') }}" alt="">
                        <img class="img_reward_view" src="{{ URL('assets/astatembaga.png') }}" alt="">
                        <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
                        <a href="#donate1"><button class="view_donate_btn"><img class="kucing"
                                    src="{{ URL('assets/icon_kucing.png') }}" alt=""><span
                                    class="pt-0.5">Jajan.in 5 Unit</span></button></a>
                    </div>
                    <div class="vrc_reward_row2">
                        <div class="gembok_line"></div>
                        <div class="vrc_content">
                            <div class="vrc_row">
                                <div class="vrc_col mb-2">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="vrc_col">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vrc_main">
                    <div class="vrc_reward_row1 flex">
                        <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png') }}" alt="">
                        <img class="img_reward_view" src="{{ URL('assets/astatembaga.png') }}" alt="">
                        <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
                        <a href="#donate1"><button class="view_donate_btn"><img class="kucing"
                                    src="{{ URL('assets/icon_kucing.png') }}" alt=""><span
                                    class="pt-0.5">Jajan.in 5 Unit</span></button></a>
                    </div>
                    <div class="vrc_reward_row2">
                        <div class="gembok_line"></div>
                        <div class="vrc_content">
                            <div class="vrc_row">
                                <div class="vrc_col mb-2">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="vrc_col">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vrc_main">
                    <div class="vrc_reward_row1 flex">
                        <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png') }}" alt="">
                        <img class="img_reward_view" src="{{ URL('assets/astatembaga.png') }}" alt="">
                        <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
                        <a href="#donate1"><button class="view_donate_btn"><img class="kucing"
                                    src="{{ URL('assets/icon_kucing.png') }}" alt=""><span
                                    class="pt-0.5">Jajan.in 5 Unit</span></button></a>
                    </div>
                    <div class="vrc_reward_row2">
                        <div class="gembok_line"></div>
                        <div class="vrc_content">
                            <div class="vrc_row">
                                <div class="vrc_col mb-2">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="vrc_col">
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                    <div class="vrc_card">
                                        <img src="{{ URL('assets/wp_asta_hd.png') }}" alt="">
                                        <div>
                                            <h1>Demon Asta HD Wallpaper</h1>
                                            <h2>#BlackClover - 1 Minggu yang lalu</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="modal-donasi" class="fixed hidden inset-0 bg-gray-800 bg-opacity-70 z-30 transition-all duration-300">
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-2xl transition-all duration-300">
            <div class="relative max-h-full transition-all duration-300">
                <div class="bg-white rounded-3xl">
                    <div
                        class="w-[450px] flex rounded-t-3xl justify-between items-center font-semibold bg-primary text-white py-2 px-4">
                        <i id="modal-donasi-close" class="bi bi-x-lg cursor-pointer"></i>
                        <p class="text-lg">Jajan.in</p>
                        <div></div>
                    </div>
                    <div id="donate-alert" class="my-4 px-4 hidden" data-dismissible="alert">
                        <div class="mr-12  font-regular relative w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100"
                            id="msg-donate">Alert dismissible</div>
                    </div>
                    {{-- Step 1 --}}
                    <div id="step1" class="h-[650px]">
                        <div class="bg-primaryLight p-4">
                            <div class="flex flex-col items-center">
                                <img class="h-28 w-28 rounded-full object-cover bg-white p-2 shadow-lg"
                                    src="{{ $avatar == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $page->user->name : $avatar }}"
                                    alt="Profile">
                                <p class="font-extrabold text-base mt-2">{{ $page->user->name }}</p>
                                <p class="text-sm font-extralight">{{ $page->category->name ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-base font-medium mb-px">Beli Pedang Baru - 45%</p>
                                <div class="w-full bg-primaryLight border-2 border-white rounded-full h-3">
                                    <div class="bg-secondary h-2 rounded-full" style="width: 45%"></div>
                                </div>
                                <p class="text-sm text-[#5e5d5d] mt-1"><span class="font-bold">Rp 450.000</span>
                                    terkumpul dari Rp 1.000.000 </p>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col items-center">
                            <img src="{{ $unit->getFirstMediaUrl('unit') }}" class="h-14 w-14 object-contain"
                                alt="unit">
                            <p class="text-sm font-medium mt-2">{{ $unit->name }}</p>
                            <p class="text-xs font-light text-[#5e5d5d]">Rp
                                {{ number_format($unit->price, 0, ',', '.') }}/unit</p>
                            <p id="total1" class="font-bold font-base mt-4">Rp
                                {{ number_format($unit->price, 0, ',', '.') }}</p>
                            <div class="mt-2 flex items-center gap-4 text-lg">
                                <i onclick="minusJumlah()"
                                    class="bi bi-dash bg-primaryLight rounded-full text-black px-2 py-1 cursor-pointer"></i>
                                <p id="jumlah1" class="border-2 w-12 text-center rounded-md p-2">1</p>
                                <i onclick="addJumlah()"
                                    class="bi bi-plus bg-primary rounded-full text-white px-2 py-1 cursor-pointer"></i>
                            </div>
                            <div class="flex flex-wrap justify-center items-center gap-2 mt-3">
                                <div id="unit-count1" data-count="5"
                                    class="text-primary border border-primary rounded-full px-2 py-px text-xs cursor-pointer hover:bg-primary hover:text-white">
                                    5 Unit
                                </div>
                                <div id="unit-count2" data-count="10"
                                    class="text-primary border border-primary rounded-full px-2 py-px text-xs cursor-pointer hover:bg-primary hover:text-white">
                                    10 Unit
                                </div>
                                <div id="unit-count3" data-count="25"
                                    class="text-primary border border-primary rounded-full px-2 py-px text-xs cursor-pointer hover:bg-primary hover:text-white">
                                    25 Unit
                                </div>
                                <div id="unit-count4" data-count="50"
                                    class="text-primary border border-primary rounded-full px-2 py-px text-xs cursor-pointer hover:bg-primary hover:text-white">
                                    50 Unit
                                </div>
                                <div id="unit-count5" data-count="100"
                                    class="text-primary border border-primary rounded-full px-2 py-px text-xs cursor-pointer hover:bg-primary hover:text-white">
                                    100
                                    Unit
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 right-0 w-full">
                            <hr class="w-full h-px my-2 bg-gray-300 border-0">
                            <div id="unit-count6" class="flex justify-end">
                                <button id="next1"
                                    class="w-32 bg-primary text-white py-2 rounded-full shadow-lg m-2 font-bold text-sm">
                                    Next
                                    <i class="bi bi-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- Step 2 --}}
                    <div id="step2" class="p-4 h-[650px] hidden">
                        <div class="bg-primaryLight p-4 rounded-lg">
                            <p class="text-xs text-gray-600">Jajan.in Untuk</p>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center gap-2">
                                    <img class="h-16 w-16 rounded-full object-cover bg-white p-1 shadow-lg"
                                        src="{{ $avatar == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $page->user->name : $avatar }}"
                                        alt="Profile">
                                    <div>
                                        <p class="text-sm font-extrabold">{{ $page->user->name }}</p>
                                        <p class="text-xs font-extralight">{{ '@' . $page->user->username }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img id="unit-icon" class="h-14 w-14 object-contain transition-all duration-500"
                                        src="{{ $unit->getFirstMediaUrl('unit') }}" alt="unit">
                                    <div>
                                        <p class="text-sm font-bold">{{ $unit->name }}</p>
                                        <p class="text-xs font-extralight">Rp
                                            {{ number_format($unit->price, 0, ',', '.') }}/unit</p>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-4">Jajan.in Kamu</p>
                            <div class="flex items-center justify-between">
                                <div class="mt-2 flex items-center gap-2 text-sm">
                                    <i onclick="minusJumlah()"
                                        class="bi bi-dash bg-primaryLight rounded-full text-black px-2 py-px cursor-pointer"></i>
                                    <p id="jumlah2" class="border-2 w-8 text-center rounded-md p-1 bg-white">1</p>
                                    <i onclick="addJumlah()"
                                        class="bi bi-plus bg-primary rounded-full text-white p-1 px-2 cursor-pointer"></i>
                                </div>
                                <p id="total2" class="font-bold text-lg">Rp
                                    {{ number_format($unit->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center mt-4">
                            <input type="text" id="name" required placeholder="Nama"
                                value="{{ auth()->user()->name ?? '' }}"
                                class="w-full border text-base border-gray-300 rounded-md px-3 py-2 placeholder-primaryLight focus:border-primary focus:border-1 outline-none">
                            <textarea id="message" rows="4"
                                class="block mt-2 placeholder-primaryLight p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:border-primary focus:border-1 outline-none"
                                placeholder="Pesan Dukungan"></textarea>
                        </div>
                        <div class="flex items-center mt-2">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-2">
                            <label for="default-checkbox" class="ml-2 text-xs text-gray-400">Dukung Sebagai
                                Anonim</label>
                        </div>
                        <div class="absolute bottom-0 right-0 w-full">
                            <hr class="w-full h-px my-2 bg-gray-300 border-0">
                            <div class="flex justify-between items-center">
                                <button id="back1"
                                    class="w-32 text-black py-2 rounded-full m-2 font-bold text-sm">
                                    <i class="bi bi-arrow-left mr-2"></i>
                                    Back
                                </button>
                                <button id="next2"
                                    class="w-32 bg-primary text-white py-2 rounded-full shadow-lg m-2 font-bold text-sm">
                                    Next
                                    <i class="bi bi-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- Step 3 --}}
                    <div id="step3" class="p-4 h-[650px] hidden">
                        <div class="bg-primaryLight p-4 rounded-lg">
                            <p class="text-xs text-gray-600">Jajan.in Untuk</p>
                            <div class="flex items-center justify-between mt-2">
                                <div class="flex items-center gap-2">
                                    <img class="h-16 w-16 rounded-full object-cover bg-white p-1 shadow-lg"
                                        src="{{ $avatar == '' ? 'https://ui-avatars.com/api/?background=random&name=' . $page->user->name : $avatar }}"
                                        alt="Profile">
                                    <div>
                                        <p class="text-sm font-extrabold">{{ $page->user->name }}</p>
                                        <p class="text-xs font-extralight">{{ '@' . $page->user->username }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img class="h-14 w-14 object-contain" src="{{ $unit->getFirstMediaUrl('unit') }}"
                                        alt="unit">
                                    <div>
                                        <p class="text-sm font-bold">{{ $unit->name }}</p>
                                        <p class="text-xs font-extralight">Rp
                                            {{ number_format($unit->price, 0, ',', '.') }}/unit</p>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-4">Jajan.in Kamu</p>
                            <div class="flex items-center justify-between">
                                <div class="mt-2 flex items-center gap-2 text-sm">
                                    <i onclick="minusJumlah()"
                                        class="bi bi-dash bg-primaryLight rounded-full text-black px-2 py-px cursor-pointer"></i>
                                    <p id="jumlah3" class="border-2 w-8 text-center rounded-md p-1 bg-white">1</p>
                                    <i onclick="addJumlah()"
                                        class="bi bi-plus bg-primary rounded-full text-white p-1 px-2 cursor-pointer"></i>
                                </div>
                                <p id="total3" class="font-bold text-lg">Rp
                                    {{ number_format($unit->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <p class="text-base mt-6 text-gray-400 font-bold">Metode Pembayaran</p>
                        <div class="flex items-center gap-3 border p-2">
                            <img src="https://seeklogo.com/images/Q/quick-response-code-indonesia-standard-qris-logo-F300D5EB32-seeklogo.com.png"
                                alt="qris logo" class="h-16 w-16 object-contain">
                            <div>
                                <p class="font-bold text-lg">Qris</p>
                                <p class="text-xs text-[#818181] font-light">Siapkan aplikasi yang mendukung scan QRIS
                                </p>
                            </div>
                        </div>
                        <div class="absolute bottom-0 right-0 w-full">
                            <p class="text-xs text-center px-8 text-gray-500">Dengan melanjutkan pembayaran, anda telah
                                menyetujui
                                syarat dan ketentuan & kebijakan
                                privasi kami, serta memahami bahwa pembayaran dilakukan melalui <span
                                    class="text-primary">Midtrans</span>.</p>
                            <div
                                class="flex justify-between items-center mx-8 mt-2 bg-primaryLight py-1 px-4 rounded-full text-primary text-lg">
                                <p>Total</p>
                                <p id="total4">Rp {{ number_format($unit->price, 0, ',', '.') }}</p>
                            </div>
                            <hr class="w-full h-px my-2 bg-gray-300 border-0">
                            <div class="flex justify-between items-center">
                                <button id="back2"
                                    class="w-32 text-black py-2 rounded-full m-2 font-bold text-sm">
                                    <i class="bi bi-arrow-left mr-2"></i>
                                    Back
                                </button>
                                <button id="pay"
                                    class="w-32 bg-primary text-white py-2 rounded-full shadow-lg m-2 font-bold text-sm">
                                    Bayar
                                    <i class="bi bi-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        let price = {{ $unit->price }};
        let total = price;

        $(document).ready(function() {
            $('#open-donate').click(function() {
                $('#modal-donasi').removeClass('hidden');
            });
            $('#modal-donasi-close').click(function() {
                $('#modal-donasi').addClass('hidden');
            });
            $('#next1').click(function() {
                $('#step1').addClass('hidden');
                $('#step2').removeClass('hidden');
                $('#step3').addClass('hidden');
            });
            $('#next2').click(function() {
                $('#step1').addClass('hidden');
                $('#step2').addClass('hidden');
                $('#step3').removeClass('hidden');
            });
            $('#back1').click(function() {
                $('#step1').removeClass('hidden');
                $('#step2').addClass('hidden');
                $('#step3').addClass('hidden');
            });
            $('#back2').click(function() {
                $('#step1').addClass('hidden');
                $('#step2').removeClass('hidden');
                $('#step3').addClass('hidden');
            });
        });

        $('#unit-count1,#unit-count2,#unit-count3,#unit-count4,#unit-count5').click(function() {
            var count = $(this).data('count');
            $('#jumlah1').text(count);
            $('#jumlah2').text(count);
            $('#jumlah3').text(count);

            total = count * price;
            const showTotal = total.toLocaleString('id-ID', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            })
            $('#total1').text('Rp ' + showTotal);
            $('#total2').text('Rp ' + showTotal);
            $('#total3').text('Rp ' + showTotal);
            $('#total4').text('Rp ' + showTotal);
        });

        function addJumlah() {
            var jumlah = parseInt($('#jumlah1').text());
            jumlah += 2;
            $('#jumlah1').text(jumlah);
            $('#jumlah2').text(jumlah);
            $('#jumlah3').text(jumlah);

            total = jumlah * price;
            const showTotal = total.toLocaleString('id-ID', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            })
            $('#total1').text('Rp ' + showTotal);
            $('#total2').text('Rp ' + showTotal);
            $('#total3').text('Rp ' + showTotal);
            $('#total4').text('Rp ' + showTotal);
        }

        function minusJumlah() {
            if (parseInt($('#jumlah1').text()) > 2) {
                var jumlah = parseInt($('#jumlah1').text());
                jumlah -= 2;
                $('#jumlah1').text(jumlah);
                $('#jumlah2').text(jumlah);
                $('#jumlah3').text(jumlah);

                total = jumlah * price;
                const showTotal = total.toLocaleString('id-ID', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                })
                $('#total1').text('Rp ' + showTotal);
                $('#total2').text('Rp ' + showTotal);
                $('#total3').text('Rp ' + showTotal);
                $('#total4').text('Rp ' + showTotal);
            }
        }

        $('#pay').click(function() {
            $('#loading').removeClass('hidden');
            $('#donate-alert').addClass('hidden');
            $('#msg-donate').text('');

            const jumlah = $('#jumlah1').text();
            const message = $('#message').val();
            const name = $('#name').val();
            const anonymous = $('#default-checkbox').is(':checked');
            const total = price * jumlah;

            fetch("{{ route('api.payment') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        creator_id: {{ $page->id }},
                        display_name: name,
                        quantity: jumlah,
                        message: message,
                        anonymous: anonymous,
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status == 'error') {
                        $('#loading').addClass('hidden');
                        $('#donate-alert').removeClass('hidden');
                        $('#msg-donate').text(data.message);
                    } else {
                        window.location.href = data.redirect_url;
                    }
                });
        });
    </script>

</body>

</html>
