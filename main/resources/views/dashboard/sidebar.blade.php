<div class="sidebarcol-md-3 col-lg-2 p-0 nav-background position-fixed" id="sidemenu">
    <div class="offcanvas-md offcanvas-end " tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Universitas Kristen Maranatha</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body nav-background d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{Request::is('/') ? 'active': ''}}"
                       aria-current="page" href="/">
                        <i class="bi bi-house-fill pb-4"></i>
                        Dashboard
                    </a>
                </li>
                @canany(['admin', 'kaprodi'])
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/users') ? 'active': ''}}"
                           href="/dashboard/users">
                            <i class="bi bi-people pb-4"></i>
                            User
                        </a>
                    </li>
                @endcanany
                @canany(['admin', 'kaprodi'])
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/mata-kuliah') ? 'active': ''}}"
                           href="/dashboard/mata-kuliah">
                            <i class="bi bi-list-task pb-4"></i>
                            Mata Kuliah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/kurikulum') ? 'active': ''}}"
                           href="/dashboard/kurikulum">
                            <i class="bi bi-list-task pb-4"></i>
                            Kurikulum
                        </a>
                    </li>
                @endcanany
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center collapsed gap-2 {{Request::is('dashboard/polling')? 'active': ''}}"
                       data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                        <i class="bi bi-file-post pb-4"></i>
                        <span>Polling Mata Kuliah <i class="bi bi-caret-down-fill polling-icon ps-1 pb-2"></i></span>
                    </a>
                    <div class="collapse" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ps-4 small">
                            <li>
                                <a href="/dashboard/polling"
                                   class="nav-link d-flex align-items-center collapsed gap-2">
                                    <i class="bi bi-calendar-check me-1 pb-4"></i>
                                    <span>Lihat Polling</span>
                                </a>
                            </li>
                            @canany(['admin', 'kaprodi'])
                                <li>
                                    <a href="/dashboard/make-polling"
                                       class="nav-link d-flex align-items-center collapsed gap-2">
                                        <i class="bi bi-blockquote-left pb-4"></i>
                                        <span>Rencana Polling</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/dashboard/polling-hasil"
                                       class="nav-link d-flex align-items-center collapsed gap-2">
                                        <i class="bi bi-graph-up-arrow pb-4"></i>
                                        <span> Hasil Polling </span>
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
