<!doctype html>
<html>

<head>
    <title>Explorer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/creator_explorer.css')
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

    <div class="content py-16">
        <h1 class="text-center text-4xl font-extrabold pb-16">Temukan Content Creator yang Menarik</h1>
        <!-- preference -->
        <div class="filter_preference flex justify-center pb-8">
            <button class="preference flex"><img class="img_preference" src="{{ URL('assets/favorite.png')}}" alt="">Favorite</button>
            <button class="preference flex"><img class="img_preference" src="{{ URL('assets/pilihan.png')}}" alt="">Pilihan</button>
            <button class="preference flex"><img class="img_preference" src="{{ URL('assets/live.png')}}" alt="">Live</button>
            <button class="preference flex"><img class="img_preference" src="{{ URL('assets/popular.png')}}" alt="">Populer</button>
            <button class="preference flex"><img class="img_preference" src="{{ URL('assets/trending.png')}}" alt="">Trending</button>
        </div>
        <!-- filter creator -->
        <div class="filter_creator flex justify-center">
            <img class="" src="{{ URL('assets/al_icon.png')}}" alt="">
            <button class="fcreator">Favorite</button>
            <button class="fcreator">Animation</button>
            <button class="fcreator">Blogging</button>
            <button class="fcreator">Cosplay</button>
            <button class="fcreator">Design</button>
            <button class="fcreator">Education</button>
            <button class="fcreator">Comics and Cartoons</button>
            <button class="fcreator">Gaming</button>
            <button class="fcreator">Streaming</button>
            <button class="fcreator">Other</button>
            <img class="" src="{{ URL('assets/ar_icon.png')}}" alt="">
        </div>
        <!-- card_creator -->
        <div class="row px-8 py-8">
            <div class="column flex justify-around flex-wrap flex-col md:flex-row md:items-center items-center">
                <a href="creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_ichigo.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_ichigo.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Ichigo Kurasaki</h1>
                            <h2 class="Card_id text-center">@IchigoKurasaki</h2>
                            <p class="text-center">Shinegami</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_yuri.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_yuri.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Kwon Yuri </h1>
                            <h2 class="Card_id text-center">@yurikwn09_</h2>
                            <p class="text-center">Creator</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_luffy.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_luffy.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Monkey D. Luffy</h1>
                            <h2 class="Card_id text-center">@MonkeyDLuffy</h2>
                            <p class="text-center">Pirates</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_goku.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_goku.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Son Goku</h1>
                            <h2 class="Card_id text-center">@Son_Goku</h2>
                            <p class="text-center">Father</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                
            </div>
        </div>
        <div class="row px-8 py-8">
            <div class="column flex justify-around flex-wrap flex-col md:flex-row md:items-center items-center">
                <a href="creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_ichigo.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_ichigo.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Ichigo Kurasaki</h1>
                            <h2 class="Card_id text-center">@IchigoKurasaki</h2>
                            <p class="text-center">Shinegami</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_yuri.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_yuri.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Kwon Yuri </h1>
                            <h2 class="Card_id text-center">@yurikwn09_</h2>
                            <p class="text-center">Creator</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_luffy.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_luffy.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Monkey D. Luffy</h1>
                            <h2 class="Card_id text-center">@MonkeyDLuffy</h2>
                            <p class="text-center">Pirates</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_goku.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_goku.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Son Goku</h1>
                            <h2 class="Card_id text-center">@Son_Goku</h2>
                            <p class="text-center">Father</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                
            </div>
        </div>
        <div class="row px-8 py-8">
            <div class="column flex justify-around flex-wrap flex-col md:flex-row md:items-center items-center">
                <a href="creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_ichigo.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_ichigo.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Ichigo Kurasaki</h1>
                            <h2 class="Card_id text-center">@IchigoKurasaki</h2>
                            <p class="text-center">Shinegami</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_yuri.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_yuri.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Kwon Yuri </h1>
                            <h2 class="Card_id text-center">@yurikwn09_</h2>
                            <p class="text-center">Creator</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_luffy.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_luffy.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Monkey D. Luffy</h1>
                            <h2 class="Card_id text-center">@MonkeyDLuffy</h2>
                            <p class="text-center">Pirates</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_goku.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_goku.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Son Goku</h1>
                            <h2 class="Card_id text-center">@Son_Goku</h2>
                            <p class="text-center">Father</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                
            </div>
        </div>
        <div class="row px-8 py-8">
            <div class="column flex justify-around flex-wrap flex-col md:flex-row md:items-center items-center">
                <a href="creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_ichigo.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_ichigo.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Ichigo Kurasaki</h1>
                            <h2 class="Card_id text-center">@IchigoKurasaki</h2>
                            <p class="text-center">Shinegami</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_yuri.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_yuri.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Kwon Yuri </h1>
                            <h2 class="Card_id text-center">@yurikwn09_</h2>
                            <p class="text-center">Creator</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_luffy.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_luffy.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Monkey D. Luffy</h1>
                            <h2 class="Card_id text-center">@MonkeyDLuffy</h2>
                            <p class="text-center">Pirates</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/creator_profil">
                    <div class="card_creator">
                        <img class="img_bg" src="{{ URL('assets/bg_goku.png')}}" alt="">
                        <img class="img_profile" src="{{ URL('assets/profil_goku.png')}}" alt="">
                        <div class="card_context">
                            <h1 class="Card_title text-center">Son Goku</h1>
                            <h2 class="Card_id text-center">@Son_Goku</h2>
                            <p class="text-center">Father</p>
                            <div class="flex justify-center py-2">
                                <img class="fi" src="{{ URL('assets/favorite_icon.png')}}" alt="">
                                <p class="fc">Favorite</p>
                            </div>
                        </div>
                    </div>
                </a>
                
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
