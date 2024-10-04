<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Registrasi</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('registration') ?>" method="post" enctype="multipart/form-data">
                                <?php
                                $this->load->model('Models', 'm');
                                $kode = $this->m->CreateCode();
                                ?>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Id User</label>
                                        <input type="text" name="id_user" class="form-control" placeholder="" value="<?= $kode; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nama Team</label>
                                        <input type="text" name="nama_team" class="form-control" placeholder="Nama Team">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" class="form-control" placeholder="SMK Muhammadiyah Kota Tasikmalaya">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="asdf@gmail.com">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="********" maxlength="8">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Warna Tim</label>
                                        <input type="color" id="favcolor" class="form-control" name="favcolor" value="#000000" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Logo Sekolah (Hanya PNG)</label>
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>