<head>
    <!-- Title -->
    <title>{{ $title }} | {{ config('app.name') }}</title>
    @php
        header('Access-Control-Allow-Origin: *');
    @endphp
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon2.png') }}" />

    <!-- Font -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- JS Global Compulsory -->
    <script src="{{ asset('user/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/lib/moment/min/moment.min.js') }}"></script>
    <link href="{{ asset('admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('admin/lib/fontawesome-6.1.1/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('user/assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/vendor/bootstrap-select/dist/css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/vendor/fancybox/dist/jquery.fancybox.min.css') }}">
    <link href="{{ asset('admin/lib/select2-4.1.0-rc.0/dist/css/select2.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('user/assets/vendor/jquery-pagination/dist/pagination.css') }}">
    <script src="{{ asset('user/assets/vendor/jquery-pagination/dist/pagination.js') }}"></script> --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>

    <link rel="stylesheet" href="{{ asset('user/assets/vendor/dropzone/dist/dropzone.min.css') }}">
    <script src="{{ asset('user/assets/vendor/dropzone/dist/dropzone.min.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('user/assets/vendor/dropzone/dist/dropzone.min.css') }}">
    <script src="{{ asset('user/assets/vendor/dropzone/dist/dropzone.min.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ asset('user/assets/vendor/aos/dist/aos.css') }}">
    <link href="{{ asset('admin/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('user/assets/vendor/jquery-confirm/jquery-confirm.min.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/theme.css') }}">
    {{-- CSS Custom --}}
    <link rel="stylesheet" href="{{ asset('user/css/custom.css') }}">

</head>
