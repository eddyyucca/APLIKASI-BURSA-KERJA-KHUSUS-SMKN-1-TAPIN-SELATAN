<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('auth_m');
		$this->load->model('jurusan_m');
	}

	public function index()
	{
		$data['data'] = false;
		$data['pesan'] = $this->session->flashdata('pesan');
		$data['judul'] = 'Login';
		$this->load->view('auth/template_auth/header', $data);
		$this->load->view('auth/index', $data);
		$this->load->view('auth/template_auth/footer', $data);
	}
	public function login_mitra()
	{
		$data['data'] = false;
		$data['pesan'] = $this->session->flashdata('pesan');
		$data['judul'] = 'Login';
		$this->load->view('auth/template_auth/header', $data);
		$this->load->view('auth/login_mitra', $data);
		$this->load->view('auth/template_auth/footer', $data);
	}
	public function user_login()
	{
		$data['data'] = false;
		$data['pesan'] = $this->session->flashdata('pesan');
		$data['judul'] = 'Login User';
		$this->load->view('auth/template_auth/header', $data);
		$this->load->view('auth/user_login', $data);
		$this->load->view('auth/template_auth/footer', $data);
	}

	public function auth()
	{
		$this->form_validation->set_rules('telpon', 'Telpon Alumni', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['data'] = false;
			$data['judul'] = 'Login';
			$this->load->view('auth/template_auth/header', $data);
			$this->load->view('auth/index', $data);
			$this->load->view('auth/template_auth/footer');
		} else {
			$telpon = $this->input->post('telpon');
			$password =  md5($this->input->post('password'));
			$cek = $this->auth_m->login($telpon, $password);


			if ($cek == true) {
				foreach ($cek as $row);
				function hitung_umur($tanggal_lahir)
				{
					list($year, $month, $day) = explode("-", $tanggal_lahir);
					$year_diff  = date("Y") - $year;
					$month_diff = date("m") - $month;
					$day_diff   = date("d") - $day;
					if ($month_diff < 0) $year_diff--;
					elseif (($month_diff == 0) && ($day_diff < 0)) $year_diff--;
					return $year_diff;
				}

				$this->session->set_userdata('telpon', $row->telpon);
				$this->session->set_userdata('nama_alumni', $row->nama_alumni);
				$this->session->set_userdata('id_alumni', $row->id_alumni);
				$this->session->set_userdata('level', $row->level);
				$this->session->set_userdata('umur', hitung_umur($row->tgl_lahir));
				$this->session->set_userdata('jk', $row->jk);
				if ($row->level == "admin") {
					redirect('admin');
				} elseif ($row->level == "user") {
					redirect('user');
				}
			} else {
				$data['data'] = '<div class="alert alert-danger" role="alert">Password Salah !
            </div>';
				$data['judul'] = 'Login';
				$this->load->view('auth/template_auth/header', $data);
				$this->load->view('auth/index', $data);
				$this->load->view('auth/template_auth/footer');
			}
		}
	}
	public function auth_mitra()
	{
		$this->form_validation->set_rules('telpon', 'Telpon Alumni', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['data'] = false;
			$data['judul'] = 'Login';
			$this->load->view('auth/template_auth/header', $data);
			$this->load->view('auth/login_mitra', $data);
			$this->load->view('auth/template_auth/footer');
		} else {
			$telpon = $this->input->post('telpon');
			$password =  md5($this->input->post('password'));
			$cek_mitra = $this->auth_m->login_mitra($telpon, $password);
			if ($cek_mitra == true) {
				foreach ($cek_mitra as $row);
				$this->session->set_userdata('telpon', $row->telpon);
				$this->session->set_userdata('nama_mitra', $row->nama_mitra);
				$this->session->set_userdata('id_mitra', $row->id_mitra);
				$this->session->set_userdata('level', $row->level);
				if ($row->level == "mitra") {
					redirect('Mitra');
				} else {
					$data['data'] = '<div class="alert alert-danger" role="alert">Password Salah !
            </div>';
					$data['judul'] = 'Login';
					$this->load->view('auth/template_auth/header', $data);
					$this->load->view('auth/login_mitra', $data);
					$this->load->view('auth/template_auth/footer');
				}
			}
		}
	}
	public function auth_user()
	{
		$this->form_validation->set_rules('nip', 'NIP Pegawai', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['data'] = false;

			$data['judul'] = 'Login';
			$this->load->view('auth/template/header', $data);
			$this->load->view('auth/user_login', $data);
			$this->load->view('auth/template/footer');
		}

		$nip = $this->input->post('nip');
		$password =  md5($this->input->post('password'));
		$cek = $this->auth_m->login($nip, $password);
		if ($cek == true) {
			foreach ($cek as $row);
			$this->session->set_userdata('nip', $row->nip);
			$this->session->set_userdata('nama_lengkap', $row->nama_lengkap);
			$this->session->set_userdata('id_pegawai', $row->id_pegawai);
			$this->session->set_userdata('bidang', $row->bidang);
			$this->session->set_userdata('level', $row->level);
			if ($row->level == "user") {
				redirect('user');
			} elseif ($row->level == "admin") {
				$this->session->set_Flashdata('pesan', "<div class='alert alert-danger' role='alert'>Password Salah !
        </div>");
				redirect("auth/user_login");
			}
		} else {
			$data['data'] = '<div class="alert alert-danger" role="alert">Password Salah !
            </div>';
			$data['judul'] = 'Login';
			$this->load->view('auth/template_auth/header', $data);
			$this->load->view('auth/user_login', $data);
			$this->load->view('auth/template_auth/footer');
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
	// public function daftar()
	// {
	//     $data['judul'] = 'Daftar';
	//     $this->load->view('auth/template_auth/header', $data);
	//     $this->load->view('auth/daftar', $data);
	//     $this->load->view('auth/template_auth/footer');
	// }

	public function tambah_alumni_baru()
	{
		$this->form_validation->set_rules('nama_alumni', 'Nama Lengkap', 'required|is_unique[alumni.email]');
		$this->form_validation->set_rules('jurusan_smk', 'Jurusan', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('pendidikan_t', 'Pendidikan terakhir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telpon', 'Telpon', 'required|is_unique[alumni.telpon]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[alumni.email]');
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Data alumni';
			$data['nama'] = $this->session->userdata('nama_alumni');
			$data['jurusan'] = $this->jurusan_m->get_all_jurusan();

			$this->load->view('auth/template_auth/header', $data);
			$this->load->view('auth/daftar', $data);
			$this->load->view('auth/template_auth/footer');
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
				'nama_alumni' => $this->input->post('nama_alumni'),
				'jurusan_smk' => $this->input->post('jurusan_smk'),
				'agama' => $this->input->post('agama'),
				'pendidikan_t' => $this->input->post('pendidikan_t'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'telpon' => $this->input->post('telpon'),
				'foto_profil' => $x["orig_name"],
				'email' => $this->input->post('email'),
				'status_akun' => "0",
				'tahun_lulus' => $this->input->post('tahun_lulus'),
				'bbadan' => $this->input->post('bbadan'),
				'tbadan' => $this->input->post('tbadan'),
				'ciriciri' => $this->input->post('ciriciri'),
				'fb' => $this->input->post('fb'),
				'statuskerja' => $this->input->post('statuskerja'),
			);
			$akun = array(
				'telpon' => $this->input->post('telpon'),
				'password' => md5($password),
				'level' => "user",
				'status' => "off",
			);

			$this->db->insert('alumni', $data);
			$this->db->insert('akun', $akun);
			return redirect('auth');
		}
	}
	public function tambah_mitra_baru()
	{
		$this->form_validation->set_rules('telpon_mitra', 'Telpon', 'required|is_unique[alumni.telpon]');
		$this->form_validation->set_rules('email_mitra', 'Email', 'required|is_unique[alumni.email]');
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Data alumni';
			$data['nama'] = $this->session->userdata('nama_alumni');
			$data['jurusan'] = $this->jurusan_m->get_all_jurusan();

			$this->load->view('auth/template_auth/header', $data);
			$this->load->view('auth/daftar_mitra', $data);
			$this->load->view('auth/template_auth/footer');
		} else {
			$password = "123456";
			$config['upload_path']   = './assets/logo_mitra/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['remove_space'] = TRUE;
			//$config['max_size']      = 100; 
			//$config['max_width']     = 1024; 
			//$config['max_height']    = 768;  

			$this->load->library('upload', $config);
			// script upload file 1
			$this->upload->do_upload('logo_mitra');
			$x = $this->upload->data();

			$data = array(
				'nama_mitra' => $this->input->post('nama_mitra'),
				'profil_mitra' => $this->input->post('profil_mitra'),
				'telpon_mitra' => $this->input->post('telpon_mitra'),
				'email_mitra' => $this->input->post('email_mitra'),
				'logo_mitra' => $x["orig_name"],
			);
			$akun = array(
				'telpon' => $this->input->post('telpon_mitra'),
				'password' => md5($password),
				'level' => "mitra",
				'status' => "off",
			);

			$this->db->insert('mitra', $data);
			$this->db->insert('akun', $akun);
			return redirect('auth');
		}
	}
}
