<!doctype html>
<html>

<head>
    <title>Jajan.in | interact ur fans</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="header justify-between p-5 px-24 flex flex-wrap flex-col md:flex-row md:items-center items-center">
        <div class="logo">
            <a href="/"><img
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687538877/jajanin_logo2_clbyam.png"
                    alt="Jajanin Logo"></a>
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
    <div class="cta px-24 py-10 justify-between flex flex-wrap flex-col md:flex-row md:items-center items-center">
        <div class="cta_left my-20">
            <h1 class="text-6xl">Let's give support for Creators and interact with your Fans</h1>
            <p class="text-lg text-slate-200">Di sini kamu bisa memberikan dukungan dan ikut berkontribusi untuk content
                creator favorit kamu secara mudah dan menyenangkan dengan jajan.in</p>
            <div class="cta_input flex p-6 mt-20 rounded-full items-center">
                <p class="text-3xl">{{ env('APP_NAME') }}/</p>
                <span><input id="username"
                        class="create_input text-3xl bg-purple-800 text-white  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        type="text"></span>
                <button id="create"
                    class="lgn_btn inline-flex items-center border-0 mx-4 py-2 px-8 focus:outline-none rounded-full text-base mt-4 md:mt-0">Create!
                </button>
            </div>
        </div>
        <div class="cta_right">
            <img class="cta_img px-20"
                src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687538918/cta_img_main_fkqw02.png"
                alt="">
        </div>
    </div>

    <div style="background-image: url('https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539033/counter_background_hn3ybk.png')"
        class="counter rounded-3xl drop-shadow-2xl flex justify-between items-center">
        <div class="flex items-center">
            <img class="counter_img"
                src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539143/counter_creator_yhf2bz.png"
                alt="">
            <div class="">
                <h1 class="counter_count">345.700</h1>
                <p class="counter_content text-lg text-semibold">Creators</p>
            </div>
        </div>
        <div class="flex items-center">
            <img class="counter_img"
                src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539143/counter_jajanan_quifhd.png"
                alt="">
            <div class="">
                <h1 class="counter_count">345.700</h1>
                <p class="counter_content text-lg text-semibold">Jajanan</p>
            </div>
        </div>
        <div class="flex items-center">
            <img class="counter_img"
                src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539142/counter_supporters_hwz3uw.png"
                alt="">
            <div class="">
                <h1 class="counter_count">345.700</h1>
                <p class="counter_content text-lg text-semibold">Supporters</p>
            </div>
        </div>
    </div>

    <div class="about_us px-24 justify-between flex flex-wrap flex-col md:flex-row md:items-center items-center">
        <div class="about_us_left mr-">
            <img class="pr-6 pl-20"
                src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539282/aboutus_left_mhbbmp.png"
                alt="">
        </div>
        <div class="about_us_right">
            <div class="about_us_content">
                <h1 class="about_us_title text-3xl font-semibold">About Us</h1>
                <h3 class="py-8 text-4xl font-semibold	">Memudahkan Konten Kreator Untuk Mengumpulkan Dana</h3>
                <p class="text-base font-normal pb-3">Jajan.in adalah platform crowdfunding untuk dukungan finansial
                    kepada kreator konten, seniman, dan nirlaba. Para kreator dapat mengumpulkan dana untuk proyek
                    mereka dan memberikan reward kepada pendukung.</p>
            </div>
            <div class="about_us_point flex">
                <img class="aboutus_icon"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539455/aboutus_donate_g2xmki.png"
                    alt="">
                <div>
                    <h3 class="font-semibold text-lg">Donasi</h3>
                    <p class="text-base">Memberikan dukungan kepada idola dan konten kreator lainnya.</p>
                </div>
            </div>
            <div class="about_us_point flex">
                <img class="aboutus_icon"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539455/aboutus_creator_dgzdoc.png"
                    alt="">
                <div>
                    <h3 class="font-semibold text-lg">Creator</h3>
                    <p class="text-base">Menjadi konten kreator untuk mengumpulkan dana dari fans anda.</p>
                </div>
            </div>
            <div class="about_us_point flex">
                <img class="aboutus_icon"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539454/aboutus_reward_gi62km.png"
                    alt="">
                <div>
                    <h3 class="font-semibold text-lg">Reward</h3>
                    <p class="text-base">Mendapatkan hadiah dari dukungan kepada konten kreator kesukaan anda</p>
                </div>
            </div>
        </div>
    </div>
    <div class="howwork text-center">
        <h1 class="howwork_title ">Bagaimana Cara Kerjanya</h1>
        <h3 class="pt-16 text-xl font-bold">Mudah dan aman</h3>
        <div class="howwork_content flex justify-between ">
            <div class="howwork_point text-center">
                <img class="howwork_img mx-auto"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539596/howwork1_ckilmu.png"
                    alt="">
                <h3 class="howwork_content_title text-3xl font-semibold">Buat Campaign</h3>
                <p class="text-lg">Buat karya terbaik kamu dalam bentuk tulisan, audio, video, dan gambar dan jadikan
                    sebagai reward untuk para supportermu</p>
            </div>
            <img class="howwork_arrow"
                src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539596/howwork_arrow_ik2djb.png"
                alt="">
            <div class="howwork_point text-center">
                <img class="howwork_img mx-auto"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539596/howwork2_kqd7ft.png"
                    alt="">
                <h3 class="howwork_content_title text-3xl font-semibold">Bagikan dan raih dukungan</h3>
                <p class="text-lg">Bagikan link karya atau link jajan.in mu di sosial media dan dapatkan dukungan dari
                    supporter kamu.</p>
            </div>
            <img class="howwork_arrow"
                src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539596/howwork_arrow_ik2djb.png"
                alt="">
            <div class="howwork_point text-center">
                <img class="howwork_img mx-auto"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539597/howwork3_qaigbe.png"
                    alt="">
                <h3 class="howwork_content_title text-3xl font-semibold">Cairkan jajan.in</h3>
                <p class="text-lg">Kamu bisa cairkan uang jajan.in kamu ke beragam pilihan rekening dan e-wallet sesuai
                    yang kamu mau.</p>
            </div>
        </div>
    </div>

    <div style="background-image: url('https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539828/why_bg_k6ei9c.png')"
        class="why">
        <h1 class="py-24 text-center text-white text-4xl font-semibold">Kenapa harus Jajan.in</h1>
        <p class="pb-24 text-center text-white ">Membantu mengumpulkan dana untuk mewujudkan harapan kamu</p>
        <div
            class="why_content px-24 justify-between flex flex-wrap flex-col md:flex-row md:items-center items-center">
            <div class="why_point">
                <img class="why_img mx-auto"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539829/why_goal_xmvc5a.png"
                    alt="">
                <h3 class="why_title text-center text-slate-300 text-2xl font-semibold">Goals</h3>
                <p class=" text-center text-slate-300 text-sm">Buat target penggalangan untuk karya mu, ajak supporter
                    untuk berpartisipasi mewujudkan harapan kamu!</p>
            </div>
            <div class="why_point">
                <img class="why_img mx-auto"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539828/why_sub_itqrh8.png"
                    alt="">
                <h3 class="why_title text-center text-slate-300 text-2xl font-semibold">Subscription As Supporter</h3>
                <p class=" text-center text-slate-300 text-sm">Ajak supporter berlangganan konten eksklusif mu dan buat
                    penghasilan bulanan!</p>
            </div>
            <div class="why_point">
                <img class="why_img mx-auto"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539828/why_aiop_l8hjjq.png"
                    alt="">
                <h3 class="why_title text-center text-slate-300 text-2xl font-semibold">All-in-One Platform</h3>
                <p class=" text-center text-slate-300 text-sm">Jajan.in untuk semua fitur. Upload karya mu dalam
                    berbagai format: artikel, komik, lagu, foto dan masih banyak lagi!</p>
            </div>
            <div class="why_point">
                <img class="why_img mx-auto"
                    src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687539829/why_mf_ejwzyb.png"
                    alt="">
                <h3 class="why_title text-center text-slate-300 text-2xl font-semibold">Minimum Fee</h3>
                <p class=" text-center text-slate-300 text-sm">Rasakan manfaat dari trakteer dengan biaya penanganan
                    yang sangat murah, hanya 5%!</p>
            </div>
        </div>
    </div>

    <div class="trust pb-24">
        <h1 class="trust_title text-center pt-16">Dipercaya oleh para konten kreator</h1>
        <p class="trust_desk text-lg text-center py-8 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut lab</p>
        <div class="trust_category flex justify-center">
            <button class="trust_button_category rounded-full text-lg">Artist</button>
            <button class="trust_button_category rounded-full text-lg">Cosplayer</button>
            <button class="trust_button_category rounded-full text-lg">Writer</button>
            <button class="trust_button_category rounded-full text-lg">Lainnya</button>
            <button class="trust_button_category rounded-full text-lg flex justify center">
                <img class="search_icon pr-3" src="{{ URL('assets/Search_icon2.png') }}" alt="">
                Explore All Creator
            </button>
        </div>
        <div class="px-24 pt-12 justify-around flex flex-wrap flex-col md:flex-row md:items-center items-center">
            <div class="testimoni_content">
                <div class="flex">
                    <img class="testimoni_img"
                        src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687540047/testimoni1_nezm7i.png"
                        alt="">
                    <div>
                        <div class="testimoni_user flex justify-between pb-2">
                            <div>
                                <h1>Vincent van Gogh</h1>
                                <h2>@vincentvan</h2>
                            </div>
                            <a class="flex text-purple-800" href="#">Lihat Halaman Profil <i
                                    class="bi bi-chevron-right ml-2"></i></a>
                        </div>
                        <div class="testimoni_folowers flex justify-around items-center">
                            <i class="fa-solid fa-cake-candles text-secondary"></i>
                            <p>Dijalanin lebih dari 1.545 kue</p>
                        </div>
                    </div>
                </div>
                <p class="pt-4">"Saya berterima kasih kepada jajan.in sudah membantu para kreator untuk mendapatkan
                    apresiasi lebih berupa donasi. Tetap sukses trakteer! Thank you for all of your hardworks!"</p>
            </div>
            <div class="testimoni_content">
                <div class="flex">
                    <img class="testimoni_img"
                        src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687540047/testimoni2_lrdy80.png"
                        alt="">
                    <div>
                        <div class="testimoni_user flex justify-between pb-2">
                            <div>
                                <h1>Vestia Zeta</h1>
                                <h2>@zetalucuuu</h2>
                            </div>
                            <a class="flex text-purple-800" href="#">Lihat Halaman Profil <i
                                    class="bi bi-chevron-right ml-2"></i></a>
                        </div>
                        <div class="testimoni_folowers flex justify-around items-center">
                            <i class="fa-solid fa-cake-candles text-secondary"></i>
                            <p>Dijalanin lebih dari 1.545 kue</p>
                        </div>
                    </div>
                </div>
                <p class="pt-4">"Jajan.in itu buatku paling cocok untuk sharing content, jajan.in rame sekalii! Admin
                    fast response pencairan dana dll juga cepat! Sukses terus dan semoga makin rame ya jajan.in!"</p>
            </div>
        </div>
    </div>

    <div class="qna px-24 py-24">
        <h1 class="qna_tittle text-center">MASIH ADA PERTANYAAN ?</h1>
        <p class="text-center text-xl py-8">Anda akan menemukan pertanyaan umum di bawah ini, tetapi jika anda ingin
            tahu lebih banyak, hubungi saja!</p>
        <div class="flex justify-center">
            <div>
                <div class="qna_opsi rounded-full flex justify-between">
                    <p class="text-2xl">Pencairan Dana</p>
                    <i class="bi bi-chevron-right text-2xl font-bold text-primary"></i>
                </div>
                <div class="qna_opsi rounded-full flex justify-between">
                    <p class="text-2xl">Potongan biaya</p>
                    <i class="bi bi-chevron-right text-2xl font-bold text-primary"></i>
                </div>
                <div class="qna_opsi rounded-full flex justify-between">
                    <p class="text-2xl">Tentang aplikasi</p>
                    <i class="bi bi-chevron-right text-2xl font-bold text-primary"></i>
                </div>
                <div class="qna_opsi rounded-full flex justify-between">
                    <p class="text-2xl">Akun dan data</p>
                    <i class="bi bi-chevron-right text-2xl font-bold text-primary"></i>
                </div>
            </div>
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
        const create = document.getElementById('create');
        const username = document.getElementById('username');
        create.addEventListener('click', () => {
            window.location.href = `/register?user=${username.value}`;
        });
    </script>
</body>

</html>
