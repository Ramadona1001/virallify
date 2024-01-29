<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('dashboard.components.head')



<body class="auth-body-bg">
  <div>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div>
                                            <a href="{{ route('dashboard') }}" class="logo"><img src="{{asset($main_settings->logo)}}" style="background: #252b3b; border-radius: 10px; padding: 10px;" width="200" height="50" alt="logo"></a>
                                        </div>

                                        <h4 class="font-size-14 mt-4">{{ transWord('Welcome To ').$main_settings->name }}</h4>
                                    </div>

                                    <div class="p-2 mt-5">
                                      @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
              <div class="authentication-bg">
                  <div class="bg-overlay"></div>
              </div>
          </div>
        </div>
    </div>
  </div>



    @include('dashboard.components.scripts')
</body>
</html>
