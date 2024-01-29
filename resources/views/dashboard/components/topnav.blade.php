<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-fluid">
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <a href="#" class="btn btn-primary" target="_blank">{{ transWord('Visit Website') }}</a>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
          <!-- Language -->
          <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <i class="fi fi-{{ (\Lang::getLocale() == 'en') ? 'us' : 'sa' }} fis rounded-circle fs-3 me-1"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              {!! changeLanguageMenu() !!}
            </ul>
          </li>
          <!--/ Language -->

          <!-- Style Switcher -->
          <li class="nav-item me-2 me-xl-0">
            <a class="nav-link style-switcher-toggle hide-arrow" id="changeTheme" href="javascript:void(0);">
              <i class="bx bx-sm bx-sun"></i>
            </a>
          </li>
          
          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="{{ asset('dashboard/assets/img/user.png') }}" alt class="rounded-circle" />
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="{{ route('edit_users',['user'=>auth()->user()->id]) }}">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="{{ asset('dashboard/assets/img/user.png') }}" alt class="rounded-circle" />
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block lh-1">{{ auth()->user()->name }}</span>
                      <small>{{ auth()->user()->roles[0]->name }}</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('edit_users',['user'=>auth()->user()->id]) }}">
                  <i class="bx bx-user me-2"></i>
                  <span class="align-middle">{{ transWord('Edit My Profile') }}</span>
                </a>
              </li>
              {{-- <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <i class="bx bx-cog me-2"></i>
                  <span class="align-middle">Settings</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <i class="fa fa-moon me-2"></i>
                  <span class="align-middle">{{ transWord('Dark Mode') }}</span>
                </a>
              </li> --}}

              <li>
                <div class="dropdown-divider"></div>
              </li>

              <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" target="_blank">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">{{ transWord('Log Out') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>

    </div>
  </nav>
