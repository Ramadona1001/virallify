<header class="header_main_wrapper">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <div class="main_wrapper">
                <div class="item">
                    <h6 class="title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none" class="icon">
                            <path d="M0.888889 8.88889H6.22222C6.45797 8.88889 6.68406 8.79524 6.85076 8.62854C7.01746 8.46184 7.11111 8.23575 7.11111 8V0.888889C7.11111 0.653141 7.01746 0.427048 6.85076 0.260349C6.68406 0.0936505 6.45797 0 6.22222 0H0.888889C0.653141 0 0.427048 0.0936505 0.260349 0.260349C0.0936505 0.427048 0 0.653141 0 0.888889V8C0 8.23575 0.0936505 8.46184 0.260349 8.62854C0.427048 8.79524 0.653141 8.88889 0.888889 8.88889ZM0 15.1111C0 15.3469 0.0936505 15.573 0.260349 15.7397C0.427048 15.9064 0.653141 16 0.888889 16H6.22222C6.45797 16 6.68406 15.9064 6.85076 15.7397C7.01746 15.573 7.11111 15.3469 7.11111 15.1111V11.5556C7.11111 11.3198 7.01746 11.0937 6.85076 10.927C6.68406 10.7603 6.45797 10.6667 6.22222 10.6667H0.888889C0.653141 10.6667 0.427048 10.7603 0.260349 10.927C0.0936505 11.0937 0 11.3198 0 11.5556V15.1111ZM8.88889 15.1111C8.88889 15.3469 8.98254 15.573 9.14924 15.7397C9.31594 15.9064 9.54203 16 9.77778 16H15.1111C15.3469 16 15.573 15.9064 15.7397 15.7397C15.9064 15.573 16 15.3469 16 15.1111V8.88889C16 8.65314 15.9064 8.42705 15.7397 8.26035C15.573 8.09365 15.3469 8 15.1111 8H9.77778C9.54203 8 9.31594 8.09365 9.14924 8.26035C8.98254 8.42705 8.88889 8.65314 8.88889 8.88889V15.1111ZM9.77778 6.22222H15.1111C15.3469 6.22222 15.573 6.12857 15.7397 5.96187C15.9064 5.79517 16 5.56908 16 5.33333V0.888889C16 0.653141 15.9064 0.427048 15.7397 0.260349C15.573 0.0936505 15.3469 0 15.1111 0H9.77778C9.54203 0 9.31594 0.0936505 9.14924 0.260349C8.98254 0.427048 8.88889 0.653141 8.88889 0.888889V5.33333C8.88889 5.56908 8.98254 5.79517 9.14924 5.96187C9.31594 6.12857 9.54203 6.22222 9.77778 6.22222Z" fill="#3B4348"/>
                        </svg>
                        Dashboard
                    </h6>
                </div>
                <!-- end::item -->

                <div class="item search_wrapper">
                    <form action="" method="">
                        <input type="seatch" class="form-control" placeholder="Search Property, Customer, ... etc">
                    </form>
                </div>
                <!-- end::item -->
            </div>
        </div>
        <!-- end::col -->

        <div class="col-lg-6">
            <div class="options_wrapper">

