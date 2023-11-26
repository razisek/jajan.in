<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Get started with a free and open-source admin dashboard layout built with Tailwind CSS and Flowbite featuring charts, widgets, CRUD layouts, authentication pages, and more">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.120.4">

    <title>@yield('title', 'Dashboard')</title>

    <link rel="canonical" href="{{ url('') }}/">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    <link rel="icon" type="image/png"
        href="https://res.cloudinary.com/dgmwbkto1/image/upload/v1687706362/Frame_15_hbnswm.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="Interact ur fans - Jajanin">
    <meta name="twitter:description"
        content="Platform crowdfunding atau penggalangan dana online yang memungkinkan orang untuk memberikan dukungan finansial kepada kreator konten, seniman, dan nirlaba melalui sumbangan secara online.">
    <meta name="twitter:image" content="{{ url('') }}/">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url('') }}/">
    <meta property="og:title" content="Tailwind CSS Admin Dashboard - Flowbite">
    <meta property="og:description"
        content="Platform crowdfunding atau penggalangan dana online yang memungkinkan orang untuk memberikan dukungan finansial kepada kreator konten, seniman, dan nirlaba melalui sumbangan secara online.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ url('') }}/images/og-image.png">
    <meta property="og:image:type" content="image/png">
</head>

<body class="bg-gray-50">
    @include('layout.navbar')
    <div class="flex pt-16 overflow-hidden bg-gray-50">

        @include('layout.sidebar')

        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64">
            <main>
                <div class="px-4 pt-6">
                    @yield('content')
                </div>
            </main>
            {{-- @include('layout.footer') --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ url('') }}/assets/js/app.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Hold Up!',
                text: "Are you sure you want to logout?",
                type: 'warning',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#435EBE',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ route('logout') }}";
                }
            });
        }
    </script>
    @yield('script')
</body>

</html>
