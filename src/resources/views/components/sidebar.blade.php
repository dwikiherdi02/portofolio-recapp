<aside class="sidebar border-0 border-right col-md-3 col-lg-2 p-0 bg-white">
    <div class="offcanvas-md offcanvas-end bg-white" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header border border-bottom">
            <h5 class="offcanvas-title fw-bolder" id="sidebarMenuLabel">Rec'App</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column">
            <ul class="nav nav-pills flex-column row-gap-1 sscrollbar">
                <li class="nav-item">
                    <a class="nav-link gap-2 active" href="#">
                        <span class="icon">
                            <i class="fa-solid fa-gauge fa-lg"></i>
                        </span>
                        <span class="text">
                            {{ __('Dashboard') }}
                        </span>
                    </a>
                </li>
                {{-- @for ($i = 0; $i < 100; $i++) --}}
                <li class="nav-item">
                    <a class="nav-link gap-2" href="#">
                        <span class="icon">
                            <i class="fa-solid fa-list fa-lg"></i>
                        </span>
                        <span class="text">
                            {{ __('Categories' )}}
                        </span>
                    </a>
                </li>
                {{-- @endfor --}}
            </ul>


            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ auth()->user()->avatar }}" alt="" width="32" height="32" class="rounded-circle me-2">
                    <span>{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</aside>
