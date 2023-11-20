<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Auth_model');

	}
	public function login()
	{
		if ($this->input->post('login') && $this->Validation('login')) {
			$login = $this->Auth_model->getuser($this->input->post('username'));
			if ($login != NULL) {
				if (password_verify($this->input->post('password'), $login->password)) {
					$data = array(
						'userid' => $login->user_id,
						'username' => $login->username,
						'usertype' => $login->user_type,
						'fullname' => $login->username,
						'photo' => $login->foto
					);
					$this->session->set_userdata($data);
					redirect('Welcome');
				}

			}
			$this->session->set_flashdata('msg', '<p style="color:red" class="text-center">invalid username or password !<p>');
		}

		$this->load->view('auth/form_login');
	}

	public function register()
	{
		if ($this->input->post('submit')) {
			$this->Auth_model->create();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:green" class="text-center">register complete !<p>'
				);
			} else {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:red" class="text-center">register failed !<p>'
				);
			}
			redirect('Auth/login');
		}
		$this->load->view('auth/form_register');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth/login');
	}

	public function Validation($type)
	{
		$this->load->library('form_validation');

		if ($type == 'login') {
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
		} else {
			$this->form_validation->set_rules('oldpassword', 'Old username', 'trim|required');
			$this->form_validation->set_rules('newpassword', 'New password', 'trim|required');
		}


		if ($this->form_validation->run())
			return TRUE;
		else
			return FALSE;

	}

	public function forgotPass()
	{
		if ($this->input->post('forgot')) {
			$emailU = $this->Auth_model->Email_Verify($this->input->post('email'));
			if ($this->input->post('email') == $emailU->email) {
				if ($this->Auth_model->forgotPassword($this->input->post('email'))) {
					$this->session->set_flashdata(
						'messagech',
						'<p style="color:green" class="text-center">Password Successfuly change !<p>'
					);
				} else {
					$this->session->set_flashdata(
						'messagech',
						'<p style="color:red" class="text-center">Password failed to change !<p>'
					);
				}
				$this->session->set_flashdata('error', '<p style="color:green" class="text-center">Successfully !<p>');
			}
			$this->session->set_flashdata('error', '<p style="color:red" class="text-center">invalid username or password !<p>');

			redirect('Auth/login');
		}


	}




}