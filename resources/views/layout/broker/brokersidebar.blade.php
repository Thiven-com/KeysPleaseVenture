<!-- Sidebar -->
<div class="sidebar" id="sidebar">
        <!-- Logo -->
        <div class="sidebar-logo active">
                <a href="{{ url('admin/dashboard') }}" class="logo logo-normal d-flex align-items-center">
                        <img src="{{asset('website')}}/images/solarlogo.png" alt="Logo"
                                style="width:90px; margin-left:30px;">

                </a>
                <a href="{{url('admin/dashboard')}}" class="logo logo-white">
                        <img src="{{asset('website')}}/images/solarlogo.png" alt="Img">

                </a>
                <a href="{{url('admin/dashboard')}}" class="logo-small">
                        <img src="{{asset('website')}}/images/solarlogo.png" alt="Img">

                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                        <i data-feather="chevrons-left" class="feather-16"></i>
                </a>
        </div>
        <!-- /Logo -->

        <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                                <li class="submenu-open">
                                        <h6 class="submenu-hdr">Dashboard</h6>
                                        <ul>
                                                <li class="{{ Request::is('broker/dashboard') ? 'active' : '' }}">
                                                        <a href="{{ route('broker.dashboard') }}"><i
                                                                        class="ti ti-layout-grid fs-16 me-2"></i><span>Dashboard</span></a>
                                                </li>
                                                {{-- <li class="{{ Request::is('admin/todayDeals') ? 'active' : '' }}">
                                                        <a href="{{route('admin.todayDeals')}}">
                                                                <i class="ti ti-cards fs-16 me-2"></i><span>Today
                                                                        Deals</span></a>
                                                </li> --}}

                                        </ul>
                                </li>

                                <!------schedule----->

                                <li class="submenu-open">
                                        <h6 class="submenu-hdr">Schedule</h6>
                                        <ul>









                                        </ul>



                                </li>


                                <li class="submenu-open">
                                        <h6 class="submenu-hdr">Settings</h6>
                                        <ul>
                                                {{-- <li>
                                                        <a href="#"><i class="ti ti-world fs-16 me-2"></i><span>Company
                                                                        Settings</span><span
                                                                        class="menu-arr ow"></span></a>
                                                </li> --}}
                                                <!-- <li class="{{ Request::is('admin/site-settings') ? 'active' : '' }}"><a
                                                                href="{{ route('site.settings.company') }}"><i
                                                                        class="ti ti-world fs-16 me-2"></i><span>Company
                                                                        Settings</span>
                                                        </a>
                                                </li> -->

                                                <li>
                                                        <form method="POST" action="{{ route('broker.logout') }}"
                                                                style="display: inline;">

                                                                @csrf

                                                                <button type="submit"
                                                                        class="dropdown-item d-flex align-items-center"
                                                                        style="border: none; background: transparent; color: red;">

                                                                        <i class="ti ti-logout fs-16 me-2"
                                                                                style="color: red;"></i>

                                                                        <span style="color: red;">Logout</span>
                                                                </button>
                                                        </form>
                                                </li>
                                        </ul>
                                </li>
                        </ul>
                </div>
        </div>
</div>