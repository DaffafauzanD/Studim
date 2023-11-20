<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{
	public function create($id, $nama_studio, $harga)
	{
		$durasi = $this->input->post('durasi');
		$total = $durasi * $harga;
		$data = [
			'nama_studio' => $nama_studio,
			'id_user' => $id,
			'tgl_booking' => $this->input->post('tgl_booking'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'durasi' => $this->input->post('durasi'),
			'harga_booking' => $total
		];


		$this->db->insert('waiting_room', $data);



	}

	public function readStudio()
	{
		$query = $this->db->get('studio');
		return $query->result();
	}

	public function read_by($nama_studio)
	{
		$this->db->where('nama_studio', $nama_studio);
		$query = $this->db->get('studio');
		return $query->row();
	}

	function read($nama_studio)
	{
		$this->db->where('nama_studio', $nama_studio);
		$query = $this->db->get('studio');
		return $query->result();
	}


	public function read_stud()
	{
		$query = $this->db->get('schedule');
		return $query->result();
	}


}