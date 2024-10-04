<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models', 'm');
        if (!$this->session->userdata('status_login')) {
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('status_login');
        $this->session->set_flashdata('logout', TRUE);
        redirect('Auth');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $select = $this->db->select('*, team_satu.nama_tim AS nama_tim_satu, team_dua.nama_tim AS nama_tim_dua');
        $select = $this->db->join('tbl_team AS team_satu', 'team_satu.id_team = tbl_jadwal.id_team_satu');
        $select = $this->db->join('tbl_team AS team_dua', 'team_dua.id_team = tbl_jadwal.id_team_dua');
        $select = $this->db->order_by('tbl_jadwal.tanggal', 'ASC');
        $select = $this->db->where('tbl_jadwal.tanggal', date('Y-m-d'));
        $data['read'] = $this->m->Get_All('tbl_jadwal', $select);

        $this->load->view('materials/header', $data);
        $this->load->view('materials/navbar', $data);
        $this->load->view('peserta/index', $data);
        $this->load->view('materials/footer', $data);
    }

    public function data_diri()
    {
        $select = $this->db->select('*');
        $select = $this->db->where('id_team', $this->session->userdata('id_user'));
        $data['read'] = $this->m->Get_All('tbl_anggota_team', $select);

        $this->load->view('materials/header', $data);
        $this->load->view('materials/navbar', $data);
        $this->load->view('peserta/data_diri', $data);
        $this->load->view('materials/footer', $data);
    }

    // public function actadd_anggota()
    // {
    //     $config_foto['upload_path']   = './data_diri/foto/'; // Sesuaikan dengan path yang diinginkan
    //     $config_foto['allowed_types'] = 'png|jpg|jpeg';
    //     $config_foto['max_size']      = 5120; // 5 MB

    //     $config_kartu_pelajar['upload_path']   = './data_diri/kartu_pelajar/'; // Sesuaikan dengan path yang diinginkan
    //     $config_kartu_pelajar['allowed_types'] = 'pdf';
    //     $config_kartu_pelajar['max_size']      = 2048; // 2 MB

    //     $config_raport['upload_path']   = './data_diri/raport/'; // Sesuaikan dengan path yang diinginkan
    //     $config_raport['allowed_types'] = 'pdf';
    //     $config_raport['max_size']      = 2048; // 2 MB

    //     $config_surat_izin['upload_path']   = './data_diri/surat_izin/'; // Sesuaikan dengan path yang diinginkan
    //     $config_surat_izin['allowed_types'] = 'pdf';
    //     $config_surat_izin['max_size']      = 2048; // 2 MB

    //     $this->upload->initialize($config_foto, TRUE);

    //     if ($this->upload->do_upload('foto_berwarna')) {
    //         $data_foto = $this->upload->data();
    //         echo "Foto Berwarna berhasil diupload ke " . $data_foto['full_path'];
    //     } else {
    //         echo "Gagal mengupload Foto Berwarna. Error: " . $this->upload->display_errors();
    //     }

    //     $this->upload->initialize($config_kartu_pelajar, TRUE);

    //     if ($this->upload->do_upload('kartu_pelajar')) {
    //         $data_kartu_pelajar = $this->upload->data();
    //         echo "Kartu Pelajar berhasil diupload ke " . $data_kartu_pelajar['full_path'];
    //     } else {
    //         echo "Gagal mengupload Kartu Pelajar. Error: " . $this->upload->display_errors();
    //     }

    //     $this->upload->initialize($config_raport, TRUE);

    //     if ($this->upload->do_upload('raport')) {
    //         $data_raport = $this->upload->data();
    //         echo "Raport berhasil diupload ke " . $data_raport['full_path'];
    //     } else {
    //         echo "Gagal mengupload Raport. Error: " . $this->upload->display_errors();
    //     }

    //     $this->upload->initialize($config_surat_izin, TRUE);

    //     if ($this->upload->do_upload('surat_izin')) {
    //         $data_surat_izin = $this->upload->data();
    //         echo "Surat Izin berhasil diupload ke " . $data_surat_izin['full_path'];
    //     } else {
    //         echo "Gagal mengupload Surat Izin. Error: " . $this->upload->display_errors();
    //     }

    //     $jawaban_soal          = $this->upload->data();
    //     $jawaban_soal          = $jawaban_soal['file_name'];
    //     $id_user               = $this->input->post('id_user', TRUE);
    //     $id_anggota_team       = $this->input->post('id_anggota_team', TRUE);
    //     $email              = $this->input->post('email', TRUE);
    //     $status_pemain     = $this->input->post('status_pemain', TRUE);

    //     $data = array(
    //         'id_user'               => $id_user,
    //         'id_anggota_team'       => $id_anggota_team,
    //         'email'                 => $email,
    //         'status_pemain'         => $status_pemain,
    //         'foto_berwarna'         => $jawaban_soal,
    //         'raport'                => $jawaban_soal,
    //         'kartu_pelajar'         => $jawaban_soal,
    //         'surat_izin_sekolah'    => $jawaban_soal,
    //     );
    //     $this->m->Save($data, 'tbl_anggota_team');
    //     redirect('data');
    // }

    public function actadd_anggota()
    {
        $config_foto['upload_path']   = './data_diri/foto/'; // Sesuaikan dengan path yang diinginkan
        $config_foto['allowed_types'] = 'png|jpg|jpeg';
        $config_foto['max_size']      = 5120; // 5 MB

        $config_kartu_pelajar['upload_path']   = './data_diri/kartu_pelajar/'; // Sesuaikan dengan path yang diinginkan
        $config_kartu_pelajar['allowed_types'] = 'pdf';
        $config_kartu_pelajar['max_size']      = 2048; // 2 MB

        $config_raport['upload_path']   = './data_diri/raport/'; // Sesuaikan dengan path yang diinginkan
        $config_raport['allowed_types'] = 'pdf';
        $config_raport['max_size']      = 2048; // 2 MB

        $config_surat_izin['upload_path']   = './data_diri/surat_izin/'; // Sesuaikan dengan path yang diinginkan
        $config_surat_izin['allowed_types'] = 'pdf';
        $config_surat_izin['max_size']      = 2048; // 2 MB

        // Load upload library
        $this->load->library('upload');

        $this->upload->initialize($config_foto);
        if ($this->upload->do_upload('foto_berwarna')) {
            $data_foto = $this->upload->data();
            $foto_berwarna = $data_foto['file_name'];
            echo "Foto Berwarna berhasil diupload ke " . $data_foto['full_path'];
        } else {
            echo "Gagal mengupload Foto Berwarna. Error: " . $this->upload->display_errors();
            return; // Stop execution if upload fails
        }

        $this->upload->initialize($config_kartu_pelajar);
        if ($this->upload->do_upload('kartu_pelajar')) {
            $data_kartu_pelajar = $this->upload->data();
            $kartu_pelajar = $data_kartu_pelajar['file_name'];
            echo "Kartu Pelajar berhasil diupload ke " . $data_kartu_pelajar['full_path'];
        } else {
            echo "Gagal mengupload Kartu Pelajar. Error: " . $this->upload->display_errors();
            return; // Stop execution if upload fails
        }

        $this->upload->initialize($config_raport);
        if ($this->upload->do_upload('raport')) {
            $data_raport = $this->upload->data();
            $raport = $data_raport['file_name'];
            echo "Raport berhasil diupload ke " . $data_raport['full_path'];
        } else {
            echo "Gagal mengupload Raport. Error: " . $this->upload->display_errors();
            return; // Stop execution if upload fails
        }

        $this->upload->initialize($config_surat_izin);
        if ($this->upload->do_upload('surat_izin_sekolah')) {
            $data_surat_izin = $this->upload->data();
            $surat_izin_sekolah = $data_surat_izin['file_name'];
            echo "Surat Izin berhasil diupload ke " . $data_surat_izin['full_path'];
        } else {
            echo "Gagal mengupload Surat Izin. Error: " . $this->upload->display_errors();
            return; // Stop execution if upload fails
        }

        $id_user           = $this->input->post('id_user', TRUE);
        $id_anggota_team   = $this->input->post('id_anggota_team', TRUE);
        $email             = $this->input->post('email', TRUE);
        $status_pemain     = $this->input->post('status_pemain', TRUE);
        $asal_sekolah     = $this->input->post('ask', TRUE);
        $nama_pemain     = $this->input->post('nama_pemain', TRUE);

        $data = array(
            'id_team'               => $id_user,
            'id_pemain'       => $id_anggota_team,
            'nama_pemain'       => $nama_pemain,
            'asal_sekolah'       => $asal_sekolah,
            'email'                 => $email,
            'status_pemain'         => $status_pemain,
            'foto_berwarna'         => $foto_berwarna,
            'raport'                => $raport,
            'kartu_pelajar'         => $kartu_pelajar,
            'surat_izin_sekolah'    => $surat_izin_sekolah,
        );

        $this->m->Save($data, 'tbl_anggota_team');
        redirect('data');
    }

    public function history()
    {
        $this->load->view('materials/header');
        $this->load->view('materials/navbar');
        $this->load->view('peserta/history_dash');
        $this->load->view('materials/footer');
    }

    public function history_tanggal()
    {
        $select = $this->db->select('*, 
            team_satu.nama_tim AS nama_tim_satu, 
            team_dua.nama_tim AS nama_tim_dua,
            user_satu.logo AS logo_satu, 
            user_dua.logo AS logo_dua');
        $select = $this->db->join('tbl_team AS team_satu', 'team_satu.id_team = tbl_score.id_tim_satu');
        $select = $this->db->join('tbl_team AS team_dua', 'team_dua.id_team = tbl_score.id_tim_dua');
        $select = $this->db->join('tbl_user AS user_satu', 'user_satu.id_user = team_satu.id_team');
        $select = $this->db->join('tbl_user AS user_dua', 'user_dua.id_user = team_dua.id_team');
        $data['read'] = $this->m->Get_All('tbl_score', $select);

        $this->load->view('materials/header', $data);
        $this->load->view('materials/navbar', $data);
        $this->load->view('peserta/history_tanggal', $data);
        $this->load->view('materials/footer', $data);
    }

    public function history_tgl_filter()
    {
        $select = $this->db->select('*, 
            team_satu.nama_tim AS nama_tim_satu, 
            team_dua.nama_tim AS nama_tim_dua,
            user_satu.logo AS logo_satu, 
            user_dua.logo AS logo_dua');
        $select = $this->db->join('tbl_team AS team_satu', 'team_satu.id_team = tbl_score.id_tim_satu');
        $select = $this->db->join('tbl_team AS team_dua', 'team_dua.id_team = tbl_score.id_tim_dua');
        $select = $this->db->join('tbl_user AS user_satu', 'user_satu.id_user = team_satu.id_team');
        $select = $this->db->join('tbl_user AS user_dua', 'user_dua.id_user = team_dua.id_team');
        $select = $this->db->where('tbl_score.tanggal', date('Y-m-d', strtotime($_GET['tgl'])));
        $data['read'] = $this->m->Get_All('tbl_score', $select);

        $this->load->view('materials/header', $data);
        $this->load->view('materials/navbar', $data);
        $this->load->view('peserta/history_tanggal', $data);
        $this->load->view('materials/footer', $data);
    }

    public function history_match()
    {
        $select = $this->db->select('*, 
        team_satu.nama_tim AS nama_tim_satu, 
        team_dua.nama_tim AS nama_tim_dua,
        user_satu.logo AS logo_satu, 
        user_dua.logo AS logo_dua');
        $select = $this->db->join('tbl_team AS team_satu', 'team_satu.id_team = tbl_score.id_tim_satu');
        $select = $this->db->join('tbl_team AS team_dua', 'team_dua.id_team = tbl_score.id_tim_dua');
        $select = $this->db->join('tbl_user AS user_satu', 'user_satu.id_user = team_satu.id_team');
        $select = $this->db->join('tbl_user AS user_dua', 'user_dua.id_user = team_dua.id_team');
        $select = $this->db->where('tbl_score.id_score', $_GET['id_score']);
        $data['read'] = $this->m->Get_All('tbl_score', $select);

        $select = $this->db->select('*');
        $select = $this->db->where('id_jadwal', $_GET['id_jadwal']);
        $data['match'] = $this->m->Get_All('tbl_match', $select);

        $this->load->view('materials/header', $data);
        $this->load->view('materials/navbar', $data);
        $this->load->view('peserta/history_match', $data);
        $this->load->view('materials/footer', $data);
    }

    public function history_team()
    {
        $select = $this->db->select('*');
        $select = $this->db->join('tbl_user', 'tbl_user.id_user = tbl_team.id_team');
        $select = $this->db->where('nama_tim !=','admin');
        $data['read'] = $this->m->Get_All('tbl_team', $select);

        $this->load->view('materials/header', $data);
        $this->load->view('materials/navbar', $data);
        $this->load->view('peserta/history_team', $data);
        $this->load->view('materials/footer', $data);
    }

    public function historyteam()
    {
        // Pemilihan kolom yang akan ditampilkan
        $select = $this->db->select('*, 
        team_satu.nama_tim AS nama_tim_satu, 
        team_dua.nama_tim AS nama_tim_dua,
        user_satu.logo AS logo_satu, 
        user_dua.logo AS logo_dua');

        // Penggabungan tabel menggunakan join
        $select = $this->db->join('tbl_team AS team_satu', 'team_satu.id_team = tbl_score.id_tim_satu');
        $select = $this->db->join('tbl_team AS team_dua', 'team_dua.id_team = tbl_score.id_tim_dua');
        $select = $this->db->join('tbl_user AS user_satu', 'user_satu.id_user = team_satu.id_team');
        $select = $this->db->join('tbl_user AS user_dua', 'user_dua.id_user = team_dua.id_team');

        // Kondisi WHERE yang hanya diterapkan pada satu kondisi
        $id_team = $_GET['id_team'];
        $select = $this->db->group_start();
        $select = $this->db->where('tbl_score.id_tim_satu', $id_team);
        $select = $this->db->or_where('tbl_score.id_tim_dua', $id_team);
        $select = $this->db->group_end();

        // Eksekusi query dan simpan hasilnya di $data['read']
        $data['read'] = $this->m->Get_All('tbl_score', $select);


        $this->load->view('materials/header', $data);
        $this->load->view('materials/navbar', $data);
        $this->load->view('peserta/team_history', $data);
        $this->load->view('materials/footer', $data);
    }


}
