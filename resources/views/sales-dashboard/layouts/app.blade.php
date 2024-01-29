<!DOCTYPE html>

<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ currentDir() }}"
>

<head>
    <title>Elite Homes - Dashboard</title>
    <!-- importing all shared (link,meta and fonts) -->
    @include('sales-dashboard.includes.AppHead')
        <!-- importing plugins (only for this page) -->
    @toastifyCss

</head>

<body>

        <main class="main_page_wrapper">
                    @include('sales-dashboard.includes.AppSidebar')

            <div class="main_content_wrapper">
                    @include('sales-dashboard.includes.AppHeader')

                <div class="content_wrapper">
                    @yield('content')
                    @include('sales-dashboard.includes.AppFooter')
                </div>


            </div>
        </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    @include('sales-dashboard.includes.AppScript')
        @toastifyJs

</body>


</html>
