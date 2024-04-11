<div class="sidebarcol-md-3 col-lg-2 p-0 nav-background position-fixed" id="sidemenu">
   <div class="offcanvas-md offcanvas-end " tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
         <h5 class="offcanvas-title" id="sidebarMenuLabel">Universitas Kristen Maranatha</h5>
         <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body nav-background d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
         <ul class="nav flex-column">
            <li class="nav-item">
               <a class="nav-link d-flex align-items-center gap-2 {{Request::is('/') ? 'active': ''}}" aria-current="page" href="/">
                  <i class="bi bi-house-fill pb-4"></i>
                  Dashboard
               </a>
            </li>
            @can('kaprodi')
            <li class="nav-item">
               <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/users') ? 'active': ''}}" href="/dashboard/users">
                  <i class="bi bi-people pb-4"></i>
                  User
               </a>
            </li>
            @endcan
            @can('kaprodi')
            <li class="nav-item">
               <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/matakuliah') ? 'active': ''}}" href="/dashboard/mata-kuliah">
                  <i class="bi bi-list-task pb-4"></i>
                  Mata Kuliah
               </a>
            </li>
            @endcan
            <li class="nav-item">
               <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/polling')? 'active': ''}}" href="/dashboard/polling">
                  <i class="bi bi-file-post pb-4"></i>
                  Polling Mata Kuliah
               </a>
            </li>
         </ul>
      </div>
   </div>
</div>
