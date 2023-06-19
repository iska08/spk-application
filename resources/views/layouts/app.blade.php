<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    {{-- Import CSS TAILWIND --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Title --}}
    <title>@yield('title')</title>

    <!-- Style -->
    @stack('prepend-style')
    @include('components.style')
    @stack('addon-style')
  </head>

  <body>

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Page Content -->

    @yield('content-1')
    @yield('content-2')
    @yield('content-3')
    @yield('content-4')
    @yield('content-5')
    @yield('content-6')
    @yield('content-7')
    @yield('content-8')



    <!-- Footer -->
    @include('components.footer')

    <!-- Script -->
    {{-- @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script') --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/290d4f0eb4.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
