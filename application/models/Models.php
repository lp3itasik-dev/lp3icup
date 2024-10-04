<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Models extends CI_Model
{

	public function Get_All($table, $select)
	{
		$select;
		$query = $this->db->get($table);
		return $query->result();
	}
	public function	 view($table)
	{
		return	$this->db->get($table);
	}

	function Save($data, $table)
	{
		$result = $this->db->insert($table, $data);
		return $result;
	}
	public function Get_Where($where, $table)
	{
		$query = $this->db->get_where($table, $where);
		return $query->result();
	}
	function Get_Page($limit, $start, $table)
	{
		$query = $this->db->get($table, $limit, $start);
		return $query;
	}
	function Update($where, $data, $table)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}

	function update_multiple()
	{
		$updates = $this->input->post('nim');

		foreach ($updates as $update) {
			$data = array(
				'id_kelas' => $this->input->post('kelas'),
			);
			$this->db->where('nim', $update);
			$this->db->update('tbl_peserta_didik', $data);
		}
	}

	function update_multiple_kehadiran_det()
	{
		$updates = $this->input->post('nim');

		foreach ($updates as $update) {
			$data = array(
				'keterangan' => $this->input->post('keterangan'),
			);
			$this->db->where('nim', $update);
			$this->db->update('tbl_det_kehadiran', $data);
		}
	}

	function update_multiple_nilai()
	{
		$updates = $this->input->post('id_nilai');

		foreach ($updates as $update) {
			$data = array(
				'formatif' => $this->input->post('formatif'),
				'tugas' => $this->input->post('tugas'),
				'uts' => $this->input->post('uts'),
				'uas' => $this->input->post('uas'),
			);
			$this->db->where('id_nilai', $update);
			$this->db->update('tbl_nilai', $data);
		}
	}

	// public function update_multiple_nilai($data)
	// {
	// $data adalah array asosiatif berisi data yang akan diperbarui
	// $data harus memiliki kolom yang berfungsi sebagai kunci utama (primary key)
	// Kolom yang akan diperbarui juga harus ada dalam array $data

	// Memperbarui multiple rows menggunakan update_batch()
	// 'users' adalah nama tabel yang akan diperbarui
	// 	$this->db->update_batch('tbl_nilai', $data, 'id_jadwal_kbm');
	// }

	function update_multiple_kehadiran()
	{
		$updates = $this->input->post('id_presensi');
		$updatess = $this->input->post('nim');

		foreach ($updates as $update) {
			$data = array(
				'keterangan' => $this->input->post('keterangan'),
			);
			$this->db->where('id_presensi', $update);
			$this->db->where('nim', $updatess);
			$this->db->update('tbl_detail_presensi', $data);
		}
	}

	function update_multiple_user()
	{
		$updates = $this->input->post('nim');

		foreach ($updates as $update) {
			$data = array(
				'id_kelas' => $this->input->post('kelas'),
			);
			$this->db->where('username', $update);
			$this->db->update('tbl_user', $data);
		}
	}

	public function insert_multiple_det_matkul($data)
	{
		// Menyisipkan multiple data ke dalam tabel
		$this->db->insert_batch('tbl_det_kurikulum', $data);
	}

	public function insert_multiple_data($data)
	{
		// Menyisipkan multiple data ke dalam tabel
		$this->db->insert_batch('tbl_detail_presensi', $data);
	}

	public function SaveBatch($data)
	{
		// Menyisipkan multiple data ke dalam tabel
		$this->db->insert_batch('tbl_khs', $data);
	}

	public function c($data)
	{
		// Menyisipkan multiple data kehadiran ke dalam tabel
		$this->db->insert_batch('tbl_detail_presensi', $data);
	}

	public function insert_multiple_nilai($data)
	{
		// Menyisipkan multiple data kehadiran ke dalam tabel
		$this->db->insert_batch('tbl_nilai', $data);
	}

	public function insert_multiple_nilai_mhs($data)
	{
		// Menyisipkan multiple data kehadiran ke dalam tabel
		$this->db->insert_batch('tbl_detail_nilai', $data);
	}

	public function insert_multiple_nilai_mhss($data)
	{
		// Menyisipkan multiple data kehadiran ke dalam tabel
		$this->db->insert_batch('tbl_nilai_mhs', $data);
	}

	function update_multiple_akses()
	{
		$updates = $this->input->post('nim');

		foreach ($updates as $update) {
			$data = array(
				'akses_ujian' => $this->input->post('akses'),
			);
			$this->db->where('nim', $update);
			$this->db->update('tbl_peserta_didik', $data);
		}
	}

	function update_multiple_akses_ujian()
	{
		$updates = $this->input->post('nim');

		foreach ($updates as $update) {
			$data = array(
				'akses_ujian' => $this->input->post('akses'),
			);
			$this->db->where('nim', $update);
			$this->db->update('tbl_mhs', $data);
		}
	}

	function update_jenjang()
	{
		$updates = $this->input->post('nim');

		foreach ($updates as $update) {
			$data = array(
				'tingkat' => $this->input->post('tingkat'),
			);
			$this->db->where('nim', $update);
			$this->db->update('tbl_peserta_didik', $data);
		}
	}

	public function up($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}

	function Update_All($data, $table)
	{
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	function Delete($where, $table)
	{
		$result = $this->db->delete($table, $where);
		return $result;
	}
	function Delete_All($table)
	{
		$result = $this->db->delete($table);
		return $result;
	}
	public function get($username)
	{
		$this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
		$result = $this->db->get('user')->row(); // Untuk mengeksekusi dan mengambil data hasil query
		return $result;
	}
	public function downloadfile($id)
	{
		$this->db->where('id_formulir', $id); // Untuk menambahkan Where Clause : username='$username'
		$result = $this->db->get('file')->row(); // Untuk mengeksekusi dan mengambil data hasil query
		return $result;
	}
	function hariini()
	{
		$tgl = date('Y-m-d');
		$this->db->like('tgl_pengajuan', $tgl);
		return $this->db->get('pengajuan')->result_array();
	}

	public function ambil_id_soal($id)
	{
		$this->db->from('tbl_soal_temporary');
		$this->db->where('id_soal_temporary', $id);
		$result = $this->db->get('');
		// periksa apakah datanya ada
		if ($result->num_rows() > 0) {
			return $result->row(); //ambil data berdasarkan row id
		}
	}

	public function ambil_id_materi($id)
	{
		$this->db->from('tbl_materi');
		$this->db->where('id_materi', $id);
		$result = $this->db->get('');
		// periksa apakah datanya ada
		if ($result->num_rows() > 0) {
			return $result->row(); //ambil data berdasarkan row id
		}
	}

	public function ambil_id_tugas($id)
	{
		$this->db->from('tbl_tugas');
		$this->db->where('id_tugas', $id);
		$result = $this->db->get('');
		// periksa apakah datanya ada
		if ($result->num_rows() > 0) {
			return $result->row(); //ambil data berdasarkan row id
		}
	}

	public function delete_soal($id)
	{
		$this->db->where('id_soal_temporary', $id);
		$this->db->delete('tbl_soal_temporary');
		return TRUE;
	}

	public function delete_materi($id)
	{
		$this->db->where('id_materi', $id);
		$this->db->delete('tbl_materi');
		return TRUE;
	}

	public function delete_tugas($id)
	{
		$this->db->where('id_tugas', $id);
		$this->db->delete('tbl_tugas');
		return TRUE;
	}

	public function Masuk($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('email', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		$cekuser = $this->db->select('*')->from('tbl_user')->where('email', $username)->get();
		$cekpass = $this->db->select('*')->from('tbl_user')->where('password', $password)->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} elseif ($cekuser->num_rows() == null) {
			return 'usernotfound';
		} elseif ($cekpass->num_rows() == null) {
			return 'passnotfound';
		} else {
			return false;
		}
	}

	public function LoginOrtu($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_ortu');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		$cekuser = $this->db->select('*')->from('tbl_ortu')->where('username', $username)->get();
		$cekpass = $this->db->select('*')->from('tbl_ortu')->where('password', $password)->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} elseif ($cekuser->num_rows() == null) {
			return 'usernotfound';
		} elseif ($cekpass->num_rows() == null) {
			return 'passnotfound';
		} else {
			return false;
		}
	}

	public function download_uts($id)
	{
		$query = $this->db->get_where('tbl_uts', array('id_uts' => $id));
		return $query->row_array();
	}

	public function download_uas($id)
	{
		$query = $this->db->get_where('tbl_uas', array('id_uas' => $id));
		return $query->row_array();
	}

	public function download_uts_susulan($id)
	{
		$query = $this->db->get_where('tbl_uts_susulan', array('id_uts_susulan' => $id));
		return $query->row_array();
	}

	public function download_uas_susulan($id)
	{
		$query = $this->db->get_where('tbl_uas_susulan', array('id_uas_susulan' => $id));
		return $query->row_array();
	}

	public function download_history_uts($id)
	{
		$query = $this->db->get_where('tbl_jawaban_soal', array('id_jawaban' => $id));
		return $query->row_array();
	}

	public function download_materi($id)
	{
		$query = $this->db->get_where('tbl_kehadiran', array('id_kehadiran' => $id));
		return $query->row_array();
	}

	public function download_jawaban($id, $nim)
	{
		$query = $this->db->get_where('tbl_det_tugas', array('id_tugas' => $id, 'nim' => $nim));
		return $query->row_array();
	}

	public function download_jawabanuts($id, $nim)
	{
		$query = $this->db->get_where('tbl_jawaban_ujian', array('id_uts' => $id, 'nim' => $nim));
		return $query->row_array();
	}

	public function download_jawabanuts_susulan($id, $nim)
	{
		$query = $this->db->get_where('tbl_jawaban_ujian_susulan', array('id_uts_susulan' => $id, 'nim' => $nim));
		return $query->row_array();
	}

	public function download_jawabanuas_susulan($id, $nim)
	{
		$query = $this->db->get_where('tbl_jawaban_ujian_susulan', array('id_uas_susulan' => $id, 'nim' => $nim));
		return $query->row_array();
	}

	public function download_jawabanuas($id, $nim)
	{
		$query = $this->db->get_where('tbl_jawaban_ujian', array('id_uas' => $id, 'nim' => $nim));
		return $query->row_array();
	}

	public function get_file_info($id_tugas, $nim)
	{
		$this->db->select('file_jawaban');
		$this->db->from('tabel_file'); // Ganti dengan nama tabel Anda
		$this->db->where('id_tugas', $id_tugas);
		$this->db->where('nim', $nim);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function download_tugas($id)
	{
		$query = $this->db->get_where('tbl_tugas', array('id_tugas' => $id));
		return $query->row_array();
	}

	function download_jawaban_tgs($id)
	{
		$query = $this->db->get_where('tbl_det_tugas', array('id_tugas' => $id));
		return $query->result_array();
	}

	function download_jawaban_uts($id)
	{
		$query = $this->db->get_where('tbl_jawaban_ujian', array('id_uts' => $id));
		return $query->result_array();
	}

	function download_jawaban_uts_susulan($id)
	{
		$query = $this->db->get_where('tbl_jawaban_ujian_susulan', array('id_uts_susulan' => $id));
		return $query->result_array();
	}

	function download_jawaban_uas($id)
	{
		$query = $this->db->get_where('tbl_jawaban_ujian', array('id_uas' => $id));
		return $query->result_array();
	}

	function download_jawaban_uas_susulan($id)
	{
		$query = $this->db->get_where('tbl_jawaban_ujian_susulan', array('id_uas_susulan' => $id));
		return $query->result_array();
	}

	public function download_jawaban_tugas($id)
	{
		$query = $this->db->get_where('tbl_jawaban_tugas', array('id_jawaban_tugas' => $id));
		return $query->row_array();
	}

	public function update_status($id_kehadiran, $status)
	{
		// Lakukan perubahan status di database
		// Misalnya, jika Anda memiliki tabel "absensi" dengan kolom "id_kehadiran" dan "status_absen":
		$data = array(
			'status_absen' => $status
		);
		$this->db->where('id_kehadiran', $id_kehadiran);
		$this->db->update('tbl_kehadiran', $data);
	}


	public function CreateCode()
	{
		$this->db->select('RIGHT(tbl_user.id_user,3) as id_user', FALSE);
		$this->db->order_by('id_user', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_user');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->id_user) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "VT" . $batas;
		return $kodetampil;
	}

    public function CreateCodeT()
	{
		$this->db->select('RIGHT(tbl_team.id_team,3) as id_team', FALSE);
		$this->db->order_by('id_team', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_team');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->id_team) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "VT" . $batas;
		return $kodetampil;
	}

	public function CreateCodekhs()
	{
		$this->db->select('*', FALSE);
		$this->db->order_by('no', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_khs');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->no) + 1;
		} else {
			$kode = 1;
		}
		// $batas = $kode;
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = $batas;
		return $kodetampil;
	}

	public function getSelectedItem($selectedItems)
	{
		// Lakukan query untuk mengambil data berdasarkan item yang dipilih
		$this->db->select('*');
		$this->db->from('tbl_peserta_didik');
		$this->db->where_in('nim', $selectedItems);
		$query = $this->db->get();

		return $query->result();
	}

	public function CreateModelPresenter()
	{
		$this->db->select('RIGHT(tbl_presenter.kode_presenter,5) as kode_presenter', FALSE);
		$this->db->order_by('kode_presenter', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_presenter');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode_presenter) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "PR" . $batas;
		return $kodetampil;
	}

	public function CreateIdDosen()
	{
		$this->db->select('*', FALSE);
		$this->db->order_by('id_dosen', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_dosen');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->tbl_dosen) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "DSN" . $batas;
		return $kodetampil;
	}

	public function CreateIdJadwal()
	{
		$this->db->select('*', FALSE);
		$this->db->order_by('id_jadwal_kbm', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_jadwal_kbm');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->tbl_dosen) + 1;
		} else {
			$kode = 1;
		}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "DSN" . $batas;
		return $kodetampil;
	}

	public function insert_multiple_kehadiran($data)
	{
		// Menyisipkan multiple data kehadiran ke dalam tabel
		$this->db->insert_batch('tbl_det_kehadiran', $data);
	}
}
