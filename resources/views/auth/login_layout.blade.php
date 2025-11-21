<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <title>@yield('title') - {{ config('app.name') }}</title>
  <script>
    // Check for saved user preference, if any, on initial load
    (function() {
      if (localStorage.getItem('theme') === 'dark' || ((!localStorage.getItem('theme') || localStorage.getItem('theme') === 'system') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.setAttribute('data-bs-theme', "dark")
      }
    })();
  </script>

  {{-- Start of required lines block. DON'T REMOVE THESE LINES! They're required or might break things --}}
  <meta name="base-url" content="{!! url('') !!}">
  <meta name="api-key" content="{!! Auth::check() ? Auth::user()->api_key : '' !!}">
  <meta name="csrf-token" content="{!! csrf_token() !!}">
  {{-- End the required lines block --}}

  <link rel="shortcut icon" type="image/png" href="{{ public_asset('/assets/img/favicon.png') }}" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />
  <link href="{{ public_asset('/assets/vendor/tomselect/tom-select.bootstrap5.css') }}" rel="stylesheet">
  <style>
    body.bg-brand {
      min-height: 100vh;
      background: radial-gradient(circle at 15% 20%, rgba(201, 166, 70, 0.18), transparent 45%),
        radial-gradient(circle at 80% 10%, rgba(68, 59, 47, 0.35), transparent 55%),
        #020203;
      color: #e5e5e5;
    }
    .logo-light { display: block; }
    .logo-dark { display: none; }
    [data-bs-theme="dark"] .logo-light { display: none; }
    [data-bs-theme="dark"] .logo-dark { display: block; }
    .northsky-auth-card {
      background: rgba(8, 8, 8, 0.9);
      border: 1px solid rgba(201, 166, 70, 0.25);
      color: #e5e5e5;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.55);
    }
    .northsky-auth-card .card-footer {
      background: rgba(0, 0, 0, 0.6);
      border-top: 1px solid rgba(201, 166, 70, 0.25);
    }
    .northsky-auth-card .form-control,
    .northsky-auth-card .input-group-text {
      background: rgba(15, 15, 15, 0.9);
      border: 1px solid rgba(255, 255, 255, 0.08);
      color: #e5e5e5;
    }
    .northsky-auth-card .input-group-text { color: #f5d789; }
    .northsky-auth-card .btn-primary {
      background: linear-gradient(135deg, #c9a646, #f5d789);
      border: 1px solid rgba(201, 166, 70, 0.6);
      color: #0b0905;
      font-weight: 700;
    }
    .northsky-auth-card .btn-primary:hover {
      background: linear-gradient(135deg, #ddbb67, #ffe9b0);
      border-color: #f5d789;
      color: #000;
    }
    .northsky-auth-card .btn-link,
    .northsky-auth-card .link {
      color: #f5d789;
    }
    .northsky-auth-card .btn-link:hover,
    .northsky-auth-card .link:hover {
      color: #ffe9b0;
    }
    .northsky-auth-card a { color: #f5d789; }
  </style>
  @yield('css')
</head>

<body class="bg-brand theme-northsky">
  <div class="wrapper d-flex flex-column min-vh-100">
    <div class="body container flex-grow-1 pt-4">
        {{-- These should go where you want your content to show up --}}
            @include('flash::message')
        @yield('content')
        {{-- End the above block --}}

    </div>
    <footer class="py-3 mt-4 text-white">
        <div class="container d-flex flex-wrap justify-content-between align-items-center">

            <div class="col-md-4 d-flex align-items-center">
                <span class="mb-3 mb-md-0">Copyright {{ date('Y') }}
                    {{ config('app.name') }}</span>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-end">
                <span class="mb-3 mb-md-0 text-end">Powered by <a style="color: orange" href="https://www.phpvms.net"
                        target="_blank">phpVMS</a></span>
            </div>
        </div>
    </footer>
</div>
</body>

<script src="{{ public_asset('/assets/global/js/jquery.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0i5q5Y5n5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+5z5+
