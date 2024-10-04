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
                                <!-- <th>Asal Sekolah</th> -->
                                <th>Tanggal</th>
                                <th>Tim Satu</th>
                                <th class="text-center">Match</th>
                                <th>Tim Dua</th>
                                <th>input score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($read as $r) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <!-- <td><?= $r->asal_sekolah ?></td> -->
                                    <td><?= date('d/m/Y', strtotime($r->tanggal)) ?></td>
                                    <td><?= $r->nama_tim_satu ?></td>
                                    <td class="text-center">VS</td>
                                    <td><?= $r->nama_tim_dua ?></td>
                                    <td>
                                        <a href="<?= base_url('score_input?id_jadwal=') ?><?= $r->id_jadwal ?>" class="btn btn-success btn-sm"><i class="fas fa-sort-numeric-up-alt"></i></a>
                                    </td>
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
                    <input type="text" name="id_jadwal" hidden>
                    <span id="modal-body-update-or-create">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tim 1</label>
                            <select class="form-control select2" style="width: 100%;" name="id_team_satu">
                                <option selected="selected">Pilih Tim 1</option>
                                <?php foreach ($team as $t) { ?>
                                    <option value="<?= $t->id_team ?>"><?= $t->nama_tim ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tim 2</label>
                            <select class="form-control select2" style="width: 100%;" name="id_team_dua">
                                <option selected="selected">Pilih Tim 2</option>
                                <?php foreach ($team as $t) { ?>
                                    <option value="<?= $t->id_team ?>"><?= $t->nama_tim ?></option>
                                <?php } ?>
                            </select>
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
        $('#modal-header').html('Tambah Kelas');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_jadwal"]').val();
        $('[name="tanggal"]').val();
        $('[name="id_team_satu"]').val();
        $('[name="id_team_dua"]').val();
        document.form.action = '<?= base_url('tamb_matching'); ?>';
    }
</script>