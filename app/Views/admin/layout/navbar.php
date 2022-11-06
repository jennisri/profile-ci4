 <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu Utama</div>
                    <a class="nav-link" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Produk
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/daftarproduk">Daftar Produk</a>
                            <a class="nav-link" href="/daftarkategori">Kategori Porduk</a>
                        </nav>
                    </div>

                    <a class="nav-link" href="/slider">
                        <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                        Manage Slider
                    </a>

                    <a class="nav-link" href="/team">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                        Manager Team
                    </a>

                    <a class="nav-link" href="/akun">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Akun
                    </a>

                    <a class="nav-link" href="/logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo user()->username ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">