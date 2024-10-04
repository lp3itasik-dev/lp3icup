<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="content-wrapper" style="
background: url('<?= base_url('assets/') ?>material/dist/img/bg_scr.png');
background-size: cover;
  background-repeat: no-repeat;
  background-color: #00426D;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4 mx-auto" style="border-radius: 100px;">
                        <div class="card-body" style="background-color: #000A33; border-radius: 30px; padding: 30px;">
                            <div class="row align-items-center">
                                <div class="col-md-4 text-center">
                                    <img src="<?= base_url('assets/') ?>material/dist/img/lp_putih.png" class="img-fluid" alt="Logo" width="50%" height="100%" />
                                </div>
                                <div class="col-md-4 text-center">
                                    <div style="color: #F2B12D; font-size: 30px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px;">HISTORY PERTANDINGAN</div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="<?= base_url('assets/') ?>material/dist/img/ugm_putih.png" width="40%" height="100%" class="img-fluid" alt="Logo" style="margin-top:10px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    foreach ($read as $r) {
                ?>
                <div class="col-md-4">
                    <div class="card" style="border-radius: 100px;">
                        <div class="card-body" style="width: 100%; height: 100%; background: white; border-radius: 30px;">
                            <div class="row align-items-center">
                                <div class="col-md-12 text-center">
                                    <a href="<?= base_url('team_history_tournament?id_team=') ?><?=$r->id_team?>">
                                        <img src="<?= base_url('data_diri/') ?>logo/<?= $r->logo ?>" class="img-fluid" alt="Logo" width="10%" height="10%" />
                                        <div style="color: #000A33; font-size: 18px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px;"><?=$r->nama_tim?></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>


            </div>

        </div>
</div>
</section>
</div>