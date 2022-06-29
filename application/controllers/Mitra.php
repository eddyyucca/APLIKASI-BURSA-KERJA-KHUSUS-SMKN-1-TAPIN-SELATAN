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
		$data['nama'] = $this->session->userdata('nama_alumni');
		$data['data'] = false;
		$data['judul'] = 'Dashboard';
		$data['jumlah_alumni'] = $this->alumni_m->jumlah_alumni();
		$data['jumlah_lowongan'] = $this->alumni_m->jumlah_lowongan();
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

		$this->load->view('template/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer', $data);
	}
}

/* End of file Admin.php */
