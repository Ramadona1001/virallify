<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ transWord('Dashboard') }} | @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ $main_settings ? asset($main_settings->favicon) : "" }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    @if(app()->getLocale() == "ar")
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    @endif

    <link href="{{ asset('dashboard/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css"/>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css">



    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    @if (\Lang::getLocale() == 'ar')
    <link href="{{ asset('dashboard/assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard/assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    @else
    <link href="{{ asset('dashboard/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    @endif

    <script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" type="text/css">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/intlTelInput.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>

    @yield('styles')
</head>
