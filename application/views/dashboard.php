<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <?php $this->load->view('partials/navbar') ?>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Jumlah Kategori</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?= $jumlah_kategori ?></h1>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Jumlah Bahan</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?= $jumlah_bahan_makanan ?></h1>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Jumlah Resep</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?= $jumlah_resep ?></h1>

                    </div>
                </div>
            </div>

        </div>

    </div>



</div>