<?php

use PhpParser\Node\Expr\PostDec;

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function create()
	{
		$data = [
			'name' => $this->input->post('name'),
			'password' => password_hash($this->input->post('user_type'), PASSWORD_DEFAULT),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			'user_type' => $this->input->post('user_type'),
			'username' => $this->input->post('username'),
			'gender' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat')
		];
		$this->db->insert('user', $data);
	}
	public function read($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get('user');
		return $query->result();
	}

	public function editUser($id)
	{

		if ($this->session->userdata('usertype') == 'Admin') {
			$usertype = $this->input->post('user_type');
		} else {
			$usertype = $this->session->userdata('usertype');
		}
		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			'user_type' => $usertype,
			'username' => $this->input->post('username'),
			'gender' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat')
		];
		$this->db->where('user_id', $id);
		$this->db->update('user', $data);
	}

	function delete($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('user');
	}

	public function history_by($id)
	{

		$this->db->where('id_user', $id);
		$query1 = $this->db->get_compiled_select('waiting_room');


		$this->db->where('id_user', $id);
		$query2 = $this->db->get_compiled_select('transaksi');

		$query = $this->db->query("select * from ($query1 UNION $query2) as unionTable");

		return $query->result();

	}

	public function detail_by($id, $status, $nama_studio)
	{
		$this->db->where('id_trans', $id);
		$this->db->where('nama_studio', $nama_studio);
		$this->db->where('status', $status);
		$query = $this->db->get('transaksi');
		return $query->row();
	}
	public function detail_by_user($id, $status, $nama_studio)
	{
		$this->db->where('id_user', $id);
		$this->db->where('nama_studio', $nama_studio);
		$this->db->where('status', $status);
		if ($status == 0) {
			$query = $this->db->get('waiting_room');
		} else {
			$query = $this->db->get('transaksi');
		}
		return $query->row();
	}

	public function read_by($id)
	{
		$this->db->where('user_id', $id);
		$query = $this->db->get('user');
		return $query->row();
	}
	function changePhoto($photo)
	{
		$previousPhoto = $this->getPhotoById($this->session->userdata('userid'));

		if ($photo !== null) {
			$this->db->where('user_id', $this->session->userdata('userid'));
			$this->db->set('foto', $photo);
			$this->db->update('user');
		}

		if ($previousPhoto !== $photo) {
			$this->deletePhoto($previousPhoto);
		}

	}

	private function getPhotoById($id)
	{
		$query = $this->db->select('foto')
			->from('user')
			->where('user_id', $id)
			->get();

		if ($query->num_rows() > 0) {
			return $query->row()->foto;
		}

		return null;
	}

	private function deletePhoto($photo)
	{
		$filePath = './upload/user/' . $photo;

		if (file_exists($filePath)) {
			unlink($filePath);
		}
	}

	function changePass()
	{
		$this->db->set('password', password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT));
		$this->db->where('user_id', $this->session->userdata('userid'));
		return $this->db->update('user');
	}


}