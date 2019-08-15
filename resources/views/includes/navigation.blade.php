{{--</nav>--}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <div >
            <a class="navbar-brand" href="/">
                <img src="">
                BEAUTY SHOP
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @if(\Illuminate\Support\Facades\Auth::user() != null)
                    <a class="nav-link" href="/wishlist">
                        <i class="fa fa-star"></i>
                        Wishlist
                    </a>
                        @else
                        <a class="nav-link" href="/login">
                            <i class="fa fa-star"></i>
                            Wishlist
                        </a>
                    @endif
                </li>
                <li>
                    <a class="nav-link" href="#">
                        <i class="fa fa-question-circle"></i>
                        Support
                    </a>
                </li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        @if (Auth::user()->role=='1')
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('users.index') }}">
                                {{ __('User Management') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('categories.index') }}">
                                {{ __('Category Management') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('products.index') }}">
                                {{ __('Product Management') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @else
                            @if (Auth::user()->role=='2')
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('categories.index') }}">
                                    {{ __('Category Management') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('products.index') }}">
                                    {{ __('Product Management') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                                @else
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endif
                            @endif
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
