<header class="navbar container-fluid sticky-top flex-md-nowrap p-0 shadow nav-background" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-white" href="#" id="univ">Universitas Kristen Maranatha</a>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                    aria-label="Toggle search">
                <svg class="bi">
                    <use xlink:href="#search"/>
                </svg>
            </button>
        </li>
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                <svg class="bi">
                    <use xlink:href="#list"/>
                </svg>
            </button>
        </li>
    </ul>

    <div id="navbarSearch" class="navbar-search collapse">
        <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>

    <div class="dropdown position-fixed me-3 end-0">
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{auth()->user()->nama_user}}
        </button>
        <ul class="dropdown-menu dropdown-menu-end nav-background py-2 ">
{{--            <li><a class="dropdown-item" href="#">Profile</a></li>--}}
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </li>
        </ul>
    </div>
</header>
