<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('public/storage/admin/'.Auth::user()->image) }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">

                    <li>
                        <a href="">
                            <i class="material-icons">settings</i>Settings</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>

            @if(Request::is('admin*'))
                <li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/slider*')?'toggled':''}}">
                        <i class="material-icons">settings_ethernet</i>
                        <span>Slider</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{Request::is('admin/slider/slider')?'active':''}}">
                            <a href="{{route('admin.slider')}}">Sliders</a>
                        </li>
                        <li class="{{ Request::is('admin/slider/addslider') ? 'active' : '' }}">
                            <a href="{{route('admin.addslider')}}">Add Slider</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('admin/social*') ? 'active' : '' }}">
                    <a href="{{route('admin.social')}}">
                        <i class="material-icons">alarm_add</i>
                        <span>Social links</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/module*')?'toggled':''}}">
                        <i class="material-icons">view_module</i>
                        <span>Module</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{Request::is('admin/module/module')?'active':''}}">
                            <a href="{{route('admin.module')}}">Module List</a>
                        </li>
                        <li class="{{ Request::is('admin/module/addmodule') ? 'active' : '' }}">
                            <a href="{{route('admin.addmodule')}}">Add Module</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/partner*')?'toggled':''}}">
                        <i class="material-icons">group</i>
                        <span>Partner</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{Request::is('admin/partner/partner')?'active':''}}">
                            <a href="{{route('admin.partner')}}">Partner List</a>
                        </li>
                        <li class="{{ Request::is('admin/partner/addpartner') ? 'active' : '' }}">
                            <a href="{{route('admin.addpartner')}}">Add Partner</a>
                        </li>
                    </ul>
                </li>


                <li class="{{ Request::is('admin/logo/name*') ? 'active' : '' }}">
                    <a href="{{route('admin.logo.name')}}">
                        <i class="material-icons">alarm_add</i>
                        <span>Logo name</span>
                    </a>
                </li>


                <li class="{{ Request::is('admin/about-us*') ? 'active' : '' }}">
                    <a href="{{route('admin.about-us')}}">
                        <i class="material-icons">info</i>
                        <span>About Us</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/team*')?'toggled':''}}">
                        <i class="material-icons">accessibility</i>
                        <span>Team</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{Request::is('admin/team/team')?'active':''}}">
                            <a href="{{route('admin.team')}}">Team Members</a>
                        </li>
                        <li class="{{ Request::is('admin/team/addteam') ? 'active' : '' }}">
                            <a href="{{route('admin.addteam')}}">Add Team Member</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/advisory*')?'toggled':''}}">
                        <i class="material-icons">flare</i>
                        <span>Advisory</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{Request::is('admin/advisory/advisory')?'active':''}}">
                            <a href="{{route('admin.advisory')}}">Advisory List</a>
                        </li>
                        <li class="{{ Request::is('admin/advisory/addadvisory') ? 'active' : '' }}">
                            <a href="{{route('admin.addadvisory')}}">Add Advisory</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('admin/client-comment*') ? 'active' : '' }}">
                    <a href="{{route('admin.client-comment')}}">
                        <i class="material-icons">add_comment</i>
                        <span>Client Comment</span>
                    </a>
                </li>


                <li class="{{ Request::is('admin/contact') ? 'active' : '' }}">
                    <a href="{{route('admin.contact')}}">
                        <i class="material-icons">perm_contact_calendar</i>
                        <span>Contact</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/contact-information') ? 'active' : '' }}">
                    <a href="{{route('admin.contact-information')}}">
                        <i class="material-icons">perm_contact_calendar</i>
                        <span>Contact Information</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/seo') ? 'active' : '' }}">
                    <a href="{{route('admin.seo')}}">
                        <i class="material-icons">perm_contact_calendar</i>
                        <span>SEO</span>
                    </a>
                </li>
                <li class="header">System</li>
                <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                    <a href="{{route('admin.settings')}}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="javascript:void(0);"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Log out</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif

        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2019 <a href="javascript:void(0);">Admin</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->

