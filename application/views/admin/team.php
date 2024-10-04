<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card mt-4">
                <div class="card-header">
                    <button type="button" class="btn btn-warning btn-sm" onclick="return tambah()"><i class="fas fa-plus"></i></button>
                </div>
                <div class="card-body" id="team-form">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Team</th>
                                <th>Asal Sekolah</th>
                                <th>Data Pemain</th>
                                <!--<th>Aksi</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($read as $r) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $r->nama_tim ?></td>
                                    <td><?= $r->asal_sekolah ?></td>
                                    <td>
                                        <a href="<?= base_url('data_diri_team?id_team=') ?><?= $r->id_team ?>&&asal_sekolah=<?= $r->asal_sekolah ?>" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                    </td>
                                    <!--<td class="text-center">-->
                                    <!--    <a href="<?= base_url('upd_team?id_team=') ?><?= $r->id_team ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>-->
                                    <!--    <a href="<?= base_url('del_team?id_team=') ?><?= $r->id_team ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>-->
                                    <!--</td>-->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
</div>

<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    <div id="Modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <?php
                    $this->load->model('Models', 'm');
                    $kode = $this->m->CreateCodeT();
                    ?>
                    <input type="text" name="id_team" value="<?= $kode; ?>" hidden>
                    <span id="modal-body-update-or-create">
                        <div class="form-group">
                            <label>Nama Team</label>
                            <input type="text" name="nama_team" class="form-control" placeholder="Nama Team">
                        </div>
                        <div class="form-group">
                            <label>Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah">
                        </div>
                    </span>
                    <span id="modal-body-delete">
                        Yakin untuk menghapus <b id="name-delete"></b> dari tabel ini?
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="modal-button"><i class="fas fa-log-in"></i>Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    function tambah() {
        $('#Modal').modal('show');
        $('#modal-header').html('Tambah Team');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_team"]').val();
        $('[name="nama_team"]').val();
        $('[name="asal_sekolah"]').val();
        document.form.action = '<?= base_url('tamb_team'); ?>';
    }
</script>