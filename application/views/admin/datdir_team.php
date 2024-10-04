<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Diri</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Diri</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" onclick="return tambah()" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Asal Sekolah</th>
                                        <th>Nama Pemain</th>
                                        <th>Email</th>
                                        <th>Status Pemain</th>
                                        <th>Foto Berwarna</th>
                                        <th>Raport</th>
                                        <th>Kartu Pelajar</th>
                                        <th>Surat Izin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($read as $r) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $r->asal_sekolah ?></td>
                                            <td><?= $r->nama_pemain ?></td>
                                            <td><?= $r->email ?></td>
                                            <td><?= $r->status_pemain ?></td>
                                            <td class="text-center"><a href="<?= base_url('data_diri/foto/') ?><?= $r->foto_berwarna ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            <td class="text-center"><a href="<?= base_url('data_diri/raport/') ?><?= $r->raport ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            <td class="text-center"><a href="<?= base_url('data_diri/kartu_pelajar/') ?><?= $r->kartu_pelajar ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-eye"></i></a></td>
                                            <td class="text-center"><a href="<?= base_url('data_diri/surat_izin/') ?><?= $r->surat_izin_sekolah ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-eye"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    <div id="Modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="text" name="id_user" class="form-control" placeholder="asdf@gmail.com" value="<?= $_GET['id_team'] ?>" hidden>
                    <?php
                    $this->db->select('RIGHT(tbl_anggota_team.id_pemain,2) as id_user', FALSE);
                    $this->db->where('id_team', $_GET['id_team']);
                    $this->db->order_by('id_pemain', 'DESC');
                    $this->db->limit(1);
                    $query = $this->db->get('tbl_anggota_team');
                    if ($query->num_rows() <> 0) {
                        $data = $query->row();
                        $kode = intval($data->id_user) + 1;
                    } else {
                        $kode = 1;
                    }
                    $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);
                    $kodetampil = $_GET['id_team'] . $batas;
                    ?>
                    <input type="text" name="id_anggota_team" class="form-control" placeholder="asdf@gmail.com" value="<?= $kodetampil ?>" hidden>
                    <span id="modal-body-update-or-create">
                        <div class="form-group">
                            <input type="text" name="ask" class="form-control" placeholder="SMAN 2 KOTA BANJAR" value="<?= $_GET['asal_sekolah'] ?>" hidden>
                        </div>
                        <div class="form-group">
                            <label>Nama Pemain</label>
                            <input type="text" name="nama_pemain" class="form-control" placeholder="Pemain">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="asdf@gmail.com">
                        </div>

                        <div class="form-group">
                            <label>Status Pemain</label>
                            <select class="form-control select2" style="width: 100%;" name="status_pemain">
                                <option selected="selected">Pilih Status</option>
                                <option>Server</option>
                                <option>Spiker</option>
                                <option>Tosser</option>
                                <option>Libero</option>
                                <option>Middle Blocker</option>
                                <option>Universal player</option>
                                <option>Cadangan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Foto Berwarna</label>
                            <input type="file" name="foto_berwarna" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label>Raport</label>
                            <input type="file" name="raport" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label>Kartu Pelajar</label>
                            <input type="file" name="kartu_pelajar" class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label>Surat Izin Sekolah</label>
                            <input type="file" name="surat_izin_sekolah" class="form-control" placeholder="">
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
    function tambah(id_team, id_pemain, asal_sekolah, nama_pemain, email, status_pemain, foto_berwarna, raport, kartu_pelajar, surat_izin_sekolah) {
        $('#Modal').modal('show');
        $('#modal-header').html('Tambah Kelas');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id_team"]').val(id_team);
        $('[name="id_pemain"]').val(id_pemain);
        $('[name="asal_sekolah"]').val(asal_sekolah);
        $('[name="nama_pemain"]').val(nama_pemain);
        $('[name="email"]').val(email);
        $('[name="status_pemain"]').val(status_pemain);
        $('[name="foto_berwarna"]').val(foto_berwarna);
        $('[name="raport"]').val(raport);
        $('[name="kartu_pelajar"]').val(kartu_pelajar);
        $('[name="surat_izin_sekolah"]').val(surat_izin_sekolah);
        document.form.action = '<?= base_url('anggota'); ?>';
    }
</script>