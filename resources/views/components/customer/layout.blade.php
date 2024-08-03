<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Azzahra Decoration</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ config('app.url') }}">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <link rel="icon" type="image/x-icon" href="/vendor/joolie/img/icons/favicon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Sulphur+Point:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/joolie/css/style.css">

    {{-- Library --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />

    {{-- Custom Template CSS --}}
    <link href="/css/customer/joolie.css" rel="stylesheet">

    {{-- Inline CSS --}}
    @stack('style')

</head>

<body>

    <!-- == WRAPPER ================== -->
    <div class="wrapper {{ $wrapper }}">

        <!-- == ALERT ================== -->
        <x-admin.alert />
        <!-- == // ALERT ================== -->

        <!-- == HEADER ================== -->
        <x-customer.header />
        <!-- == // HEADER ================== -->

        <!-- == PAGE CONTENT ================== -->
        <main class="page">

            {{ $slot }}

        </main>
        <!-- == // PAGE CONTENT ================== -->

        <!-- == FOOTER ================== -->
        <footer class="footer _parallax">
            <div class="footer__decor layer" data-depth="0.15">
                <img src="/vendor/joolie/img/footer/decor.png" alt="flowers">
            </div>
            <div class="footer__bg ibg">
                <img class="lazy" data-src="/vendor/joolie/img/footer/bg.png" src="/vendor/joolie/img/footer/placeholder.jpg" alt="img">
            </div>
            <div class="footer__body container">
                <div class="footer__row footer__row_1">
                    <div class="footer__logo logo">
                        <a href="{{ route('home') }}">
                            <img class="img-svg" src="/vendor/joolie/img/logo/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- == // FOOTER ================== -->

    </div>
    <!-- == // WRAPPER ================== -->
    <div class="popup">
        <div class="popup__content">
            <div class="popup__body">
                <div class="popup__close"></div>
            </div>
        </div>
    </div>
    <div class="popup popup_video">
        <div class="popup__content">
            <div class="popup__body">
                <div class="popup__close popup__close_video"></div>
                <div class="popup__video _video"></div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="/vendor/joolie/js/vendors.js"></script>
    <script src="/vendor/joolie/js/app.js"></script>

    {{-- Library --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Custom Template Scripts --}}
    <script src="/js/customer/joolie.js"></script>

    {{-- Inline JS --}}
    @stack('script')

</body>

</html>
