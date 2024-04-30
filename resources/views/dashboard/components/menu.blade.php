<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">{{ transWord('Menu') }}</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Dashboard') }}</span>
                    </a>
                </li>

                @can('show_roles')
                    <li>
                        <a href="{{ route('roles') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>{{ transWord('Roles') }}</span>
                        </a>
                    </li>
                @endcan

                @can('show_permissions')
                    <li>
                        <a href="{{ route('permissions') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>{{ transWord('Permissions') }}</span>
                        </a>
                    </li>
                @endcan


                @can('show_users')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>{{ transWord('Users') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('create_users')
                                <li><a href="{{ route('create_users') }}">{{ transWord('New User') }}</a></li>
                            @endcan
                            <li><a href="{{ route('users') }}">{{ transWord('Users') }}</a></li>
                        </ul>
                    </li>
                @endcan
                
                @can('show_pages')
                <li>
                    <a href="{{ route('show_pages') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Pages') }}</span>
                    </a>
                </li>
                @endcan
                
                @can('show_home_banner')
                <li>
                    <a href="{{ route('show_home_banner') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Home Banner') }}</span>
                    </a>
                </li>
                @endcan
                
                @can('show_sections')
                <li>
                    <a href="{{ route('show_sections') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Sections') }}</span>
                    </a>
                </li>
                @endcan


              

                @can('show_plans')
                <li>
                    <a href="{{ route('show_plans') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Plans') }}</span>
                    </a>
                </li>
                @endcan
                
                @can('show_social_channel_media')
                <li>
                    <a href="{{ route('show_social_channel_settings') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Social Media Channels') }}</span>
                    </a>
                </li>
                @endcan
                
                @can('show_services')
                <li>
                    <a href="{{ route('show_services') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Services') }}</span>
                    </a>
                </li>
                @endcan
                
              
    
                @can('show_partners')
                <li>
                    <a href="{{ route('show_partners') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Partners') }}</span>
                    </a>
                </li>
                @endcan
                
                @can('show_contact_messages')
                <li>
                    <a href="{{ route('show_contact_messages') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Contact Us') }}</span>
                    </a>
                </li>
                @endcan
                
                @can('show_homepage_social_media')
                <li>
                    <a href="{{ route('show_social_settings') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Social Media') }}</span>
                    </a>
                </li>
                @endcan

                @can('show_homepage_footer')
                    <li>
                        <a href="{{ route('show_footer') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>{{ transWord('Footer') }}</span>
                        </a>
                    </li>
                @endcan
                
                @can('show_settings')
                    <li>
                        <a href="{{ route('mainsettings') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>{{ transWord('Main Settings') }}</span>
                        </a>
                    </li>
                @endcan

                @can('show_homepage_faqs')
                    <li>
                        <a href="{{ route('show_faq_settings') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>{{ transWord('FAQs') }}</span>
                        </a>
                    </li>
                @endcan

         

                <li>
                    <a href="{{ route('language_settings') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Languages') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('clear_cache') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ transWord('Clear Cache') }}</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
