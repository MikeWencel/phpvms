<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="width=device-width, initial-scale=1, viewport-fit=cover" name="viewport" />

    <title>@yield('title') | {{ config('app.name') }}</title>

    <script>
        (function() {
            const saved = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (saved === 'dark' || (!saved || saved === 'system') && prefersDark) {
                document.documentElement.setAttribute('data-bs-theme', 'dark');
            }
        })();
    </script>

    <meta name="base-url" content="{{ url('') }}">
    <meta name="api-key" content="{{ Auth::check() ? Auth::user()->api_key : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ public_asset('/assets/img/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent/3.1.1/cookieconsent.min.css"
        integrity="sha512-LQ97camar/lOliT/MqjcQs5kWgy6Qz/cCRzzRzUCfv0fotsCTC9ZHXaPQmJV8Xu/PVALfJZ7BDezl5lW3/qBxg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ public_asset('/assets/vendor/tomselect/tom-select.bootstrap5.css') }}" rel="stylesheet">

    @yield('css')
    @yield('scripts_head')
</head>

<body class="theme-northsky d-flex flex-column min-vh-100">
    <div class="northsky-gradient"></div>
    @include('nav')

    <main class="northsky-main flex-grow-1">
        <div class="container py-4 py-lg-5">
            @include('flash.message')
            @yield('content')
        </div>
    </main>

    <footer class="northsky-footer border-0 py-4 py-lg-5 mt-auto">
        <div class="container d-flex flex-column flex-lg-row justify-content-between gap-3">
            <div>
                <p class="fw-semibold text-uppercase mb-1">{{ config('app.name') }}</p>
                <p class="text-body-secondary mb-0">&copy; {{ date('Y') }} {{ config('app.name') }} - @lang('common.rightsreserved')</p>
            </div>
            <div class="text-lg-end">
                <p class="mb-0 text-body-secondary">
                    {{ __('Powered by') }}
                    <a href="https://www.phpvms.net" target="_blank" class="fw-semibold text-decoration-none">
                        phpVMS
                    </a>
                </p>
            </div>
        </div>
    </footer>

    @include('external_redirect_modal')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>

    @vite(['resources/js/entrypoint.js', 'resources/js/frontend/app.js'])
    @yield('scripts')

    @include('scripts.bs_theme')

    <script>
        window.addEventListener("load", function() {
            window.cookieconsent.initialise({
                palette: {
                    popup: {
                        background: "#111827",
                        text: "#e5e7eb"
                    },
                    button: {
                        background: "#5de0e6",
                        text: "#0f172a"
                    }
                },
                position: "bottom"
            })
        });
    </script>

    @php($gtag = setting('general.google_analytics_id'))
    @if ($gtag)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtag }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ $gtag }}');
        </script>
    @endif
</body>

</html>
