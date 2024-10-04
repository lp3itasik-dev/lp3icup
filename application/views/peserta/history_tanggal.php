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
                                        <img src="<?= base_url('assets/') ?>material/dist/img/lp_putih.png" class="img-fluid" alt="Logo" width="50%" height="100%"/>
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
                        foreach($read as $r){
                            $day = date('l', strtotime($r->tanggal));
                            if($day === "Sunday"){
                                $hari = "Minggu";
                            }else if($day === "Monday"){
                                $hari = "Senin";
                            }else if($day === "Tuesday"){
                                $hari = "Selasa";
                            }else if($day === "Wednesday"){
                                $hari = "Rabu";
                            }else if($day === "Thursday"){
                                $hari = "Kamis";
                            }else if($day === "Friday"){
                                $hari = "Jumat";
                            }else if($day === "Saturday"){
                                $hari = "Sabtu";
                            }
                    ?>

                    <div class="col-md-12">
                        <div class="card" style="border-radius: 100px;">
                            <div class="card-body" style="width: 100%; height: 100%; background: white; border-radius: 30px;">
                            <div class="row align-items-center">
                                    <div class="col-md-4 text-center">
                                        <a href="<?=base_url('match_history_tournament?id_jadwal=')?><?=$r->id_jadwal?>&&id_score=<?=$r->id_score?>">
                                            <img src="<?= base_url('data_diri/') ?>logo/<?= $r->logo_satu ?>" class="img-fluid" alt="Logo" width="10%" height="10%"/>
                                            <div style="color: #000A33; font-size: 18px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px;"><?=$r->nama_tim_satu?></div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div style="color: #000A33; font-size: 30px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px;"><?=$r->score_tim_satu?> - <?=$r->score_tim_dua?></div>
                                        <div style="width: 100%; height: 100%; color: black; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">(<?= $hari ?>, <?= date('d/m/y', strtotime($r->tanggal)) ?> - <?= date('H:i', strtotime($r->tanggal)) ?>)</div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a href="<?=base_url('match_history_tournament?id_jadwal=')?><?=$r->id_jadwal?>&&id_score=<?=$r->id_score?>">
                                            <img src="<?= base_url('data_diri/') ?>logo/<?= $r->logo_dua ?>" width="10%" height="10%" class="img-fluid" alt="Logo" style="margin-top:10px" />
                                            <div style="color: #000A33; font-size: 18px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px;"><?=$r->nama_tim_dua?></div>
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
</section></div>