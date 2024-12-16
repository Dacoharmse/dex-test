<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('meta_title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dark-theme.css') }}">

    <!-- Primary Meta Tags -->
    <title>@yield('meta_title')</title>
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="@yield('meta_title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:image" content="@yield('meta_image')">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="@yield('meta_title')">
    <meta property="twitter:description" content="@yield('meta_description')">
    <meta property="twitter:image" content="@yield('meta_image')">

    <!-- favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/brands.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Alpine.js CDN -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        body {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        }
    </style>

    <x-embed-styles />

    @vite('resources/css/app.css')

    @stack('head')

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
       var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
       (function(){
           var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
           s1.async=true;
           s1.src='https://embed.tawk.to/669e5a3e32dca6db2cb37c99/1i3d911rp';
           s1.charset='UTF-8';
           s1.setAttribute('crossorigin','*');
           s0.parentNode.insertBefore(s1,s0);
       })();
    </script>
    <!--End of Tawk.to Script-->
</head>

<body class="antialiased" x-data="{ sidebarOpen: false }">
    <x-alert />

    @include('layout.navbar')
    @include('layout.sidebar')

    <main class="py-10">
        @yield('content')
    </main>

    @include('layout.footer')

    @vite('resources/js/app.js')

    @stack('scripts')
</body>

</html>
