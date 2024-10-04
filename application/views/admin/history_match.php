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
                                        <img src="<?= base_url('data_diri/') ?>logo/<?= $r->logo_satu ?>" class="img-fluid" alt="Logo" width="10%" height="10%"/>
                                        <div style="color: #000A33; font-size: 18px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px;"><?=$r->nama_tim_satu?></div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div style="color: #000A33; font-size: 30px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px;"><?=$r->score_tim_satu?> - <?=$r->score_tim_dua?></div>
                                        <div style="width: 100%; height: 100%; color: black; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">(<?= $hari ?>, <?= date('d/m/y', strtotime($r->tanggal)) ?> - <?= date('H:i', strtotime($r->tanggal)) ?>)</div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img src="<?= base_url('data_diri/') ?>logo/<?= $r->logo_dua ?>" width="10%" height="10%" class="img-fluid" alt="Logo" style="margin-top:10px" />
                                        <div style="color: #000A33; font-size: 18px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px;"><?=$r->nama_tim_dua?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>

                    <?php
                        foreach($match as $m){
                            $dayy = date('l', strtotime($m->tanggal));
                            if($dayy === "Sunday"){
                                $harii = "Minggu";
                            }else if($dayy === "Monday"){
                                $harii = "Senin";
                            }else if($dayy === "Tuesday"){
                                $harii = "Selasa";
                            }else if($dayy === "Wednesday"){
                                $harii = "Rabu";
                            }else if($dayy === "Thursday"){
                                $harii = "Kamis";
                            }else if($dayy === "Friday"){
                                $harii = "Jumat";
                            }else if($dayy === "Saturday"){
                                $harii = "Sabtu";
                            }

                            if($m->score_tim_satu > $m->score_tim_dua){
                                $satu = "#ffffff";
                                $dua = "#F15C67";
                                $oval_satu = "background-color: #00AEB6; border-radius: 100%;";
                                $oval_dua = "";
                            }else if($m->score_tim_dua > $m->score_tim_satu){
                                $satu = "#F15C67";
                                $dua = "#ffffff";
                                $oval_satu = "";
                                $oval_dua = "background-color: #00AEB6; border-radius: 100%;";
                            }else{
                                $satu = "#F15C67";
                                $dua = "#F15C67";
                                $oval_satu = "";
                                $oval_dua = "";
                            }
                    ?>
                        <div class="col-md-12">
                            <div class="card" style="border-radius: 100px;">
                                <div class="card-body" style="width: 100%; height: 100%; background: white; border-radius: 30px;">
                                <div class="row align-items-center">
                                        <div class="col-md-4 text-center">
                                            <div style="color: <?=$satu?>; font-size: 30px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px; <?=$oval_satu?> padding: 10px; display: inline-block;">
                                                <?=$m->score_tim_satu?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div style="color: #F15C67; font-size: 30px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px;">Match <?=$m->match?></div>
                                            <div style="width: 100%; height: 100%; color: black; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">(<?= $harii ?>, <?= date('d/m/y', strtotime($m->tanggal)) ?> - <?= date('H:i', strtotime($m->tanggal)) ?>)</div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div style="color: <?=$dua?>; font-size: 30px; font-family: Poppins; font-weight: 900; word-wrap: break-word; margin-top: 10px; <?=$oval_dua?> padding: 10px; display: inline-block;">
                                                <?=$m->score_tim_dua?>
                                            </div>                                        
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