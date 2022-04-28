<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <link rel="icon" type="image/png" href="{{ asset('favicon2.png') }}" />
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <!-- vendor css -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/lib/moment/min/moment.min.js') }}"></script>

    <!-- vendor css -->
    <link href="{{ asset('admin/lib/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/select2-4.1.0-rc.0/dist/css/select2.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('admin/lib/select2/css/select2.min.css" rel="stylesheet') }}"> --}}
    <link href="{{ asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/lib/sweetalert2/sweetalert2.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">


    <link href="{{ asset('admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/spinkit/css/spinkit.css') }}" rel="stylesheet">
    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bracket.css') }}">
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
</head>
