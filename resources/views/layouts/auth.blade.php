<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/logo.png">
    <title>{{ $title }} | SPK Pengangkatan Karyawan</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    {{-- Assets Login --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assetsLogin/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/assetsLogin/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assetsLogin/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/assetsLogin/css/style.css">

    {{-- <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style> --}}

<!-- Custom styles for this template -->
    {{-- <link href="/assets/css/auth.css" rel="stylesheet"> --}}
  </head>
  <body class="text-center">
    @yield('content')
  </body>

  {{-- Sweetalert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- <script src="/assets/js/script.js"></script> --}}

  {{-- JS Assets Login --}}
  <script src="/assetsLogin/js/jquery-3.3.1.min.js"></script>
  <script src="/assetsLogin/js/popper.min.js"></script>
  <script src="/assetsLogin/js/bootstrap.min.js"></script>
  <script src="/assetsLogin/js/main.js"></script>

  {{-- alert from session --}}
  @if (session()->has('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
      });
    </script>
  @endif

  @if (session()->has('failed'))
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Failed',
        text: "{{ session('failed') }}",
      });
    </script>
  @endif
</html>
