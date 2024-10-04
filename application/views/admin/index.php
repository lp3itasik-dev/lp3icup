<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">

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
            </div>
        </div>
    </section>
</div>