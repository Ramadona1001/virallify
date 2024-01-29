<!DOCTYPE html>

<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ currentDir() }}"
>

@include('dashboard.components.head')

<body data-sidebar="dark">

    <div id="layout-wrapper">
        @include('dashboard.components.top-nav')

        @include('dashboard.components.menu')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    @include('dashboard.components.breadcrumb')

                    @yield('content')

                </div>
            </div>
        </div>

        @include('dashboard.components.footer')
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @include('dashboard.components.scripts')

</body>


</html>
