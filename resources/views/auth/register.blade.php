<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Jajan.in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="w-ful grid place-items-center">
        <div class="p-8 rounded-xl w-6/12 flex flex-col justify-center items-center">
            <img src="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687234627/logo_tddyns.png" alt="logo jajanin"
                class="w-52 mb-4">
            <p class="text-2xl mb-4 font-extrabold">Daftar gratis untuk Jajanin idola kamu</p>
            <div
                class="flex justify-start items-center border-2 border-black px-8 py-3 w-3/6 rounded-full cursor-pointer text-sm">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2008px-Google_%22G%22_Logo.svg.png"
                    alt="google image" class="w-4">
                <p class="flex-1 text-center">Continue With Google</p>
            </div>
            <div
                class="flex justify-start items-center border-2 border-black px-8 py-3 w-3/6 rounded-full cursor-pointer text-sm mt-5">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/2048px-Facebook_f_logo_%282019%29.svg.png"
                    alt="google image" class="w-4">
                <p class="flex-1 text-center">Continue With Facebook</p>
            </div>
            <div class="inline-flex items-center justify-center w-4/6">
                <hr class="w-full h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                <span class="absolute px-3 text-gray-900 -translate-x-1/2 bg-white left-1/2">OR</span>
            </div>
            @if ($errors->any())
                {!! implode('', $errors->all('<div class="w-4/6 flex p-4 mb-4 text-red-800 rounded-lg bg-red-200" role="alert">
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
            <form action="{{ route('register') }}" method="POST" class="w-full flex flex-col justify-center items-center">
                @csrf
                <div class="mb-6 text-sm w-4/6">
                    <label for="name" class="mb-4 text-black font-bold">Nama Profile</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full p-2 text-gray-900 border border-gray-600 rounded-lg focus:ring-primary focus:border-primary" autocomplete="off">
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="email" class="mb-4 text-black font-bold">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                        class="w-full p-2 text-gray-900 border border-gray-600 rounded-lg focus:ring-primary focus:border-primary" autocomplete="off">
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="username" class="mb-4 text-black font-bold">Username</label>
                    <div class="relative flex flex-wrap items-stretch w-full">
                        <span
                            class="flex items-center whitespace-nowrap bg-gray-200 border border-gray-600 rounded-l-lg border-r-0 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-black"
                            id="basic-addon3">https://dijajan.in/</span>
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="relative m-0 block w-[1px] min-w-0 flex-auto p-2 text-gray-900 border border-gray-600 rounded-r-lg focus:ring-primary focus:border-primary"
                            id="username" autocomplete="off"/>
                    </div>
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="password" class="mb-4 text-black font-bold">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <i class="bi bi-eye"></i>
                        </div>
                        <input type="password" id="password" name="password"
                            class="block w-full p-2 text-gray-900 border border-gray-600 rounded-lg focus:ring-primary focus:border-primary">
                    </div>
                </div>
                <div class="mb-6 text-sm w-4/6">
                    <label for="confirm_password" class="mb-4 text-black font-bold">Ulangi Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <i class="bi bi-eye"></i>
                        </div>
                        <input type="password" id="confirm_password" name="password_confirmation"
                            class="block w-full p-2 text-gray-900 border border-gray-600 rounded-lg focus:ring-primary focus:border-primary">
                    </div>
                </div>
                <button class="w-4/6 bg-primary text-white py-3 rounded-lg mt-6 font-bold text-sm">
                    Daftar
                </button>
            </form>
            <p class="w-3/6 text-sm text-center mt-2">Dengan melanjutkan, berarti anda telah menyetujui <span class="text-primary">syarat dan ketentuan</span> & <span class="text-primary">kebijakan privasi</span> kami.</p>
            <hr class="w-4/6 h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="text-sm">Sudah mempunyai akun? <a href="{{ route('page.login') }}" class="underline cursor-pointer hover:text-primary">Masuk
                    Jajan.in</a></p>
        </div>
    </div>
</body>

</html>
