<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public     function __construct()
    {
        parent::__construct();
        $this->load->model('Models', 'm');
        // $this->load->library('form_validation');
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
        $this->session->sess_destroy();

        $select = $this->db->select('*, 
        team_satu.nama_tim AS nama_tim_satu, 
        team_dua.nama_tim AS nama_tim_dua,
        user_satu.logo AS logo_satu, 
        user_dua.logo AS logo_dua');
        $select = $this->db->join('tbl_team AS team_satu', 'team_satu.id_team = tbl_jadwal.id_team_satu');
        $select = $this->db->join('tbl_team AS team_dua', 'team_dua.id_team = tbl_jadwal.id_team_dua');
        $select = $this->db->join('tbl_user AS user_satu', 'user_satu.id_user = team_satu.id_team');
        $select = $this->db->join('tbl_user AS user_dua', 'user_dua.id_user = team_dua.id_team');
        $select = $this->db->order_by('tbl_jadwal.tanggal', 'ASC');
        $data['read'] = $this->m->Get_All('tbl_jadwal', $select);

        $select = $this->db->select('*');
        $select = $this->db->where('tbl_team.nama_tim !=', 'admin');
        $data['team'] = $this->m->Get_All('tbl_team', $select);

        $select = $this->db->select('*, 
            team_satu.nama_tim AS nama_tim_satu, 
            team_dua.nama_tim AS nama_tim_dua,
            user_satu.logo AS logo_satu, 
            user_dua.logo AS logo_dua');
        $select = $this->db->join('tbl_team AS team_satu', 'team_satu.id_team = tbl_score.id_tim_satu');
        $select = $this->db->join('tbl_team AS team_dua', 'team_dua.id_team = tbl_score.id_tim_dua');
        $select = $this->db->join('tbl_user AS user_satu', 'user_satu.id_user = team_satu.id_team');
        $select = $this->db->join('tbl_user AS user_dua', 'user_dua.id_user = team_dua.id_team');
        $data['history'] = $this->m->Get_All('tbl_score', $select);

        $this->load->view('materials/header', $data);
        $this->load->view('index');
        $this->load->view('materials/footer', $data);
    }

    public function history_pertandingan()
    {
        $select = $this->db->select('*,
        team_satu.id_team AS id_tim_satu, 
        team_dua.id_team AS id_tim_dua, 
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
        $this->load->view('history_pertandingan', $data);
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
        $this->load->view('team_history', $data);
        $this->load->view('materials/footer', $data);
    }

    public function login()
    {
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        $namepass = $this->input->post('email', 'password');
        $cek              = $this->m->Masuk($username, $password, $namepass);
        if ($cek == 'usernotfound') {
            $this->session->set_flashdata('usernotfound', true);
            redirect('Auth');
        } elseif ($cek == 'passnotfound') {
            $this->session->set_flashdata('passnotfound', true);
            redirect('Auth');
        } else {
            foreach ($cek as $d) {
                $id_user = $d->id_user;
                $email = $d->email;
                $name = $d->nama_team;
                $asal_sekolah = $d->asal_sekolah;
                $warna = $d->warna;
                $logo = $d->logo;
                $akses = $d->access;
                $status_login = TRUE;
            }
            $data = array(
                'id_user' => $id_user,
                'email' => $email,
                'nama_team' => $name,
                'asal_sekolah' => $asal_sekolah,
                'warna' => $warna,
                'logo' => $logo,
                'access' => $akses,
                'status_login' => $status_login,
            );
            $this->session->set_userdata($data);
            if ($akses == 'admin') {
                redirect('beranda');
            } elseif ($akses == 'peserta') {
                redirect('dashboard');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('status_login');
        $this->session->set_flashdata('logout', TRUE);
        redirect('Auth');
    }

    public function resetpass()
    {
        $table = 'tbl_user';
        $where = array(
            'username'        =>    $this->input->post('username')
        );
        $data = array(
            'password'        =>  $this->input->post('password')
        );

        $this->m->Update($where, $data, $table);

        $this->session->set_flashdata('pesan2', 'Password berhasil diubah!!');
        redirect('Auth');
    }

    public function register()
    {
        $this->load->view('materials/header');
        $this->load->view('materials/sidebar');
        $this->load->view('log/regist');
        $this->load->view('materials/footer');
    }

    public function act_regis()
    {
        // UPLOAD FILENYA
        $config['upload_path']          = './data_diri/logo/';
        $config['allowed_types']        = 'png';
        $config['max_size']             = 100000; //set max size allowed in Kilobyte

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')) //upload and validate
        {
            $error = $this->upload->display_errors();
            echo "Harus PNG: " . $error;
        } else {
            $file                  = $this->upload->data();
            $file                  = $file['file_name'];
            $id_user               = $this->input->post('id_user', true);
            $nama_team             = $this->input->post('nama_team', true);
            $asal_sekolah          = $this->input->post('asal_sekolah', true);
            $email                 = $this->input->post('email', true);
            $password              = $this->input->post('password', true);
            $warna              = $this->input->post('favcolor', true);
            $access                = $this->input->post('access', true);

            $data = array(
                'id_user' => $id_user,
                'nama_team'          => $nama_team,
                'asal_sekolah'      => $asal_sekolah,
                'email'         => $email,
                'password'         => $password,
                'warna'         => $warna,
                'logo'         => $file,
                'access'         => 'peserta',
            );

            $this->m->Save($data, 'tbl_user');
            // $data = array(
            //     'id_user' => $this->input->post('id_user'),
            //     'nama_team' => $this->input->post('nama_team'),
            //     'asal_sekolah' => $this->input->post('asal_sekolah'),
            //     'email' => $this->input->post('email'),
            //     'password' => $this->input->post('password'),
            //     'access' => 'peserta',
            // );

            $dataa = array(
                'id_team' => $this->input->post('id_user'),
                'nama_tim' => $this->input->post('nama_team'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
            );

            // $this->m->Save($data, 'tbl_user');
            $this->m->Save($dataa, 'tbl_team');
            redirect('Auth');
        }
    }
}
