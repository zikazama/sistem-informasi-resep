<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">

        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">

                <div class="logo-element">
                    SIR
                </div>
            </li>
            <li class="<?= in_array($this->uri->segment(1), ['', 'dashboard']) ? 'active' : '' ?>">
                <a href="<?= base_url() ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
            </li>
            <li class="<?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
                <a href="<?= base_url() ?>kategori"><i class="fa fa-edit"></i> <span class="nav-label">Kategori</span></a>
            </li>
            <li class="<?= $this->uri->segment(1) == 'bahan' ? 'active' : '' ?>">
                <a href="<?= base_url() ?>bahan"><i class="fa fa-flask"></i> <span class="nav-label">Bahan</span></a>
            </li>
            <li class="<?= $this->uri->segment(1) == 'resep' ? 'active' : '' ?>">
                <a href="<?= base_url() ?>resep"><i class="fa fa-table"></i> <span class="nav-label">Resep</span></a>
            </li>

        </ul>

    </div>
</nav>