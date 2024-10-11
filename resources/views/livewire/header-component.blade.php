<header id="header" class="header-v3">
    <nav class="flat-mega-menu">
        <label for="mobile-button"> <i class="fa fa-bars"></i></label>
        <input id="mobile-button" type="checkbox">

        <ul class="collapse">
            <li class="title">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}">
                    {{-- <h3>Errand Service</h3> --}}
                </a>
            </li>
            <li> <a href="{{ route('home.service_categories') }}">Service Categories</a></li>

            @foreach ($categories as $category)
                <li>
                    <a href="#">{{ $category->name }}</a>
                    @if ($category->children->isNotEmpty())
                        <ul class="drop-down one-column hover-fade">
                            @foreach ($category->children as $subcategory)
                                <li><a
                                        href="{{ route('home.service_by_category', ['category_slug' => $subcategory->slug]) }}">{{ $subcategory->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach

            <li>
                <a href="{{ route('home.contactus') }}">Contact Us</a>
            </li>

            @if (Route::has('login'))
                @auth
                    @if (auth()->user()->utype === 'ADM')
                        <li class="login-form"> <a href="#" title="Register">My Account (Admin)</a>
                            <ul class="drop-down one-column hover-fade">
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('admin.service_categories') }}">Service Categories</a></li>
                                <li><a href="{{ route('admin.all_services') }}">All Services</a></li>
                                <li><a href="{{ route('admin.slider') }}">Manage Sliders</a></li>
                                <li><a href="{{ route('admin.contacts') }}">All Contacts</a></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @elseif(auth()->user()->utype === 'ERC')
                        <li class="login-form"> <a href="#" title="Register">My Account (Errand Client)</a>
                            <ul class="drop-down one-column hover-fade">
                                {{-- <li><a href="{{ route('service-provider.dashboard') }}">Dashboard</a></li> --}}
                                <li><a href="{{ route('admin.all_services') }}">All Services</a></li>
                                <li><a href="{{ route('service-provider.profile') }}">Profile</a></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="login-form"> <a href="#" title="Register">My Account (Errand Runner)</a>
                            <ul class="drop-down one-column hover-fade">
                                {{-- <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li> --}}
                                <li><a href="{{ route('customer.profile') }}">Profile</a></li>
                                <li><a href="{{ route('customer.availability') }}">Availabilities</a></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <form method="POST" id="logout-form" action="{{ route('logout') }}" style="display: none">
                        @csrf
                    </form>
                @else

                    <li class="login-form">Register
                        <ul class="drop-down one-column hover-fade">
                            <li><a href="{{ route('register.erc') }}">As Errand Client</a></li>
                            <li><a href="{{ route('register.err') }}">As Errand Runner</a></li>
                        </ul>
                
                    <li class="login-form"> <a href="{{ route('login') }}" title="Login">Login</a></li>
                @endif
                @endif
            </ul>
        </nav>
    </header>
