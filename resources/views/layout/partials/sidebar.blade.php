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
                                                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                                        <a href="{{ route('admin.dashboard') }}"><i
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



                                                {{-- Properties --}}
                                                <li class="{{ Request::is('admin/properties*') ? 'active' : '' }}">
                                                        <a href="{{ route('properties.all') }}">
                                                                <i class="ti ti-building fs-16 me-2"></i>
                                                                <span>Properties</span>
                                                        </a>
                                                </li>


                                                {{-- Rent Enquiries --}}
                                                <li class="{{ Request::is('admin/rent-enquiries*') ? 'active' : '' }}">
                                                        <a href="{{ route('admin.rent-enquiries.index') }}">
                                                                <i class="ti ti-message-circle fs-16 me-2"></i>
                                                                <span>Rent Enquiries</span>
                                                        </a>
                                                </li>

                                                {{-- Rental Requirements Enquiries --}}
                                                <li
                                                        class="{{ Request::is('admin/rental-requirments-enquiries*') ? 'active' : '' }}">

                                                        <a href="{{ route('admin.rental.requirments.enquiries') }}">

                                                                <i class="ti ti-home-search fs-16 me-2"></i>

                                                                <span>Rental Requirements</span>

                                                        </a>

                                                </li>


                                                {{-- Schedule Visit Enquiries --}}
                                                <li
                                                        class="{{ Request::is('admin/schedule-visit-enquiries*') ? 'active' : '' }}">

                                                        <a href="{{ route('admin.schedule.visit.enquiries') }}">

                                                                <i class="ti ti-calendar-event fs-16 me-2"></i>

                                                                <span>
                                                                        Schedule Visit
                                                                </span>

                                                        </a>

                                                </li>


                                                <li
                                                        class="{{ Request::is('admin/rental-property-reports*') ? 'active' : '' }}">
                                                        <a href="{{ route('admin.rental.property.reports') }}">
                                                                <i class="ti ti-flag fs-16 me-2"></i>
                                                                <span>Property Reports</span>
                                                        </a>
                                                </li>

                                                <li class="{{ Request::is('admin/contact-enquiries*') ? 'active' : '' }}">
                                                        <a href="{{ route('admin.contact.enquiries') }}">
                                                                <i class="ti ti-mail fs-16 me-2"></i>
                                                                <span>Contact Enquiries</span>
                                                        </a>
                                                </li>

                                                <li class="{{ Request::is('admin/subscribers*') ? 'active' : '' }}">
                                                        <a href="{{ route('admin.subscribers') }}">
                                                                <i class="ti ti-mail fs-16 me-2"></i>
                                                                <span>Subscribers</span>
                                                        </a>
                                                </li>



                                                <!-- <li class="{{ Request::is('admin/service') ? 'active' : '' }}"><a
                                                                href="{{ route('service.all') }}"><i
                                                                        class="ti ti-briefcase fs-16 me-2"></i><span>Services</span></a>
                                                </li> -->

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
                                                        <a href="{{ route('admin.logout') }}"
                                                                class="{{ Request::is('signin') ? 'active' : '' }}"><i
                                                                        class="ti ti-logout fs-16 me-2"
                                                                        style="color: red;"></i><span
                                                                        style="color: red;">Logout</span>
                                                        </a>
                                                </li>
                                        </ul>
                                </li>
                        </ul>
                </div>
        </div>
</div>