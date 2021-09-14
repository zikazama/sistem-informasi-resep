<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <?php $this->load->view('partials/navbar') ?>
    </div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Form Resep</h2>

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
                        <?php if ($this->uri->segment(2) == 'create') { ?>
                            <form method="post" action="<?= base_url('resep/store') ?>">
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Resep</label>

                                    <div class="col-sm-10"><input name="nama_resep" type="text" class="form-control" required placeholder="Masukan nama resep"></div>
                                </div>

                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Kategori</label>

                                    <div class="col-sm-10">
                                        <select name="id_kategori" class="form-control" required>
                                            <?php foreach ($kategori as $item) { ?>
                                                <option value="<?= $item['id_kategori'] ?>"><?= $item['nama_kategori'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" onclick="window.history.go(-1); return false;" type="submit">Cancel</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        <?php } else { ?>
                            <form method="post" action="<?= base_url('resep/update/' . $resep['id_resep']) ?>">
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Resep</label>

                                    <div class="col-sm-10"><input name="nama_resep" type="text" class="form-control" value="<?= $resep['nama_resep'] ?>" required placeholder="Masukan nama resep"></div>
                                </div>

                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Kategori</label>

                                    <div class="col-sm-10">
                                        <select name="id_kategori" class="form-control" required>
                                            <?php foreach ($kategori as $item) { ?>
                                                <option value="<?= $item['id_kategori'] ?>" <?= $item['id_kategori'] == $resep['id_kategori'] ? 'selected' : '' ?>><?= $item['nama_kategori'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" onclick="window.history.go(-1); return false;" type="submit">Cancel</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>