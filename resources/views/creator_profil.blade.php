<!doctype html>
<html>

<head>
    <title>Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/creator_profil.css')
    @vite('resources/css/creator_pop_up.css')
</head>

<body>
    <div  class="header justify-between p-5 px-24 flex flex-wrap flex-col md:flex-row md:items-center items-center">
        <div class="logo">
            <a href="/"><img src="{{ URL('assets/jajanin_logo.png')}}" alt="Jajanin Logo"></a>
        </div>
        <div class="menu_navigation">
            <ul class="flex content-center">
                <li ><a class="nav_pad flex" href="/creator_explorer"><img class="search_icon px-2" src="{{ URL('assets/Search_icon3.png')}}" alt="">Explorer Creator</a></li>
                <li ><div class="menu_separator"></div></li>
                <li ><a class="nav_pad flex" href="#">Register</a></li>
                <li><a href="#"><button class="lgn_btn inline-flex items-center border-0 mx-4 py-2 px-8 focus:outline-none rounded-full text-base mt-4 md:mt-0">Login
                </button></a></li>
            </ul>
        </div>
    </div>
    
    <!-- Profil_desk -->
    <!-- profil pict -->
    <div style="background-image: url({{ asset('assets/pd_bg.png')}}" class="profil_pict px-24">
      <img class="mx-auto" src="{{ URL('assets/astabg.png')}}" alt="">
      <div class="profilbtnicon">
        <button class="btn_desk rounded-full"><a class="flex justify-center" href="">
          <img class="btn_desk_img" src="{{ URL('assets/icon_follow.png')}}" alt="">Follow</a></button>
        </a></button>
          <img class="" src="{{ URL('assets/astaprofil.png')}}" alt="">
          <button class="btn_desk rounded-full"><a class="flex justify-center" href="">
          <img class="btn_desk_img2" src="{{ URL('assets/icon_share.png')}}" alt="">Share</a></button>
        </a></button>
      </div>
    </div>

    <!-- profil text -->
    <div class="text-center">
      <h1 class="profil_name">Asta Black Bull</h1>
      <h3 class="profil_role">Warrior</h3>
      <p class="deskripsi">Asta lahir dari Richita di Alam Terbengkalai Kerajaan Semanggi. Tak lama setelah kelahirannya, ibunya meninggalkannya di depan pintu gereja di Hage. Pada hari yang sama, Yuno juga ditempatkan di depan pintu,dan kedua bayi tersebut ditemukan oleh pendeta gereja, Pastor Orsi.</p>
    </div>

    <!-- social media -->
    <div class="sosmed_card py-4">
      <h1 class="text-center text-white text-3xl font-bold pb-5">Social Media</h1>
      <div class="flex justify-around">
        <button class="sosmed_btn"><a class="flex justify-around" href=""><img class="sosmed_btn_img" class="mx-auto" src="{{ URL('assets/icon_yt.png')}}" alt="">Youtube
        </a></button>
        <button class="sosmed_btn"><a class="flex justify-around" href=""><img class="sosmed_btn_img" class="mx-auto" src="{{ URL('assets/icon_fb.png')}}" alt="">Facebook
        </a></button>
        <button class="sosmed_btn"><a class="flex justify-around" href=""><img class="sosmed_btn_img" class="mx-auto" src="{{ URL('assets/icon_tiktok.png')}}" alt="">Tiktok
        </a></button>
        <button class="sosmed_btn"><a class="flex justify-around" href=""><img class="sosmed_btn_img" class="mx-auto" src="{{ URL('assets/icon_ig.png')}}" alt="">Instagram
        </a></button>
        <button class="sosmed_btn"><a class="flex justify-around" href=""><img class="sosmed_btn_img" class="mx-auto" src="{{ URL('assets/icon_twitter.png')}}" alt="">Twitter
        </a></button>
      </div>
    </div>

    <!-- statistic -->
    <div class="flex justify-center my-14">
      <div class="statistic_card">
        <div class="flex">
          <img class="img_scard" src="{{ URL('assets/s_follower.png')}}" alt="">
          <h1 class="stittle">Followers</h1>
        </div>
        <h1 class="sdata">2.3K</h1>
      </div>
      <div class="statistic_card">
        <div class="flex">
          <img class="img_scard" src="{{ URL('assets/s_reward.png')}}" alt="">
          <h1 class="stittle">Rewards</h1>
          <a class="ml-auto" href="#view"><button class="btn_reward">View</button></a>
        </div>
        <h1 class="sdata">37</h1>
      </div>
    </div>

    <!-- reword pop up -->
    <div id="view" class="pop_up">
      <div class="pop_view">
        <div class="view_header flex justify-between">
          <h1 class="text-base font-extrabold pt-0.5 ml-4">Reward Jajan.in Asta Black Bull</h1>
          <a href="#"><img class="close_btn_img2" src="{{ URL('assets/icon_close.png')}}" alt=""></a>
        </div>
        <div class="viewreward_content">
          <div class="vrc_main">
            <div class="vrc_reward_row1 flex">
              <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png')}}" alt="">
              <img class="img_reward_view" src="{{ URL('assets/astatembaga.png')}}" alt="">
              <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
              <a href="#donate1"><button class="view_donate_btn"><img class="kucing" src="{{ URL('assets/icon_kucing.png')}}" alt=""><span class="pt-0.5">Jajan.in 5 Unit</span></button></a>
            </div>
            <div class="vrc_reward_row2">
              <div class="gembok_line"></div>
              <div class="vrc_content">
                <div class="vrc_row">
                  <div class="vrc_col mb-2">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                  <div class="vrc_col">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vrc_main">
            <div class="vrc_reward_row1 flex">
              <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png')}}" alt="">
              <img class="img_reward_view" src="{{ URL('assets/astatembaga.png')}}" alt="">
              <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
              <a href="#donate1"><button class="view_donate_btn"><img class="kucing" src="{{ URL('assets/icon_kucing.png')}}" alt=""><span class="pt-0.5">Jajan.in 5 Unit</span></button></a>
            </div>
            <div class="vrc_reward_row2">
              <div class="gembok_line"></div>
              <div class="vrc_content">
                <div class="vrc_row">
                  <div class="vrc_col mb-2">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                  <div class="vrc_col">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vrc_main">
            <div class="vrc_reward_row1 flex">
              <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png')}}" alt="">
              <img class="img_reward_view" src="{{ URL('assets/astatembaga.png')}}" alt="">
              <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
              <a href="#donate1"><button class="view_donate_btn"><img class="kucing" src="{{ URL('assets/icon_kucing.png')}}" alt=""><span class="pt-0.5">Jajan.in 5 Unit</span></button></a>
            </div>
            <div class="vrc_reward_row2">
              <div class="gembok_line"></div>
              <div class="vrc_content">
                <div class="vrc_row">
                  <div class="vrc_col mb-2">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                  <div class="vrc_col">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vrc_main">
            <div class="vrc_reward_row1 flex">
              <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png')}}" alt="">
              <img class="img_reward_view" src="{{ URL('assets/astatembaga.png')}}" alt="">
              <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
              <a href="#donate1"><button class="view_donate_btn"><img class="kucing" src="{{ URL('assets/icon_kucing.png')}}" alt=""><span class="pt-0.5">Jajan.in 5 Unit</span></button></a>
            </div>
            <div class="vrc_reward_row2">
              <div class="gembok_line"></div>
              <div class="vrc_content">
                <div class="vrc_row">
                  <div class="vrc_col mb-2">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                  <div class="vrc_col">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vrc_main">
            <div class="vrc_reward_row1 flex">
              <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png')}}" alt="">
              <img class="img_reward_view" src="{{ URL('assets/astatembaga.png')}}" alt="">
              <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
              <a href="#donate1"><button class="view_donate_btn"><img class="kucing" src="{{ URL('assets/icon_kucing.png')}}" alt=""><span class="pt-0.5">Jajan.in 5 Unit</span></button></a>
            </div>
            <div class="vrc_reward_row2">
              <div class="gembok_line"></div>
              <div class="vrc_content">
                <div class="vrc_row">
                  <div class="vrc_col mb-2">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                  <div class="vrc_col">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="vrc_main">
            <div class="vrc_reward_row1 flex">
              <img class="img_reward_view mr-3" src="{{ URL('assets/icon_gembok.png')}}" alt="">
              <img class="img_reward_view" src="{{ URL('assets/astatembaga.png')}}" alt="">
              <h1 class="reward_info1">5 Tembaga Murni <span class="reward_info2">(4 item)</span></h1>
              <a href="#donate1"><button class="view_donate_btn"><img class="kucing" src="{{ URL('assets/icon_kucing.png')}}" alt=""><span class="pt-0.5">Jajan.in 5 Unit</span></button></a>
            </div>
            <div class="vrc_reward_row2">
              <div class="gembok_line"></div>
              <div class="vrc_content">
                <div class="vrc_row">
                  <div class="vrc_col mb-2">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                  <div class="vrc_col">
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                    <div class="vrc_card">
                      <img src="{{ URL('assets/wp_asta_hd.png')}}" alt="">
                      <div>
                        <h1>Demon Asta HD Wallpaper</h1>
                        <h2>#BlackClover  - 1 Minggu yang lalu</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>      
      </div>
    </div>

    <!-- donate -->
    <div class="donate_card">
      <h1 class="text-white text-4xl font-bold mb-5">Beli Pedang Baru</h1>
      <div class="flex">
        <h2 class="text-white text-3xl font-bold mb-5 pr-2">Rp 450.000</h2>
        <h2 class="text-white text-3xl mb-5">terkumpul dari Rp 1.000.000</h2>
      </div>
      <img class="mb-3" src="{{ URL('assets/Donate_Progress Bar.png')}}" alt="">
      <div class="flex justify-center">
        <h2 class="text-white text-3xl font-bold text-center mb-3 pr-2">45%</h2>
        <h2 class="text-white text-3xl text-center mb-3">tercapai</h2>
      </div>
      <div class="flex justify-center">
        <a href="#donate1"><button class="btn_support">Support</button></a>
      </div>
    </div>

    <!-- pop up donate -->
    <!-- donate package -->
    <div id="donate1" class="pop_up">
      <div class="pop_donate" style="margin-top: 30px;" >
        <div class="pop_header">
          <a href="#"><img class="close_btn_img" src="{{ URL('assets/icon_close.png')}}" alt=""></a>
          <h1 class="pop_title">Jajan.in</h1>
        </div>

        <div class="pop_body">
          <div class="pop_creator_profil">
            <img class="pop_creator_img" src="{{ URL('assets/astaprofil.png')}}" alt="">
            <h1 class="text-center font-semibold text-base">Asta Black Bull</h1>
            <p class="text-center font-light text-xs">Warrior</p>
            <p class="text-sm text-white">beli pedang baru</p>
            <div class="flex text-sm text-white">
              <p class="mr-1 font-bold">45%</p>
              <p class="font-light">tercapai</p>
            </div>
            <img class="" src="{{ URL('assets/Donate_Progress Bar2.png')}}" alt="">
            <div class="flex text-sm text-white">
              <p class="mr-1 font-bold">Rp 450.000</p>
              <p class="font-light">terkumpul dari Rp 1.000.000</p>
            </div>
          </div>
          <div>
            <img class="pop_creator_img2" src="{{ URL('assets/astatembaga.png')}}" alt="">
            <h1 class="text-center font-semibold">Tembaga Murni</h1>
            <p class="text-center font-light text-xs text-inherit">Rp 2.000/unit</p>
            <h1 class="text-center font-bold py-5">Rp 50.000</h1>
            <div class="flex justify-center">
              <button class="btn_count_donate"><img src="{{ URL('assets/.png')}}" alt="">-</button>
              <p class="donate_count">25</p>
              <button class="btn_count_donate"><img src="{{ URL('assets/.png')}}" alt="">+</button>
            </div>
            <div class="flex justify-around mx-5">
              <p class="donate_option">5 Unit</p>
              <p class="donate_option">5 Unit</p>
              <p class="donate_option">5 Unit</p>
              <p class="donate_option">5 Unit</p>
              <p class="donate_option">5 Unit</p>
            </div>
          </div>
        </div>

        <div class="pop_footer">
          <div class="pop_footer2">
            <a class="ml-auto" href="#donate2"><button class="next_btn">Next<img class="next_img" src="{{ URL('assets/icon_next.png')}}" alt=""></button></a>
          </div>
        </div>
      </div>
    </div>

    <div id="donate2" class="pop_up">
      <div class="pop_donate" style="margin-top: 30px;" >
        <div class="pop_header">
          <a href="#"><img class="close_btn_img" src="{{ URL('assets/icon_close.png')}}" alt=""></a>
          <h1 class="pop_title">Jajan.in</h1>
        </div>

        <div class="pop_body pt-3.5">
          <div class="donate_info">
            <h1 class="text-base text-white font-bold mb-2">Jajan.in Untuk</h1>
            <div class="flex">
              <div class="flex justify-start w-1/2">
                <img class="w-20 h-auto" src="{{ URL('assets/astaprofil.png')}}" alt="">
                <div class="my-auto ml-2">
                  <h1 class="text-sm font-bold">Asta Black Bull</h1>
                  <p class="text-xs">@astrablackbull</p>
                </div>
              </div>
              <div class="flex justify-start w-1/2">
                <img class="w-16 h-16 mt-1 ml-2" src="{{ URL('assets/astatembaga.png')}}" alt="">
                <div class="my-auto ml-2">
                  <h1 class="text-sm">Tembaga Murni</h1>
                  <p class="text-xs">Rp 2.000/ Unit</p>
                </div>
              </div>              
            </div>
            <h1 class="text-base text-white font-bold my-2">Jajan.in Kamu</h1>
            <div class="flex justify-between">
              <div class="flex justify-start">
                <button class="btn_count_donate"><img src="{{ URL('assets/.png')}}" alt="">-</button>
                <p class="donate_count">25</p>
                <button class="btn_count_donate"><img src="{{ URL('assets/.png')}}" alt="">+</button>
              </div>
              <p class="font-extrabold text-2xl">Rp 50.000</p>
            </div>
          </div>
          <div class="m-4">
            <div class="relative mb-4">
              <label for="full-name" class="leading-7 text-sm text-slate-500">Name</label>
              <input type="text" id="full-name" name="full-name" class="w-full bg-white rounded-lg border border-black focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-black py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="email" class="leading-7 text-sm text-slate-500">Pesan Dukungan</label>
              <input type="email" id="email" name="email" class="w-full h-24 bg-white rounded-lg border border-black focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-black py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          <label class="ml-4">
            <input type="checkbox" checked="checked">
            <span class="text-cs text-slate-500">Jadikan pesan private</span>
          </label>
        </div>

        <div class="pop_footer">
          <div class="pop_footer2">
            <a href="#donate1"><button class="back_btn"><img class="back_img" src="{{ URL('assets/icon_back.png')}}" alt="">Back</button></a>
            <a href="#donate3"><button class="next_btn">Next<img class="next_img" src="{{ URL('assets/icon_next.png')}}" alt=""></button></a>
          </div>
        </div>
      </div>
    </div>

    <div id="donate3" class="pop_up">
      <div class="pop_donate" style="margin-top: 30px;" >
        <div class="pop_header">
          <a href="#"><img class="close_btn_img" src="{{ URL('assets/icon_close.png')}}" alt=""></a>
          <h1 class="pop_title">Jajan.in</h1>
        </div>

        <div class="pop_body pt-3.5">
          <div class="donate_info">
            <h1 class="text-base text-white font-bold mb-2">Jajan.in Untuk</h1>
            <div class="flex">
              <div class="flex justify-start w-1/2">
                <img class="w-20 h-auto" src="{{ URL('assets/astaprofil.png')}}" alt="">
                <div class="my-auto ml-2">
                  <h1 class="text-sm font-bold">Asta Black Bull</h1>
                  <p class="text-xs">@astrablackbull</p>
                </div>
              </div>
              <div class="flex justify-start w-1/2">
                <img class="w-16 h-16 mt-1 ml-2" src="{{ URL('assets/astatembaga.png')}}" alt="">
                <div class="my-auto ml-2">
                  <h1 class="text-sm">Tembaga Murni</h1>
                  <p class="text-xs">Rp 2.000/ Unit</p>
                </div>
              </div>              
            </div>
            <h1 class="text-base text-white font-bold my-2">Jajan.in Kamu</h1>
            <div class="flex justify-between">
              <div class="flex justify-start">
                <button class="btn_count_donate"><img src="{{ URL('assets/.png')}}" alt="">-</button>
                <p class="donate_count">25</p>
                <button class="btn_count_donate"><img src="{{ URL('assets/.png')}}" alt="">+</button>
              </div>
              <p class="font-extrabold text-2xl">Rp 50.000</p>
            </div>
            <div class="flex justify-between mt-2">
              <h1 class="font-bold text-xl">Biaya Transfer</h1>
              <p class="font-extrabold text-2xl">Rp 80</p>
            </div>
          </div>
          <div class="payment">
            <h1>Pilih Metode Pembayaran</h1>
            <div class="payment_method">
              <div class="w-1/4">
                <img class="w-14 mx-auto mt-1" src="{{URL('assets/qrcode.png')}}" alt="">
              </div>
              <div class="w-1/2">
                <p class="text-2xl font-bold">QRIS</p>
                <p class="text-xs text-inherit">Siapkan aplikasi yang mendukung scan</p>
              </div>
              <div class="w-1/4">
                <img class="w-6 mx-auto mt-4" src="{{URL('assets/icon_down_arrow.png')}}" alt="">
              </div>
            </div>
            <p class="text-center text-xs text-inherit">Dengan melanjutkan pembayaran, anda telah menyetujui syarat dan ketentuan & kebijakan privasi kami, serta memahami bahwa pembayaran dilakukan melalui <span class="text-violet-600">Midtrans.</span></p>
            <div class="total">
              <p>Total</p>
              <p>Rp 50.080</p>
            </div>
          </div>
        </div>

        <div class="pop_footer">
          <div class="pop_footer2">
            <a href="#donate2"><button class="back_btn"><img class="back_img" src="{{ URL('assets/icon_back.png')}}" alt="">Back</button></a>
            <a href=""><button class="next_btn">Finish</button></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Profil comenter -->
    <div class="com_card">
      <div class="com_row">
        <div class="flex">
          <img class="img_com" src="{{ URL('assets/comenter_pict.png')}}" alt="">
          <div class="right_com_col">
            <div class="com_res">
              <h1 class="com_name">Anggie Nugroho</h1>
              <h1 class="com_treat">mentraktir</h1>
              <h1 class="com_donate">25 Tembaga Murni</h1>
              <h1 class="com_role">pada Astra Black Bull </h1>
            </div>
            <p class="lates_com">2 hari yang lalu</p>
            <div class="com_chat">
              <p>bang ini Tembaga Murninya nya hehe</p>
            </div>
          </div>
        </div>
      </div>
      <div class="com_row">
        <div class="flex">
          <img class="img_com" src="{{ URL('assets/comenter_pict.png')}}" alt="">
          <div class="right_com_col">
            <div class="com_res">
              <h1 class="com_name">Seseorang</h1>
              <h1 class="com_treat">mentraktir</h1>
              <h1 class="com_donate">10 Tembaga Murni</h1>
              <h1 class="com_role">pada Astra Black Bull </h1>
            </div>
            <p class="lates_com">6 hari yang lalu</p>
          </div>
        </div>
      </div>
      <div class="com_row">
        <div class="flex">
          <img class="img_com" src="{{ URL('assets/comenter_pict.png')}}" alt="">
          <div class="right_com_col">
            <div class="com_res">
              <h1 class="com_name">Lah</h1>
              <h1 class="com_treat">mentraktir</h1>
              <h1 class="com_donate">100 Tembaga Murni</h1>
              <h1 class="com_role">pada Astra Black Bull </h1>
            </div>
            <p class="lates_com">2 Minggu yang lalu</p>
            <div class="com_chat">
              <p>bang ini Tembaga Murninya nya hehe</p>
            </div>
          </div>
        </div>
      </div>
      <div class="com_row">
        <div class="flex">
          <img class="img_com" src="{{ URL('assets/comenter_pict.png')}}" alt="">
          <div class="right_com_col">
            <div class="com_res">
              <h1 class="com_name">ilhamjii</h1>
              <h1 class="com_treat">mentraktir</h1>
              <h1 class="com_donate">5 Tembaga Murni</h1>
              <h1 class="com_role">pada Astra Black Bull </h1>
            </div>
            <p class="lates_com">2 Minggu yang lalu</p>
          </div>
        </div>
      </div>
      <div class="com_row">
        <div class="flex">
          <img class="img_com" src="{{ URL('assets/comenter_pict.png')}}" alt="">
          <div class="right_com_col">
            <div class="com_res">
              <h1 class="com_name">ltz_Ryhanch</h1>
              <h1 class="com_treat">mentraktir</h1>
              <h1 class="com_donate">25 Tembaga Murni</h1>
              <h1 class="com_role">pada Astra Black Bull </h1>
            </div>
            <p class="lates_com">1 Bulan yang lalu</p>
          </div>
        </div>
      </div>
    </div>

    <div class="footer ">
        <footer class="">
          <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
            <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
              <img src="{{ URL('assets/jajanin_logo2.png')}}" alt="">
              <p class="mt-2 text-sm text-white">Our vision is to provide convenience and help increase your sales business.</p>
            </div>
            <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center justify-end">
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
    
</body>

</html>
