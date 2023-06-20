<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li>
                    <a class="nav-link" href="{{ route('about.index') }}">
                        {{ __('О нас') }}
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('catalog.index') }}">
                        {{ __('Каталог') }}
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('location.index') }}">
                        {{ __('Где нас найти?') }}
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                            href="{{ route('admin.dashboard') }}" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            
                            @if (auth()->user()->role == 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item nav-link">
                                    {{ __('Личный кабинет') }}
                                </a>
                            @else 
                                <a href="{{ route('user.home') }}" class="dropdown-item nav-link">
                                    {{ __('Личный кабинет') }}
                                </a>
                            @endif
                            <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>
                           
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>