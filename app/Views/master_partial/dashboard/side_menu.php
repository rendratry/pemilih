<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <img src="<?= base_url('../assets/assets/images/kotak-suara.png') ?>" alt="" width="60" height="60">
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100 ">
                <a class="nav-link" href="<?=base_url('dashboard/admin')?>">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Data Calon Pemilih</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="<?=base_url('dashboard/admin/data-pemilih')?>">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Data Pemilih</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mb-2">
            <span>Data Lainnya</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="<?=base_url('dashboard/admin/import')?>">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Import Data Pemilih</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>