<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container">
        <a class="navbar-brand" href="/home">Belajar Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('blogs')? 'active' : '' }}" href="/blogs">Blogs</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" class="dropdown-item"
                                       onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item ">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item me-3">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endif

                @endauth

            </ul>

            <form class="d-flex" role="search" action="/blogs">
                @if (request('category'))
                    <input type="hidden" placeholder="Search" aria-label="Search" name="category"
                           value="{{request('category')}}">
                @endif
                @if (request('user'))
                    <input type="hidden" placeholder="Search" aria-label="Search" name="user"
                           value="{{request('user')}}">
                @endif
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"
                       value="{{request('search')}}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
