<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Elite Homes - Dashboard</title>
    <!-- importing all shared (link,meta and fonts) -->
    @include('sales-dashboard.includes.AppHead')

    <!-- importing plugins (only for this page) -->
</head>



<body>



 @yield('content')



@include('sales-dashboard.includes.AppScript')
</body>
</html>
