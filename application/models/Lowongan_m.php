<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lowongan_m extends CI_Model
{

	public function get_all_lowongan()
	{
		$date = ('Y-m-d');
		$date2 = '2022-02-01';
		$this->db->select('*');
		$this->db->from('lowongan');
		$this->db->join('mitra', 'mitra.id_mitra = lowongan.mitra');
		// $this->db->where('batas_tanggal >=', $date);
		// $this->db->where('batas_tanggal <=', $date2);

		$this->db->order_by('id_lowongan', 'DESC');
		return  $this->db->get()->result();
	}
	public function get_all_lowongan_mitra($id_mitra)
	{

		$this->db->where('id_mitra', $id_mitra);

		$date = ('2022-12-01');
		$date2 = '2022-02-01';
		$this->db->select('*');
		$this->db->from('lowongan');
		$this->db->where('batas_tanggal >=', $date2);
		$this->db->where('batas_tanggal <=', $date);
		$this->db->join('mitra', 'mitra.id_mitra = lowongan.mitra');
		// $this->db->join('lowongan', 'lowongan.id_lowongan = lamaran.id_lowongan');
		$this->db->order_by('id_lowongan', 'DESC');
		return  $this->db->get()->result();
	}

	public function cari_tanggal($tgl1, $tgl2)
	{
		$this->db->where('batas_tanggal >=', $tgl1);
		$this->db->where('batas_tanggal <=', $tgl2);
		return $this->db->get('lowongan')->result();
	}
	public function get_row_lowongan($id_lowongan)
	{
		$this->db->where('id_lowongan', $id_lowongan);
		$this->db->from('lowongan');
		$this->db->join('mitra', 'mitra.id_mitra = lowongan.mitra');
		// $this->db->where('batas_tanggal >=', $date);
		// $this->db->where('batas_tanggal <=', $date2);

		$this->db->order_by('id_lowongan', 'DESC');
		// return  $this->db->get()->result();
		return  $this->db->get()->row();
	}
}/* End of file Lowongan_m.php */
