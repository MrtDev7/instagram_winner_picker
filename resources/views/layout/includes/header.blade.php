<!-- Start header -->
<header class="header-nav-center active-blue" id="myNavbar">
    <div class="container">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/{{LaravelLocalization::getCurrentLocale() }}/">
                <img class="logo" src="{{ asset('img/logo.svg') }}" alt="logo" />
            </a>

            <button class="navbar-toggler menu ripplemenu" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <svg viewBox="0 0 64 48">
                    <path d="M19,15 L45,15 C70,15 58,-2 49.0177126,7 L19,37"></path>
                    <path d="M19,24 L45,24 C61.2371586,24 57,49 41,33 L32,24"></path>
                    <path d="M45,33 L19,33 C-8,33 6,-2 22,14 L45,37"></path>
                </svg>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto nav-pills">

                    <li class="nav-item">
                        <a class="nav-link "
                            href="/{{LaravelLocalization::getCurrentLocale() }}/">{{ __('main.home_title') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Pricing">{{ __('main.pricing_title') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactus">{{ __('main.contact_title') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                            href="/{{LaravelLocalization::getCurrentLocale() }}/about">{{ __('main.about_title') }}</a>
                    </li>


                </ul>
                <div class="nav_account btn_demo3">
                    @if (!Auth::guard('web')->check())
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mdllregister">
                        {{__('main.register')}}
                    </button>

                    <a data-toggle="modal" data-target="#mdllLogin" data-target="#mdllLogin"
                        class="btn scale btn_sm_primary bg-blue c-white rounded-pill">
                        {{__('main.sign_in')}}
                    </a>
                    @endif
                    @if (Auth::guard('web')->check())


                    <div class="nav-account d-flex align-items-center">
                        <h6 class="btn btn_md_primary   rounded-2 rounded-pill">
                            <img src="https://www.allthetests.com/quiz22/picture/pic_1171831236_1.png" alt=""
                                class="rounded-circle" style="width: 21px;">
                            {{Auth::user()->name}}
                        </h6>

                        <h6 class="btn btn_md_primary c-yollow  rounded-2 rounded-pill">
                            {{Auth::user()->point}}Points
                        </h6>
                        <a href="/logout" class="btn scale btn_sm_primary bg-blue c-white rounded-pill">
                            {{__('main.signout')}}
                        </a>

                    </div>
                    @endif

                </div>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>
    <!-- end container -->
    <div class="progress" id="progress-bar" style="height:4px;display: none">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100"
            aria-valuemin="0" aria-valuemax="100" style="height:4px;width: 100%"></div>
    </div>
</header>

<!-- End header -->