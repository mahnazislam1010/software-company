<header>
    <nav id="navigation4" class="container navigation">
        <div class="nav-header"><a class="nav-brand" href="index.html"> <img src="{{isset(\App\Logo_name::first()->logo)?asset('public/storage/logo/'.\App\Logo_name::first()->logo):'' }}" class="main-logo"
                                                                             alt="logo" id="main_logo"> </a>
            <div class="nav-toggle"></div>
        </div>
        <div class="nav-menus-wrapper">
            <ul class="nav-menu align-to-right">
                <li><a href="{{ route('home') }}">Home</a>
                </li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="javascript:void(0)">Services</a>
                    <ul class="nav-dropdown">
                        <li><a href="{{ route('module') }}">Module</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('team') }}">Team</a></li>
                <li><a href="{{ route('client') }}">Clients</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>


