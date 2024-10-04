<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                $this->db->select('*');
                $this->db->from('tbl_anggota_team');
                $this->db->where('id_team', $this->session->userdata('id_user'));
                $cek = $this->db->get();
                if ($cek->num_rows() > 0) {
                    $di = "hidden";
                } else {
                    $di = "";
                }
                ?>
                <div class="col-12 mt-4" <?= $di ?>>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div class="ml-4">
                            Harap lengkapi data pemain pada menu Data Diri
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Jadwal Pertandingan</h3>
                        </div>
                        <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Tim Satu</th>
                                        <th class="text-center">Match</th>
                                        <th>Tim Dua</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($read as $r) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= date('d/m/Y', strtotime($r->tanggal)) ?></td>
                                            <td><?= $r->nama_tim_satu ?></td>
                                            <td class="text-center">VS</td>
                                            <td><?= $r->nama_tim_dua ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>