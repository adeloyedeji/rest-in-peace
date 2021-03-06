Header begins -->
<header class="main-nav clearfix">

<!-- Searchbar -->
<div class="top-search-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="search-input-addon">
                    <span class="addon-icon"><i class="icon-search4"></i></span>
                    <input type="text" class="form-control top-search-input" placeholder="Enter your keyword...">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Searchbar -->

<!-- Branding -->
<div class="navbar-left float-left">
    <div class="clearfix">
        <ul class="left-branding float-left">
            <li class="visible-handheld"><span class="left-toggle-switch"><i class="icon-menu7"></i></span></li>
            <li>
                <a href="index.html"><div class="logo"></div></a>
            </li>
        </ul>
    </div>
</div>
<!-- /Branding -->

<!-- Search & Languages -->
<div class="navbar float-left">
    <div class="clearfix">
        <ul class="float-left top-icons hidden-xs-down">
            <li><a href="#" class="btn-top-search m-l-15"><i class="icon-search4"></i></a></li>
        </ul>
    </div>
</div>
<!-- /Search & Languages -->

<!-- Navbar icons -->
<div class="navbar float-right navbar-toggleable-sm">
    <div class="clearfix">
        <ul class="float-right top-icons">
            <li><a href="#" class="btn-top-search hidden-sm-up"><i class="icon-search4"></i></a></li>

            <!-- Quick apps dropdown -->
<!--             <li class="dropdown apps-dropdown hidden-xs-down">
                <a href="#" class="dropdown-toggle" id="apps_dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><i class="icon-grid2"></i></a>
                <div class="dropdown-menu animated fadeIn" aria-labelledby="apps_dropdown">

                    <ul class="shortcuts clearfix">
                        <li>
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/icons/emails.png') }}"/>
                                <span class="apps-noty">4</span>
                                <span class="apps-label">Email</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/icons/messages.png') }}"/>
                                <span class="apps-noty">8</span>
                                <span class="apps-label">Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/icons/people.png') }}"/>
                                <span class="apps-label">People</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/icons/invoices.png') }}"/>
                                <span class="apps-label">Invoices</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/icons/projects.png') }}"/>
                                <span class="apps-label">Projects</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/icons/cart.png') }}"/>
                                <span class="apps-noty">3</span>
                                <span class="apps-label">Others</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </li> -->
            <!-- /Quick apps dropdown -->

            <!-- Rightbar -->
           <!--  <li><a class="toggle_rightbar" href="#" onclick="open_rightbar()"><span class="bubble">6</span><i class="icon-list-unordered"></i></a></li> -->
            <!-- /Rightbar -->

            <!-- User dropdown -->
            <li class="dropdown user-dropdown">
                <a href="#" class="btn-user dropdown-toggle hidden-xs-down" data-toggle="dropdown"><img src="{{ asset('img/demo/user.png') }}" class="rounded-circle user" alt=""/></a>
                <a class="user-name hidden-xs-down" data-toggle="dropdown">{{ ucfirst(Auth::user()->fname) . " " . ucfirst(Auth::user()->lname) }}<small>
                    @foreach(Auth::user()->roles as $role)
                    {{ucwords($role->name)}}
                    @endforeach

                </small></a>
                <a href="#" class="dropdown-toggle hidden-sm-up" data-toggle="dropdown"><i class="icon-more"></i></a>
                <div class="dropdown-menu animated fadeIn no-p">
                    <div class="user-icon text-center p-t-15">
                        <img src="{{ asset('img/demo/img1.jpg') }}" class="rounded-circle" alt=""/>
                        <h5 class="text-center p-b-15">Hi! {{ Auth::user()->fname . " " . Auth::user()->lname }}</h5>
                    </div>
                    <ul class="user-links">
                        <li><a href="user_profile_social.html"><i class="icon-profile"></i> My profile</a></li>
                        <li><a href="#"><i class="icon-envelop5"></i> Inbox <span class="badge badge-danger float-right">4</span></a></li>
                        <li><a href="user_profile_social-2.html"><i class="icon-cogs"></i> Profile settings</a></li>
                        <li><a href="login_unlock.html"><i class="icon-lock5"></i> Lock screen</a></li>
                    </ul>
                    <div class="text-center p-10"><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-block"><i class="icon-exit3 i-16 position-left"></i> Logout</a></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <!-- /User dropdown -->

        </ul>
    </div>
</div>
<!-- /Navbar icons -->

</header>
<!-- /Header ends