<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="content-wrapper" style="
background: url('<?= base_url('assets/') ?>material/dist/img/bg_scr.png');
background-size: cover;
  background-repeat: no-repeat;
  background-color: #00426D;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($read as $r) {
                }
                $this->db->select('*');
                $this->db->from('tbl_score');
                $this->db->where('id_jadwal', $_GET['id_jadwal']);
                $cek = $this->db->get();
                if($cek->num_rows() >0 ){
                    $y = $cek->row();
                    $score_tim_satu = $y->score_tim_satu;
                    $score_tim_dua = $y->score_tim_dua;
                    $jml = $score_tim_satu +  $score_tim_dua;
                    if($jml < 5 ){
                        $disab = "";
                    }else{
                        $disab = "hidden";
                    }
                }else{
                    $score_tim_satu = 0;
                    $score_tim_dua = 0;
                    $jml = 0;
                    $disab = "";
                }                                                   
                ?>
                    <div class="col-12">
                        <div class="card mt-4" style="border-radius: 100px;">
                            <div class="card-body" style="background-color: #000A33; width: 100%; height: 100%;  border-radius: 30px;">

                                <div class="row">
                                    <div class="col-xs-1">
                                        <div class="card-body" style="width: 16px; height: 38px; background: #FFFDD0; margin-left: 19px;">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div style="width: 100%; height: 100%; color: white; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?= $r->asal_sekolah_satu ?></div>
                                    </div>

                                    <div class="col-md-1 text-center"  id="element1">
                                        <img name="satu" style="width: 27px; height: 27px" src="<?= base_url('assets/') ?>material/dist/img/volly.png" />
                                    </div>
                                    <?php
                                        $this->db->select('*');
                                        $this->db->from('tbl_match');
                                        $this->db->where('id_jadwal',$_GET['id_jadwal']);
                                        $this->db->where('match',1);
                                        $m1 = $this->db->get();
                                        if ($m1->num_rows()>0) {
                                            $data = $m1->row();
                                            $score_satu = $data->score_tim_satu;
                                            $score_dua = $data->score_tim_dua;
                                        }else{
                                            $score_satu = 0;
                                            $score_dua = 0;
                                        }

                                        $this->db->select('*');
                                        $this->db->from('tbl_match');
                                        $this->db->where('id_jadwal',$_GET['id_jadwal']);
                                        $this->db->where('match',2);
                                        $m2 = $this->db->get();
                                        if ($m2->num_rows()>0) {
                                            $data2 = $m2->row();
                                            $score2_satu = $data2->score_tim_satu;
                                            $score2_dua = $data2->score_tim_dua;
                                        }else{
                                            $score2_satu = 0;
                                            $score2_dua = 0;
                                        }

                                        $this->db->select('*');
                                        $this->db->from('tbl_match');
                                        $this->db->where('id_jadwal',$_GET['id_jadwal']);
                                        $this->db->where('match',3);
                                        $m3 = $this->db->get();
                                        if ($m3->num_rows()>0) {
                                            $data3 = $m3->row();
                                            $score3_satu = $data3->score_tim_satu;
                                            $score3_dua = $data3->score_tim_dua;
                                        }else{
                                            $score3_satu = 0;
                                            $score3_dua = 0;
                                        }

                                        $this->db->select('*');
                                        $this->db->from('tbl_match');
                                        $this->db->where('id_jadwal',$_GET['id_jadwal']);
                                        $this->db->where('match',4);
                                        $m4 = $this->db->get();
                                        if ($m4->num_rows()>0) {
                                            $data4 = $m4->row();
                                            $score4_satu = $data4->score_tim_satu;
                                            $score4_dua = $data4->score_tim_dua;
                                        }else{
                                            $score4_satu = 0;
                                            $score4_dua = 0;
                                        }

                                        $this->db->select('*');
                                        $this->db->from('tbl_match');
                                        $this->db->where('id_jadwal',$_GET['id_jadwal']);
                                        $this->db->where('match',5);
                                        $m5 = $this->db->get();
                                        if ($m5->num_rows()>0) {
                                            $data5 = $m5->row();
                                            $score5_satu = $data5->score_tim_satu;
                                            $score5_dua = $data5->score_tim_dua;
                                        }else{
                                            $score5_satu = 0;
                                            $score5_dua = 0;
                                        }

                                        $this->db->select('*');
                                        $this->db->from('tbl_score');
                                        $this->db->where('id_jadwal',$_GET['id_jadwal']);
                                        $scr = $this->db->get();
                                        if ($scr->num_rows()>0) {
                                            $score = $scr->row();
                                            $hasil_satu = $score->score_tim_satu;
                                            $hasil_dua = $score->score_tim_dua;
                                        }else{
                                            $hasil_satu = 0;
                                            $hasil_dua = 0;
                                        }

                                        if ($score_satu > $score_dua){
                                            $hasil_satu = 1;
                                            $hasil_dua = 0;
                                        }elseif($score_satu == 0 && $score_dua == 0){
                                            $hasil_satu = 0;
                                            $hasil_dua = 0;
                                        }elseif($score_satu == $score_dua ){
                                            $hasil_satu = 0;
                                            $hasil_dua = 0;
                                        }else{
                                            $hasil_satu = 0;
                                            $hasil_dua = 1;
                                        }

                                        if ($score2_satu > $score2_dua){
                                            $hasil2_satu = 1;
                                            $hasil2_dua = 0;
                                        }elseif($score2_satu == 0 && $score2_dua == 0){
                                            $hasil2_satu = 0;
                                            $hasil2_dua = 0;
                                        }elseif($score2_satu == $score2_dua ){
                                            $hasil2_satu = 0;
                                            $hasil2_dua = 0;
                                        }else{
                                            $hasil2_satu = 0;
                                            $hasil2_dua = 1;
                                        }

                                        if ($score3_satu > $score3_dua){
                                            $hasil3_satu = 1;
                                            $hasil3_dua = 0;
                                        }elseif($score3_satu == 0 && $score3_dua == 0){
                                            $hasil3_satu = 0;
                                            $hasil3_dua = 0;
                                        }elseif($score3_satu == $score3_dua ){
                                            $hasil3_satu = 0;
                                            $hasil3_dua = 0;
                                        }else{
                                            $hasil3_satu = 0;
                                            $hasil3_dua = 1;
                                        }

                                        if ($score4_satu > $score4_dua){
                                            $hasil4_satu = 1;
                                            $hasil4_dua = 0;
                                        }elseif($score4_satu == 0 && $score4_dua == 0){
                                            $hasil4_satu = 0;
                                            $hasil4_dua = 0;
                                        }elseif($score4_satu == $score4_dua ){
                                            $hasil4_satu = 0;
                                            $hasil4_dua = 0;
                                        }else{
                                            $hasil4_satu = 0;
                                            $hasil4_dua = 1;
                                        }

                                        if ($score5_satu > $score5_dua){
                                            $hasil5_satu = 1;
                                            $hasil5_dua = 0;
                                        }else if($score5_satu == 0 && $score5_dua == 0){
                                            $hasil5_satu = 0;
                                            $hasil5_dua = 0;
                                        }elseif($score5_satu == $score5_dua ){
                                            $hasil5_satu = 0;
                                            $hasil5_dua = 0;
                                        }else{
                                            $hasil5_satu = 0;
                                            $hasil5_dua = 1;
                                        }

                                        $hasil_score_satu = ($hasil_satu + $hasil2_satu +  $hasil3_satu+ $hasil4_satu+ $hasil5_satu);
                                        $hasil_score_dua = ($hasil_dua + $hasil2_dua +  $hasil3_dua+ $hasil4_dua+ $hasil5_dua);
                                    ?>

                                    <div class="col-sm-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score_satu?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score2_satu?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score3_satu?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score4_satu?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score5_satu?></div>
                                        </div>
                                    </div>
                                    <!-- === -->

                                    <div class="col-md-1 text-center">
                                        <div style="width: 100%; height: 100%; color: #FFFFFF; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word">
                                            <?=$hasil_score_satu?>
                                            <!-- <input type="text" name="hasil_score_satu" value="<?=$hasil_score_satu?>" hidden> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-1">
                                        <div class="card-body" style="background-color: #FFFFFF; width: 16px; height: 38px; margin-left: 19px;">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div style="width: 100%; height: 100%; color: white; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?= $r->asal_sekolah_dua ?></div>
                                    </div>

                                    <div class="col-md-1 text-center" id="element2">
                                        <img name="dua" style="width: 27px; height: 27px" src="<?= base_url('assets/') ?>material/dist/img/volly.png" />
                                    </div>

                                    <!-- SET -->
                                    <div class="col-md-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score_dua?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score2_dua?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score3_dua?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score4_dua?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div style="width: 100%; height: 100%; background: #5088FD" class="text-center">
                                            <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word"><?=$score5_dua?></div>
                                        </div>
                                    </div>
                                    <!-- === -->

                                    <div class="col-md-1 text-center">
                                        <div style="width: 100%; height: 100%; color: #FFFFFF; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word">
                                            <?=$hasil_score_dua?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="card" style="border-radius: 100px;">
                            <div class="card-body" style="width: 100%; height: 100%; background: white; border-radius: 30px">
                                <div class="row">
                                    <img style="" width="250px" src="<?= base_url('assets/') ?>material/dist/img/lp3i.svg" />
                                    <img style="" width="10%" height="100%" src="<?= base_url('assets/') ?>material/dist/img/kmu.png" class="ml-2 mt-1" />
                                    <img style=" margin-left: auto;" width="150px" src="<?= base_url('assets/') ?>material/dist/img/kampus_merdeka.png" />
                                </div>

                                    <form action="<?= base_url('score_match') ?>" method="post">
                                        <div class="row justify-content-center align-items-center mt-5">
                                            <div class="col-md-2 text-center">
                                                <input type="text" name="id_jadwal" value="<?= $_GET['id_jadwal'] ?>" hidden>
                                                <!--<img style="width: 229px; height: 243px;" src="<?= base_url('data_diri/') ?>logo/<?= $r->logo_satu ?>" alt="Gambar Satu" />-->
                                                <br>
                                                <div style="color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word">
                                                    <?= $r->nama_tim_satu ?>
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center" style="color: #000A33; font-size: 96px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                <span id="scoreTimSatuValue">0</span>
                                                <input type="text" name="scr_tim_satu" id="inputScoreTimSatu" value="0" hidden>
                                                <input type="text" name="id_tim_satu" value="<?= $r->id_tim_satu ?>"hidden >
                                                <input type="number" name="hasil_scr_satu" value="<?=$hasil_score_satu?>" hidden>
                                            </div>
                                            <div class="col-md-2 text-center" style="color: #000A33; font-size: 96px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                -
                                            </div>
                                            <div class="col-md-2 text-center" id="scoreTimSatu" style="color: #000A33; font-size: 96px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                <span id="scoreTimDuaValue">0</span>
                                                <input type="text" name="scr_tim_dua" id="inputScoreTimDua" value="0" hidden>
                                                <input type="text" name="id_tim_dua" value="<?= $r->id_tim_dua ?>" hidden>
                                                <input type="number" name="hasil_scr_dua" value="<?=$hasil_score_dua?>" hidden>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <!--<img style="width: 220px; height: 223px;" src="<?= base_url('data_diri/') ?>logo/<?= $r->logo_dua ?>" alt="Gambar Dua" />-->
                                                <br>
                                                <div style="color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word">
                                                    <?= $r->nama_tim_dua ?>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row justify-content-center align-items-center mt-2">
                                            <span id="TimeTimSatuValue" style="font-size: 50px;">0</span>
                                            <div class="col-md-2 text-center">
                                                <img width="80%" src="<?= base_url('assets/') ?>material/dist/img/lpv.png" alt="Gambar Dua" />
                                            </div>
                                            <span id="TimeTimDuaValue" style="font-size: 50px;">0</span>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning" onclick="tambahScore('timSatu')" title="Tambah Score Tim Satu"><i class="fas fa-plus"></i></a>
                                                <a href="#" class="btn btn-info" onclick="kurangiScore('timSatu')" title="Kurangi Score Tim Satu"><i class="fas fa-minus"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning" onclick="tambahScore('timDua')" title="Tambah Score Tim Dua"><i class="fas fa-plus"></i></a>
                                                <a href="#" class="btn btn-info" onclick="kurangiScore('timDua')" title="Kurangi Score Tim Dua"><i class="fas fa-minus"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                
                                                <button type="submit" class="btn btn-warning" <?=$disab?> title="Finish"><i class="fas fa-flag"></i></button>
                                            </div>
                                            
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-success" onclick="tambahTime('timSatu')" title="Tambah Time Out Tim Satu"><i class="fas fa-plus"></i></a>
                                                <a href="#" class="btn btn-danger" onclick="kurangiTime('timSatu')" title="Kurangi Time Out Tim Satu"><i class="fas fa-minus"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-success" onclick="tambahTime('timDua')" title="Tambah Time Out Tim Dua"><i class="fas fa-plus"></i></a>
                                                <a href="#" class="btn btn-danger" onclick="kurangiTime('timDua')" title="Kurangi Time Out Tim Dua"><i class="fas fa-minus"></i></a>
                                            </div>
                                    </form>
                            </div>

                        </div>

                    </div>
            </div>

        </div>
