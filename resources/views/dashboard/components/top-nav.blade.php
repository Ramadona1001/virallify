<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ $main_settings ? asset($main_settings->logo) : "" }}" alt="" style=" width: 200px; height: 29px; ">
                            </span>
                    <span class="logo-lg">
                                <img src="{{ $main_settings ? asset($main_settings->logo) : "" }}" alt="" style=" width: 200px; height: 29px; ">
                            </span>
                </a>

                <a href="" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ $main_settings ?  asset($main_settings->logo) : "" }}" alt="" style=" width: 200px; height: 29px; ">
                            </span>
                    <span class="logo-lg">
                                <img src="{{ $main_settings ? asset($main_settings->logo) : "" }}" alt="" style=" width: 200px; height: 29px; ">
                            </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                    id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item waves-effect"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="" src="{{ asset('dashboard/assets/images/flags/'.\Lang::getLocale().'.jpg') }}" alt="Header Language" height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    {!! changeLanguageMenu() !!}
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    <span class="noti-dot"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="ri-checkbox-circle-line"></i>
                                            </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">{{transWord('New Request')}}</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> {{transWord('View All Requests')}}
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('dashboard/assets/images/users/avatar-2.jpg') }}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('dashboard-profile')}}"><i class="ri-user-line align-middle mr-1"></i>
                        {{transWord('Profile')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="ri-shut-down-line align-middle mr-1 text-danger"></i> {{ transWord('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