{{--                <a class="item" href="javascript:;">--}}
{{--                    <img src="{{asset('sales-dashboard/assets/images/icons/mail.png')}}" alt="icon">--}}
{{--                </a>--}}


                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                          {{ (\Lang::getLocale() == 'en') ? 'English' : 'Arabic' }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        {!! changeLanguageMenu() !!}
                    </ul>
                </div>

                <a class="item" href="{{auth()->guard('vendor')->check() ? route('sales.vendor.notifications') : route('sales.employee.notifications') }}">
                    <img src="{{asset('sales-dashboard/assets/images/icons/notifications.png')}}" alt="icon">
                </a>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('sales-dashboard/assets/images/avatar.png')}}" alt="avatar">
                        <div>
                            <h6 class="name">{{auth()->guard('vendor')->check() ? auth()->guard('vendor')->user()->name  : auth()->guard('employee')->user()->name  }}</h6>
                            <p class="mb-0">{{auth()->guard('vendor')->check() ? "Vendor" : "Employee"}}</p>
                        </div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ auth()->guard('vendor')->check() ? route('sales.vendorProfile') : route('sales.employeeProfile')  }}">{{transWord('Profile Settings')}}</a></li>
                        <li><a class="dropdown-item" href="#">Clear Cache</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ auth()->guard('vendor')->check() ? route('vendor.logout') : route('employee.logout')  }}">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">{{ transWord('Log Out') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end::col -->

        <div class="col-12">
            <div class="res_navbar_content">
                <div class="row align-items-center">
                    <div class="col-4">
                        <div class="sidebar_toggle">
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar_list" aria-controls="sidebar_list">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M1.11111 11.1111H7.77778C8.07246 11.1111 8.35508 10.994 8.56345 10.7857C8.77183 10.5773 8.88889 10.2947 8.88889 10V1.11111C8.88889 0.816426 8.77183 0.533811 8.56345 0.325437C8.35508 0.117063 8.07246 0 7.77778 0H1.11111C0.816426 0 0.533811 0.117063 0.325437 0.325437C0.117063 0.533811 0 0.816426 0 1.11111V10C0 10.2947 0.117063 10.5773 0.325437 10.7857C0.533811 10.994 0.816426 11.1111 1.11111 11.1111ZM0 18.8889C0 19.1836 0.117063 19.4662 0.325437 19.6746C0.533811 19.8829 0.816426 20 1.11111 20H7.77778C8.07246 20 8.35508 19.8829 8.56345 19.6746C8.77183 19.4662 8.88889 19.1836 8.88889 18.8889V14.4444C8.88889 14.1498 8.77183 13.8671 8.56345 13.6588C8.35508 13.4504 8.07246 13.3333 7.77778 13.3333H1.11111C0.816426 13.3333 0.533811 13.4504 0.325437 13.6588C0.117063 13.8671 0 14.1498 0 14.4444V18.8889ZM11.1111 18.8889C11.1111 19.1836 11.2282 19.4662 11.4365 19.6746C11.6449 19.8829 11.9275 20 12.2222 20H18.8889C19.1836 20 19.4662 19.8829 19.6746 19.6746C19.8829 19.4662 20 19.1836 20 18.8889V11.1111C20 10.8164 19.8829 10.5338 19.6746 10.3254C19.4662 10.1171 19.1836 10 18.8889 10H12.2222C11.9275 10 11.6449 10.1171 11.4365 10.3254C11.2282 10.5338 11.1111 10.8164 11.1111 11.1111V18.8889ZM12.2222 7.77778H18.8889C19.1836 7.77778 19.4662 7.66071 19.6746 7.45234C19.8829 7.24397 20 6.96135 20 6.66667V1.11111C20 0.816426 19.8829 0.533811 19.6746 0.325437C19.4662 0.117063 19.1836 0 18.8889 0H12.2222C11.9275 0 11.6449 0.117063 11.4365 0.325437C11.2282 0.533811 11.1111 0.816426 11.1111 1.11111V6.66667C11.1111 6.96135 11.2282 7.24397 11.4365 7.45234C11.6449 7.66071 11.9275 7.77778 12.2222 7.77778Z" fill="#3B4348"/>
                                </svg>
                            </button>

                            <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar_list" aria-labelledby="sidebar_list_label">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Dashboard Menu</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="links_wrapper">
                                        <div class="item links">
                                            <a href="index.php">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="icon">
                                                        <path d="M1.11111 11.1111H7.77778C8.07246 11.1111 8.35508 10.994 8.56345 10.7857C8.77183 10.5773 8.88889 10.2947 8.88889 10V1.11111C8.88889 0.816426 8.77183 0.533811 8.56345 0.325437C8.35508 0.117063 8.07246 0 7.77778 0H1.11111C0.816426 0 0.533811 0.117063 0.325437 0.325437C0.117063 0.533811 0 0.816426 0 1.11111V10C0 10.2947 0.117063 10.5773 0.325437 10.7857C0.533811 10.994 0.816426 11.1111 1.11111 11.1111ZM0 18.8889C0 19.1836 0.117063 19.4662 0.325437 19.6746C0.533811 19.8829 0.816426 20 1.11111 20H7.77778C8.07246 20 8.35508 19.8829 8.56345 19.6746C8.77183 19.4662 8.88889 19.1836 8.88889 18.8889V14.4444C8.88889 14.1498 8.77183 13.8671 8.56345 13.6588C8.35508 13.4504 8.07246 13.3333 7.77778 13.3333H1.11111C0.816426 13.3333 0.533811 13.4504 0.325437 13.6588C0.117063 13.8671 0 14.1498 0 14.4444V18.8889ZM11.1111 18.8889C11.1111 19.1836 11.2282 19.4662 11.4365 19.6746C11.6449 19.8829 11.9275 20 12.2222 20H18.8889C19.1836 20 19.4662 19.8829 19.6746 19.6746C19.8829 19.4662 20 19.1836 20 18.8889V11.1111C20 10.8164 19.8829 10.5338 19.6746 10.3254C19.4662 10.1171 19.1836 10 18.8889 10H12.2222C11.9275 10 11.6449 10.1171 11.4365 10.3254C11.2282 10.5338 11.1111 10.8164 11.1111 11.1111V18.8889ZM12.2222 7.77778H18.8889C19.1836 7.77778 19.4662 7.66071 19.6746 7.45234C19.8829 7.24397 20 6.96135 20 6.66667V1.11111C20 0.816426 19.8829 0.533811 19.6746 0.325437C19.4662 0.117063 19.1836 0 18.8889 0H12.2222C11.9275 0 11.6449 0.117063 11.4365 0.325437C11.2282 0.533811 11.1111 0.816426 11.1111 1.11111V6.66667C11.1111 6.96135 11.2282 7.24397 11.4365 7.45234C11.6449 7.66071 11.9275 7.77778 12.2222 7.77778Z" />
                                                    </svg>
                                                    <span>Dashboard</span>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item links">
                                            <a href="properties.php">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="icon">
                                                        <path d="M8.89996 0.326585C9.22151 0.114129 9.60605 0 10.0003 0C10.3946 0 10.7792 0.114129 11.1007 0.326585L19.4474 5.83982C20.4843 6.52499 19.9651 8.0467 18.6943 8.04936H1.31069C0.0355899 8.04936 -0.486431 6.52631 0.554758 5.83982L8.89996 0.326585ZM10.0011 5.22768C10.3163 5.22768 10.6187 5.11107 10.8417 4.90351C11.0646 4.69596 11.1899 4.41445 11.1899 4.12091C11.1899 3.82738 11.0646 3.54587 10.8417 3.33832C10.6187 3.13076 10.3163 3.01415 10.0011 3.01415C9.68576 3.01415 9.38339 3.13076 9.16044 3.33832C8.9375 3.54587 8.81225 3.82738 8.81225 4.12091C8.81225 4.41445 8.9375 4.69596 9.16044 4.90351C9.38339 5.11107 9.68576 5.22768 10.0011 5.22768ZM2.15648 9.37853V14.6899H5.00905V9.37853H2.15648ZM0.017048 18.8939C0.017048 17.3045 1.40055 16.0165 3.10638 16.0165H16.8943C17.7139 16.0168 18.4998 16.3201 19.0794 16.8596C19.6589 17.3992 19.9847 18.1309 19.9851 18.8939V19.3361C19.9851 19.5122 19.9099 19.681 19.7762 19.8055C19.6424 19.9301 19.4611 20 19.2719 20H0.730191C0.541054 20 0.359663 19.9301 0.225923 19.8055C0.0921827 19.681 0.017048 19.5122 0.017048 19.3361V18.8939ZM17.8456 9.37721V14.6886H14.9931V9.37853H17.8456V9.37721ZM13.5668 9.37721V14.6886H10.7142V9.37853H13.5668V9.37721ZM9.28791 9.37721V14.6886H6.43534V9.37853H9.28791V9.37721Z" />
                                                    </svg>
                                                    <span>Properties</span>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item links">
                                            <a href="daily-tasks.php">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="icon">
                                                        <path d="M10 0C4.4774 0 0 4.4774 0 10C0 15.5226 4.4774 20 10 20C15.5226 20 20 15.5226 20 10C20 4.4774 15.5226 0 10 0ZM14.6154 11.5385H10C9.79599 11.5385 9.60033 11.4574 9.45607 11.3132C9.31181 11.1689 9.23077 10.9732 9.23077 10.7692V3.84615C9.23077 3.64214 9.31181 3.44648 9.45607 3.30223C9.60033 3.15797 9.79599 3.07692 10 3.07692C10.204 3.07692 10.3997 3.15797 10.5439 3.30223C10.6882 3.44648 10.7692 3.64214 10.7692 3.84615V10H14.6154C14.8194 10 15.0151 10.081 15.1593 10.2253C15.3036 10.3696 15.3846 10.5652 15.3846 10.7692C15.3846 10.9732 15.3036 11.1689 15.1593 11.3132C15.0151 11.4574 14.8194 11.5385 14.6154 11.5385Z" />
                                                    </svg>
                                                    <span>Daily Tasks</span>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item links">
                                            <a href="javascript:;">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none" class="icon">
                                                        <path d="M10.3335 19.9995C5.6195 19.9995 3.2625 19.9995 1.7975 18.5345C0.333496 17.0715 0.333496 14.7135 0.333496 9.99951C0.333496 5.28551 0.333496 2.92851 1.7975 1.46351C3.2635 -0.000488281 5.6195 -0.000488281 10.3335 -0.000488281C11.7325 -0.000488281 12.9235 -0.000488173 13.9455 0.0375118C13.1933 0.896643 12.7958 2.00962 12.8336 3.15089C12.8714 4.29217 13.3417 5.37639 14.1492 6.18384C14.9566 6.99129 16.0408 7.46157 17.1821 7.49939C18.3234 7.53721 19.4364 7.13973 20.2955 6.38751C20.3335 7.40951 20.3335 8.60051 20.3335 9.99951C20.3335 14.7135 20.3335 17.0705 18.8685 18.5345C17.4055 19.9995 15.0475 19.9995 10.3335 19.9995Z" />
                                                        <path d="M20.3335 2.99951C20.3335 3.79516 20.0174 4.55822 19.4548 5.12083C18.8922 5.68344 18.1291 5.99951 17.3335 5.99951C16.5378 5.99951 15.7748 5.68344 15.2122 5.12083C14.6496 4.55822 14.3335 3.79516 14.3335 2.99951C14.3335 2.20386 14.6496 1.4408 15.2122 0.878191C15.7748 0.315582 16.5378 -0.000488281 17.3335 -0.000488281C18.1291 -0.000488281 18.8922 0.315582 19.4548 0.878191C20.0174 1.4408 20.3335 2.20386 20.3335 2.99951Z" />
                                                    </svg>
                                                    <span>Requests</span>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- end::item -->
                                        <div class="item links">
                                            <a href="hr.php">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="icon">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.55556 4.44444C5.55556 3.2657 6.02381 2.13524 6.8573 1.30175C7.6908 0.468252 8.82126 0 10 0C11.1787 0 12.3092 0.468252 13.1427 1.30175C13.9762 2.13524 14.4444 3.2657 14.4444 4.44444C14.4444 5.62318 13.9762 6.75365 13.1427 7.58714C12.3092 8.42064 11.1787 8.88889 10 8.88889C8.82126 8.88889 7.6908 8.42064 6.8573 7.58714C6.02381 6.75365 5.55556 5.62318 5.55556 4.44444ZM5.55556 11.1111C4.08213 11.1111 2.66905 11.6964 1.62718 12.7383C0.585316 13.7802 0 15.1932 0 16.6667C0 17.5507 0.35119 18.3986 0.976311 19.0237C1.60143 19.6488 2.44928 20 3.33333 20H16.6667C17.5507 20 18.3986 19.6488 19.0237 19.0237C19.6488 18.3986 20 17.5507 20 16.6667C20 15.1932 19.4147 13.7802 18.3728 12.7383C17.3309 11.6964 15.9179 11.1111 14.4444 11.1111H5.55556Z" />
                                                    </svg>
                                                    <span>HR</span>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- end::item -->
                                    </div>
                                    <!-- end::links_wrapper -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end::col -->
                    <div class="col-4">
                        <div class="logo_wrapper">
                            <a href="index.php"> <img src="{{asset('sales-dashboard/assets/images/login-logo.svg')}}" alt="logo"> </a>
                        </div>
                    </div>
                    <!-- end::col -->
                    <div class="col-4">
                        <div class="profile_wrapper">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('sales-dashboard/assets/images/avatar.png')}}" alt="avatar">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                                    <li><a class="dropdown-item" href="#">Clear Cache</a></li>
                                    <li><a class="dropdown-item" href="#">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end::col -->
                </div>
                <!-- end::row -->
            </div>
        </div>
        <!-- end::col -->
    </div>
    <!-- end::row -->
</header>
