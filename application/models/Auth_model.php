<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function getuser($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('user')->row();
	}

	public function changepass()
	{
		$this->db->set('password', password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT));
		$this->db->where('username', $this->session->userdata('username'));
		return $this->db->update('user');
	}

	public function create()
	{
		$data = [
			'name' => $this->input->post('name'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'gender' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat')
		];
		$this->db->insert('user', $data);
	}

	public function changephoto($foto)
	{
		if ($this->session->userdata('foto') !== 'default.png')
			unlink('./upload/user/' . $this->session->userdata('foto'));

		$this->db->set('foto', $foto);
		$this->db->where('username', $this->session->userdata('username'));
		return $this->db->update('user');
	}

	public function Email_Verify($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('user')->row();
	}

	public function forgotPassword($email)
	{
		$this->db->set('password', password_hash($this->input->post('forgotpass'), PASSWORD_DEFAULT));
		$this->db->where('email', $email);
		return $this->db->update('user');

	}

}