</div>
</section>
<div style="width: 100%; height: 100%; background: #D9D9D9; margin-top: 130px;">
    <marquee behavior="scroll" direction="left" scrollamount="5">
        <div style="width: 100%; height: 100%; color: #000A33; font-size: 24px; font-family: Poppins; font-weight: 900; word-wrap: break-word">SPONSOR</div>
    </marquee>
</div>
</div>
<script>
    $(document).ready(function () {
        // Hide the elements initially
        $('#element1, #element2').hide();

        // Toggle the visibility of the elements when the button is clicked
        $('#toggleButton').on('click', function () {
            $('#element1, #element2').toggle();
        });
    });
</script>
<script>
    var TimeTimSatu = 0;
    var TimeTimDua = 0;

    function tambahTime(tim) {
        if (tim === 'timSatu') {
            TimeTimSatu++;
            updateTime('timSatu');
        } else if (tim === 'timDua') {
            TimeTimDua++;
            updateTime('timDua');
        }
        // Tambahkan kondisi untuk tim lain jika diperlukan
    }

    function kurangiTime(tim) {
        if (tim === 'timSatu' && TimeTimSatu > 0) {
            TimeTimSatu--;
            updateTime('timSatu');
        } else if (tim === 'timDua' && TimeTimDua > 0) {
            TimeTimDua--;
            updateTime('timDua');
        }
        // Tambahkan kondisi untuk tim lain jika diperlukan
    }

    function updateTime(tim) {
        if (tim === 'timSatu') {
            document.getElementById('TimeTimSatuValue').innerText = TimeTimSatu;
            document.getElementById('inputTimeTimSatu').value = TimeTimSatu;
        } else if (tim === 'timDua') {
            document.getElementById('TimeTimDuaValue').innerText = TimeTimDua;
            document.getElementById('inputTimeTimDua').value = TimeTimDua;
        }
        // Tambahkan kondisi untuk tim lain jika diperlukan
    }
</script>

<script>
    var scoreTimSatu = 0;
    var scoreTimDua = 0;

    function tambahScore(tim) {
        if (tim === 'timSatu') {
            scoreTimSatu++;
            updateScore('timSatu');
        } else
        if (tim === 'timDua') {
            scoreTimDua++;
            updateScore('timDua');
        }
        // Tambahkan kondisi untuk tim lain jika diperlukan
    }

    function kurangiScore(tim) {
        if (tim === 'timSatu' && scoreTimSatu > 0) {
            scoreTimSatu--;
            updateScore('timSatu');
        } else
        if (tim === 'timDua' && scoreTimDua > 0) {
            scoreTimDua--;
            updateScore('timDua');
        }
        // Tambahkan kondisi untuk tim lain jika diperlukan
    }

    function updateScore(tim) {
        document.getElementById('scoreTimSatuValue').innerText = scoreTimSatu;
        document.getElementById('inputScoreTimSatu').value = scoreTimSatu;
        document.getElementById('scoreTimDuaValue').innerText = scoreTimDua;
        document.getElementById('inputScoreTimDua').value = scoreTimDua;
    }
</script>