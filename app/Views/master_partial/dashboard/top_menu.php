<nav class="topnav navbar navbar-light" style="background-color: var(--warna)">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="https://firebasestorage.googleapis.com/v0/b/myfin-ktp.appspot.com/o/Avatar%2Fuser.png?alt=media&token=22e6fddc-0378-4045-9d39-9fb6d1db9832" alt="..." class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?=base_url('profil')?>">Profile</a> 
                <a class="dropdown-item" href="<?=base_url('logout')?>">Logout</a>
            </div>
        </li>
    </ul>
</nav>