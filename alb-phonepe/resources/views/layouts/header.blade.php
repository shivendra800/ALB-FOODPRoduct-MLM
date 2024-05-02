<div class="py-1 bg-primary" style="border-bottom:1.8px solid white;" font-family: 'Poppins' , sans-serif ;
    font-size:24px;">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md-4  d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">8077636670</span>
                    </div>
                    <div class="col-md-4  d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-envelope size-20px"></span></div>
                        <span class="text">info@albfoodproducts.in</span>
                    </div>
                    <div class="col-md-4  d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a href="/"><img width="210px" src="https://i.ibb.co/PDfy00q/logos.png" class="img-fluid"
                alt="logo"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" id="menu"
            style="border-radius:0px;border:.6px solid white ;padding-right:.6rem;padding-bottom:.6rem;padding-top:.6rem;">
            <span class="oi oi-menu text-light"></span>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item "><a href="{{ url('/') }}/" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="{{ url('/') }}/All-Category" class="nav-link">All-Category</a>
                </li>
                <li class="nav-item"><a href="{{ url('/') }}/contact" class="nav-link">Contact</a></li>
                <li class="nav-item cta cta-colored"><a href="{{ url('cart') }}" class="nav-link"> Cart &nbsp;<span
                            class="icon-shopping_cart cart-count"></span></a></li>
                <li class="nav-item cta cta-colored"><a href="{{ url('wishlist') }}" class="nav-link">Favourites
                        &nbsp;<span class="icon-heart wishlist-count"></span></a></li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" href="{{ url('login') }}"
                                data-whatever="@mdo">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" href="{{ url('register') }}"
                                data-whatever="@mdo">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                   
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            
                            {{ Auth::user()->name }}( {{ Auth::user()->member_id }})
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                            <a class="dropdown-item" href="{{ url('/') }}/my-profile">My Profile</a>
                            <a class="dropdown-item" href="{{ url('/') }}/cart">Cart</a>

                            <a class="dropdown-item" href="{{ url('/') }}/wishlist">Wishlist</a>
                            <a class="dropdown-item" href="{{ url('/') }}/my-order">My Orders</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                  
                @endguest

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<!-- login modal -->

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Login') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-12 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-12">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password"
                            class="col-md-12 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 ">
                        <div class="col-md-6 ">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> {{ __('Login') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Registration Model -->
<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="name"
                            class="col-md-12 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-12">
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-12 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-12">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password"
                            class="col-md-12 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-12 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> {{ __('Register') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
