<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <?php $this->load->view('partials/navbar') ?>
    </div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Kategori</h2>

        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php if ($this->session->flashdata('success') != null) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?= $this->session->flashdata('success') ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('failed') != null) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?= $this->session->flashdata('failed') ?>
                            </div>
                        <?php } ?>
                        <a href="<?= base_url('kategori/create') ?>">
                            <button class="btn btn-primary btn-block mb-3">Tambah</button>
                        </a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kategori as $item) { ?>
                                        <tr class="gradeX">
                                            <td><?= $no ?></td>
                                            <td><?= $item['nama_kategori'] ?></td>
                                            <td class="center">
                                                <a href="<?= base_url('kategori/edit/' . $item['id_kategori']) ?>">
                                                    <button class="btn btn-warning">Edit</button>
                                                </a>
                                                <a href="<?= base_url('kategori/delete/' . $item['id_kategori']) ?>">
                                                    <button class="btn btn-danger">hapus</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>