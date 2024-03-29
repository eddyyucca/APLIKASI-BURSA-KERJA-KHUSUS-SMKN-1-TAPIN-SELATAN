<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->library('encrypt');
		// $this->load->model('jabatan_m');
		$this->load->model('lowongan_m');
		$this->load->model('jurusan_m');
		$this->load->model('alumni_m');

		$level_akun = $this->session->userdata('level');
		if ($level_akun != "mitra") {
			return redirect('auth');
		}
	}

	public function index()
	{
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = false;
		$data['judul'] = 'Dashboard';
		$data['jumlah_alumni'] = $this->alumni_m->jumlah_alumni();
		$data['jumlah_lowongan'] = $this->alumni_m->jumlah_lowongan();
		$data['data_event'] = $this->lowongan_m->get_all_event();
		// $data['jml_alumni'] = $this->pegawai_m->jumlah_pegawai();
		// $data['jml_jurusan'] = $this->pegawai_m->jumlah_jurusan();
		// $data['jml_absen'] = $this->pegawai_m->jumlah_absen();
		// $bulan1 = "1";
		// $bulan = "08";
		// $data['bulan1'] = $this->pegawai_m->jumlah_absen_bulan("01");
		// $data['bulan2'] = $this->pegawai_m->jumlah_absen_bulan("02");
		// $data['bulan3'] = $this->pegawai_m->jumlah_absen_bulan("03");
		// $data['bulan4'] = $this->pegawai_m->jumlah_absen_bulan("04");
		// $data['bulan5'] = $this->pegawai_m->jumlah_absen_bulan("05");
		// $data['bulan6'] = $this->pegawai_m->jumlah_absen_bulan("06");
		// $data['bulan7'] = $this->pegawai_m->jumlah_absen_bulan("07");
		// $data['bulan8'] = $this->pegawai_m->jumlah_absen_bulan("08");
		// $data['bulan9'] = $this->pegawai_m->jumlah_absen_bulan("09");
		// $data['bulan10'] = $this->pegawai_m->jumlah_absen_bulan("10");
		// $data['bulan11'] = $this->pegawai_m->jumlah_absen_bulan("11");
		// $data['bulan12'] = $this->pegawai_m->jumlah_absen_bulan("12");

		$this->load->view('template_mitra/header', $data);
		$this->load->view('mitra/index', $data);
		$this->load->view('template_mitra/footer', $data);
	}

	// Jurusan
	// -------------------- //
	public function jurusan()
	{
		$data['judul'] = 'Data jurusan';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->jurusan_m->get_all_jurusan();
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/jurusan/data_jurusan', $data);
		$this->load->view('template_mitra/footer');
	}
	public function tambah_jurusan()
	{
		$data['judul'] = 'Data jurusan';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/jurusan/input_jurusan', $data);
		$this->load->view('template_mitra/footer');
	}
	public function edit_jurusan($id_jurusan)
	{
		$data['judul'] = 'Data jurusan';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->jurusan_m->get_row_jurusan($id_jurusan);

		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/jurusan/edit_jurusan', $data);
		$this->load->view('template_mitra/footer');
	}
	public function edit_alumni($telpon)
	{
		$data['judul'] = 'Data jurusan';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->alumni_m->get_row_alumni($telpon);
		$data['id_alumni'] = $this->input->post('id_alumni');

		$data['jurusan'] = $this->jurusan_m->get_all_jurusan();
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/alumni/edit_alumni', $data);
		$this->load->view('template_mitra/footer');
	}
	public function kode_lowongan($id_lowongan)
	{
		$data['judul'] = 'Data jurusan';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->lowongan_m->get_row_lowongan($id_lowongan);

		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/kode', $data);
		$this->load->view('template_mitra/footer');
	}
	public function update_kode($id_lowongan)
	{
		$data = array(
			"kode" =>                $this->input->post('kode')
		);
		$this->db->where('id_lowongan', $id_lowongan);
		$this->db->update('lowongan', $data);
		return redirect('admin/data_lowongan');
	}

	public function proses_update_jurusan($id_jurusan)
	{
		$this->form_validation->set_rules('nama_jurusan', 'jurusan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['data'] = $this->jurusan_m->get_row_jurusan($id_jurusan);
			$data['judul'] = 'Data jurusan';
			$data['nama'] = $this->session->userdata('nama_mitra');
			$this->load->view('template_mitra/header', $data);
			$this->load->view('admin/jurusan/edit_jurusan', $data);
			$this->load->view('template_mitra/footer');
		} else {
			$data = array(
				'nama_jurusan' => $this->input->post('nama_jurusan')
			);
			$this->db->where('id_jurusan', $id_jurusan);
			$this->db->update('jurusan', $data);
			return redirect('admin/jurusan');
		}
	}
	public function proses_input_jurusan()
	{
		$this->form_validation->set_rules('nama_jurusan', 'jurusan', 'required');
		if ($this->form_validation->run() == FALSE) {

			$data['judul'] = 'Data jurusan';
			$data['nama'] = $this->session->userdata('nama_mitra');
			$this->load->view('template_mitra/header', $data);
			$this->load->view('admin/jurusan/input_jurusan', $data);
			$this->load->view('template_mitra/footer');
		} else {
			$data = array(
				'nama_jurusan' => $this->input->post('nama_jurusan')
			);
			$this->db->insert('jurusan', $data);
			return redirect('admin/jurusan');
		}
	}
	public function hapus_jurusan($id_jurusan)
	{
		$this->db->where('id_jurusan', $id_jurusan);
		$this->db->delete('jurusan');
		return redirect('admin/jurusan');
	}
	public function delete_alumni($telpon)
	{
		$this->db->where('telpon', $telpon);
		$this->db->delete('akun');
		$this->db->where('telpon', $telpon);
		$this->db->delete('alumni');
		return redirect('admin/jurusan');
	}
	public function hapus_lowongan($id_lowongan)
	{
		$this->db->where('id_lowongan', $id_lowongan);
		$this->db->delete('lowongan');
		return redirect('mitra/data_lowongan');
	}

	// jurusan end
	// -------------------- //


	// Pegawai
	// -------------------- //
	public function buat_lowongan_baru()
	{
		$data['judul'] = 'Data Pegawai';
		$data['nama'] = $this->session->userdata('nama_mitra');
		// $data['data'] = $this->pegawai_m->get_all_pegawai();

		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/input_lowongan', $data);
		$this->load->view('template_mitra/footer');
	}
	public function edit_lowongan($id_lowongan)
	{
		$data['judul'] = 'Data Pegawai';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->lowongan_m->get_row_lowongan($id_lowongan);

		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/edit_lowongan', $data);
		$this->load->view('template_mitra/footer');
	}

	public function proses_input_lowongan()
	{
		$this->form_validation->set_rules('nama_lowongan', 'Nama Lowongan', 'required');
		$this->form_validation->set_rules('batas_tanggal', 'Batas Tanggal');
		$this->form_validation->set_rules('isi_lowongan', 'Isi Lowongan');
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Lowongan Baru';
			$data['nama'] = $this->session->userdata('nama_mitra');
			$data['jurusan'] = $this->jurusan_m->get_all_jurusan();

			$this->load->view('template_mitra/header', $data);
			$this->load->view('admin/lowongan/input_lowongan', $data);
			$this->load->view('template_mitra/footer');
		} else {
			$config['upload_path']   = './assets/foto_loker/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['remove_space'] = TRUE;
			//$config['max_size']      = 100; 
			//$config['max_width']     = 1024; 
			//$config['max_height']    = 768;  

			$this->load->library('upload', $config);
			// script upload file 1
			$this->upload->do_upload('foto_low');
			$x = $this->upload->data();

			if ($this->input->post('jll') == true) {
				$gd = 1;
			} elseif ($this->input->post('jlp') == true) {
				$gd = 2;
			}
			$data = array(
				'nama_lowongan' => $this->input->post('nama_lowongan'),
				'mitra' => $this->session->userdata('id_mitra'),
				'batas_tanggal' => $this->input->post('batas_tanggal'),
				'isi_lowongan' => $this->input->post('isi_lowongan'),
				'pml' => $this->input->post('pml'),
				'pmp' => $this->input->post('pmp'),
				'uml' => $this->input->post('uml'),
				'ump' => $this->input->post('ump'),
				'jlp' => $this->input->post('jlp'),
				'jll' => $this->input->post('jll'),
				'date_mulai' => $this->input->post('date_mulai'),
				'gd' => $gd,
			);

			$this->db->insert('lowongan', $data);
			return redirect('mitra/data_lowongan');
		}
	}
	public function proses_update_lowongan($id_lowongan)
	{
		$this->form_validation->set_rules('nama_lowongan', 'Nama Lowongan', 'required');
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan');
		$this->form_validation->set_rules('batas_tanggal', 'Batas Tanggal');
		$this->form_validation->set_rules('isi_lowongan', 'Isi Lowongan');
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Lowongan Baru';
			$data['nama'] = $this->session->userdata('nama_mitra');
			$data['jurusan'] = $this->jurusan_m->get_all_jurusan();

			$this->load->view('template_mitra/header', $data);
			$this->load->view('admin/lowongan/input_lowongan', $data);
			$this->load->view('template_mitra/footer');
		} else {
			$config['upload_path']   = './assets/foto/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['remove_space'] = TRUE;
			//$config['max_size']      = 100; 
			//$config['max_width']     = 1024; 
			//$config['max_height']    = 768;  

			$this->load->library('upload', $config);
			// script upload file 1
			$this->upload->do_upload('foto');
			$x = $this->upload->data();

			$data = array(
				'nama_lowongan' => $this->input->post('nama_lowongan'),
				'mitra' => $this->input->post('mitra'),
				'batas_tanggal' => $this->input->post('batas_tanggal'),
				'isi_lowongan' => $this->input->post('isi_lowongan'),
				'foto' => $x["orig_name"],
			);
			$this->db->where('id_lowongan', $id_lowongan);

			$this->db->update('lowongan', $data);
			return redirect('admin/data_lowongan');
		}
	}

	public function jadikan_admin($nip)
	{
		$data = array(
			"level" => "admin"
		);
		$this->db->where('nip', $nip);
		$this->db->update('akun', $data);
		return redirect('admin/pegawai');
	}
	public function jadikan_user($nip)
	{
		$data = array(
			"level" => "user"
		);
		$this->db->where('nip', $nip);
		$this->db->update('akun', $data);
		return redirect('admin/pegawai');
	}

	public function lihat_lowongan($id_lowongan)
	{
		$data['judul'] = 'Data Lowongan';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->lowongan_m->get_row_lowongan($id_lowongan);

		$this->load->view('template_mitra/header', $data);
		$this->load->view('user/lowongan/lihat_lowongan', $data);
		$this->load->view('template_mitra/footer');
	}


	public function aktifkan_akun($telpon)
	{
		$data = array(
			'status_akun' => '1',
		);

		$this->db->where('telpon', $telpon);
		$this->db->update('alumni', $data);
		return redirect('admin/alumni');
	}

	// Pegawai end
	// -------------------- //

	// menerima pengajuan  
	// -------------------- //
	public function data_lowongan()
	{
		$data['judul'] = 'Data Lowongan';
		$id_mitra = $this->session->userdata('id_mitra');
		$data['data'] = $this->lowongan_m->get_all_lowongan_mitra($id_mitra);
		$data['nama'] = $this->session->userdata('nama_mitra');
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/data_lowongan', $data);
		$this->load->view('template_mitra/footer');
	}
	public function cetak_lowongan_aktif()
	{
		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->lowongan_m->get_all_lowongan();
		$data['nama'] = $this->session->userdata('nama_mitra');
		// $this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/cetak/baru', $data);
		// $this->load->view('template_mitra/footer');
	}
	public function cetak_lowongan_aktif_bulan()
	{
		$tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');

		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->lowongan_m->cari_tanggal($tgl1, $tgl2);
		$data['nama'] = $this->session->userdata('nama_mitra');
		// $this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/cetak/baru', $data);
		// $this->load->view('template_mitra/footer');
	}
	public function lowongan_lama()
	{
		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->lowongan_m->get_all_lowongan();
		$data['nama'] = $this->session->userdata('nama_mitra');
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/lowongan_lama', $data);
		$this->load->view('template_mitra/footer');
	}
	public function cetak_lowongan_lama()
	{

		$tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');

		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->lowongan_m->get_all_lowongan();
		$data['nama'] = $this->session->userdata('nama_mitra');
		// $this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/cetak/lama', $data);
		// $this->load->view('template_mitra/footer');
	}
	public function cetak_lowongan_lama_bulan()
	{

		$tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');

		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->lowongan_m->cari_tanggal($tgl1, $tgl2);
		$data['nama'] = $this->session->userdata('nama_mitra');
		// $this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/cetak/lama', $data);
		// $this->load->view('template_mitra/footer');
	}
	public function pengajuan_kerja()
	{
		$id_mitra = $this->session->userdata('id_mitra');
		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->alumni_m->get_pengajuan($id_mitra);
		$data['nama'] = $this->session->userdata('nama_mitra');
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/pengajuan_kerja', $data);
		$this->load->view('template_mitra/footer');
	}
	public function cek_ditolak()
	{
		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->alumni_m->ditolak();
		$data['nama'] = $this->session->userdata('nama_mitra');
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/pengajuan_kerja', $data);
		$this->load->view('template_mitra/footer');
	}
	public function cek_diterima()
	{
		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->alumni_m->diterima();
		$data['nama'] = $this->session->userdata('nama_mitra');
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/pengajuan_kerja', $data);
		$this->load->view('template_mitra/footer');
	}
	public function pelamar_ditolak()
	{
		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->alumni_m->get_pengajuan_ditolak();
		$data['nama'] = $this->session->userdata('nama_mitra');
		// $this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/cetak/ditolak', $data);
		// $this->load->view('template_mitra/footer');
	}
	public function pelamar_diterima()
	{
		$data['judul'] = 'Data Lowongan';
		$data['data'] = $this->alumni_m->get_pengajuan_diterima();
		$data['nama'] = $this->session->userdata('nama_mitra');
		// $this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/cetak/diterima', $data);
		// $this->load->view('template_mitra/footer');
	}
	public function lihat_pelamar($telpon)
	{
		$data['judul'] = 'Alumni';
		$data['nama'] = $this->session->userdata('nama_mitra');
		// $telpon =  $this->session->userdata('telpon');
		$data['data'] = $this->alumni_m->get_row_alumni($telpon);
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/lihat_pelamar', $data);
		$this->load->view('template_mitra/footer');
	}
	public function semua_pelamar_p($id_lowongan)
	{
		$data['judul'] = 'Alumni';
		$data['nama'] = $this->session->userdata('nama_mitra');
		// $telpon =  $this->session->userdata('telpon');
		$data['data'] = $this->alumni_m->get_pengajuan_p($id_lowongan);
		$data['id_lowongan'] = $id_lowongan;
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/lihat_semua_pelamar', $data);
		$this->load->view('template_mitra/footer');
	}
	public function cetak_pemohon_p($id_lowongan)
	{
		$data['judul'] = 'Alumni';
		$data['nama'] = $this->session->userdata('Data Pemohon');
		// $telpon =  $this->session->userdata('telpon');
		$data['data'] = $this->alumni_m->get_pengajuan_p($id_lowongan);
		// $this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/cetak/cetak_lihat_semua_pelamar', $data);
		// $this->load->view('template_mitra/footer');
	}

	public function alumni()
	{
		$data['judul'] = 'Data alumni';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->alumni_m->get_all_alumni();
		$data['lapor'] = false;

		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/alumni/data_alumni', $data);
		$this->load->view('template_mitra/footer');
	}
	public function cari_tahun_lulus()
	{
		$cari_tahun_lulus =  $this->input->post('tahun_lulus');

		$data['judul'] = 'Data alumni';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->alumni_m->get_all_alumni_tahun_lulus($cari_tahun_lulus);
		$data['lapor'] = false;

		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/alumni/data_alumni', $data);
		$this->load->view('template_mitra/footer');
	}
	public function cetak_alumni()
	{
		$data['judul'] = 'Data alumni';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->alumni_m->get_all_alumni();

		// $this->load->view('template_mitra/header', $data);
		$this->load->view('admin/lowongan/cetak/cetak_alumni', $data);
		// $this->load->view('template_mitra/footer');
	}


	public function tambah_alumni_baru()
	{
		$this->form_validation->set_rules('nama_mitra', 'Nama Lengkap', 'required|is_unique[alumni.email]');
		$this->form_validation->set_rules('jurusan_smk', 'Jurusan', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('pendidikan_t', 'Pendidikan terakhir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telpon', 'Telpon', 'required|is_unique[alumni.telpon]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[alumni.email]');
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Data alumni';
			$data['nama'] = $this->session->userdata('nama_mitra');
			$data['jurusan'] = $this->jurusan_m->get_all_jurusan();

			$this->load->view('template_mitra/header', $data);
			$this->load->view('admin/alumni/input_alumni', $data);
			$this->load->view('template_mitra/footer');
		} else {
			$password = "123456";
			$config['upload_path']   = './assets/foto_profil/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['remove_space'] = TRUE;
			//$config['max_size']      = 100; 
			//$config['max_width']     = 1024; 
			//$config['max_height']    = 768;  

			$this->load->library('upload', $config);
			// script upload file 1
			$this->upload->do_upload('foto');
			$x = $this->upload->data();

			$data = array(
				'nama_mitra' => $this->input->post('nama_mitra'),
				'jurusan_smk' => $this->input->post('jurusan_smk'),
				'agama' => $this->input->post('agama'),
				'pendidikan_t' => $this->input->post('pendidikan_t'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'alamat' => $this->input->post('alamat'),
				'telpon' => $this->input->post('telpon'),
				'foto_profil' => $x["orig_name"],
				'email' => $this->input->post('email'),
				'tahun_lulus' => $this->input->post('tahun_lulus'),
				'status_akun' => '1',
			);
			$akun = array(
				'telpon' => $this->input->post('telpon'),
				'password' => md5($password),
				'level' => "user",
				'status' => "aktif",
			);

			$this->db->insert('alumni', $data);
			$this->db->insert('akun', $akun);
			return redirect('admin/alumni');
		}
	}
	public function edit_alumni_baru($id_alumni)
	{
		$this->form_validation->set_rules('nama_mitra', 'Nama Lengkap', 'required|is_unique[alumni.email]');
		$this->form_validation->set_rules('jurusan_smk', 'Jurusan', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('pendidikan_t', 'Pendidikan terakhir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		// $this->form_validation->set_rules('telpon', 'Telpon', 'required|is_unique[alumni.telpon]');
		// $this->form_validation->set_rules('email', 'Email', 'required|is_unique[alumni.email]');
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Data alumni';
			$data['nama'] = $this->session->userdata('nama_mitra');
			$data['jurusan'] = $this->jurusan_m->get_all_jurusan();
			$data['lapor'] = "gagal";
			$this->load->view('template_mitra/header', $data);
			$this->load->view('admin/alumni/data_alumni', $data);
			$this->load->view('template_mitra/footer');
		} else {
			$password = "123456";
			$config['upload_path']   = './assets/foto_profil/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['remove_space'] = TRUE;
			//$config['max_size']      = 100; 
			//$config['max_width']     = 1024; 
			//$config['max_height']    = 768;  

			$this->load->library('upload', $config);
			// script upload file 1
			$this->upload->do_upload('foto');
			$x = $this->upload->data();

			$data = array(
				'nama_mitra' => $this->input->post('nama_mitra'),
				'jurusan_smk' => $this->input->post('jurusan_smk'),
				'agama' => $this->input->post('agama'),
				'pendidikan_t' => $this->input->post('pendidikan_t'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'alamat' => $this->input->post('alamat'),
				'telpon' => $this->input->post('telpon'),
				'foto_profil' => $x["orig_name"],
				'email' => $this->input->post('email'),
				'tahun_lulus' => $this->input->post('tahun_lulus'),
				'status_akun' => '1',
			);

			$this->db->where('id_alumni', $id_alumni);
			$this->db->update('alumni', $data);

			return redirect('admin/alumni');
		}
	}

	public function view_alumni($telpon)
	{
		$data['judul'] = 'Dashboard Alumni';
		$data['nama'] = $this->session->userdata('nama_mitra');
		$data['data'] = $this->alumni_m->get_row_alumni($telpon);
		$this->load->view('template_mitra/header', $data);
		$this->load->view('admin/alumni/view_alumni', $data);
		$this->load->view('template_mitra/footer', $data);
	}

	public function tolak($id_lamaran)
	{
		$data = array(
			'status_lamaran' => '2'
		);
		$this->db->where('id_lamaran', $id_lamaran);
		$this->db->update('lamaran', $data);
		redirect("admin/pengajuan_kerja");
	}

	public function terima($id_lamaran, $telpon_alumni, $nama)
	{
		$userkey = 'f70595dcb94f';
		$passkey = 'da5d1066b8f2e8343646fb16';
		$telepon = $telpon_alumni;
		$message = 'Permohonan atas nama ' . $nama . "telah memenuhi syarat";
		$url = 'https://console.zenziva.net/wareguler/api/sendWA/';
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
			'userkey' => $userkey,
			'passkey' => $passkey,
			'to' => $telepon,
			'message' => $message
		));
		$results = json_decode(curl_exec($curlHandle), true);
		curl_close($curlHandle);

		$data = array(
			'status_lamaran' => '3'
		);
		$this->db->where('id_lamaran', $id_lamaran);
		$this->db->update('lamaran', $data);
		redirect("mitra/pengajuan_kerja");
	}
}

/* End of file Admin.php */
