<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Jajan.in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    @vite('resources/css/app.css')
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
                <li><a class="nav_pad flex" href="{{ route('page.register') }}">Register</a></li>
                <li><a href="{{ route('page.login') }}"><button
                            class="lgn_btn inline-flex items-center border-0 mx-4 py-2 px-8 focus:outline-none rounded-full text-base mt-4 md:mt-0">Login
                        </button></a></li>
            </ul>
        </div>
    </div>
    <div class="h-screen w-full bg-primary grid place-items-center">
        <div class="bg-white p-8 rounded-xl w-2/6 flex justify-center flex-col items-center">
            <p class="text-3xl font-bold mb-6">Masuk</p>
            <div
                class="flex justify-start items-center border-2 border-black px-8 py-3 w-4/5 rounded-full cursor-pointer text-sm">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2008px-Google_%22G%22_Logo.svg.png"
                    alt="google image" class="w-4">
                <p class="flex-1 text-center">Continue With Google</p>
            </div>
            <div
                class="flex justify-start items-center border-2 border-black px-8 py-3 w-4/5 rounded-full cursor-pointer text-sm mt-5">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/2048px-Facebook_f_logo_%282019%29.svg.png"
                    alt="google image" class="w-4">
                <p class="flex-1 text-center">Continue With Facebook</p>
            </div>
            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            @if ($errors->any())
                {!! implode('', $errors->all('<div class="w-4/5 flex p-4 mb-4 text-red-800 rounded-lg bg-red-200" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        :message
                    </div>
                </div>')) !!}
            @endif
            @if (session('success'))
                <div class="w-4/5 flex p-4 mb-4 text-red-800 rounded-lg bg-red-200" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST" class="w-full flex justify-center flex-col items-center">
                @csrf
                <div class="mb-6 text-sm w-4/5">
                    <label for="email" class="mb-2 text-black font-bold">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-2 text-gray-900 border border-gray-600 rounded-lg focus:ring-primary focus:border-primary"
                        autocomplete="off" required>
                </div>
                <div class="mb-6 text-sm w-4/5">
                    <label for="password" class="mb-2 text-black font-bold">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <i class="bi bi-eye"></i>
                        </div>
                        <input type="password" id="password" name="password"
                            class="block w-full p-2 text-gray-900 border border-gray-600 rounded-lg focus:ring-primary focus:border-primary" required>
                    </div>
                </div>
                <label class="relative inline-flex items-center cursor-pointer w-4/5 text-sm">
                    <input type="checkbox" name="remember" value="" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-primary peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                    </div>
                    <span class="ml-3 text-md font-medium text-black">Ingat Saya</span>
                </label>
                <button class="w-4/5 bg-primary text-white py-2 rounded-lg mt-6 font-bold text-sm">
                    Masuk
                </button>
            </form>
            <hr class="w-4/5 h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="text-sm">Belum punya akun? <a href="{{ route('page.register') }}"
                    class="underline cursor-pointer hover:text-primary">Daftar
                    Jajan.in</a></p>
        </div>
    </div>
</body>

</html>
