<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (!$this->session->userdata('username'))
			redirect('Auth/login');
		$this->load->model('User_model');
		$this->load->model('Booking_model');
	}

	public function index()
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$this->load->library('pagination');

		$config['base_url'] = site_url('User/index');
		$config['total_rows'] = $this->db->count_all('user');
		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		$limit = $config['per_page'];
		$start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$data['i'] = $start + 1;
		$data['user'] = $this->User_model->read($limit, $start);
		$this->load->view('user/user_list', $data);
	}

	public function add()
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		if ($this->input->post('submit')) {
			$this->User_model->create();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:green" class="text-center">user Successfuly added !<p>'
				);
			} else {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:red" class="text-center">user Successfuly failed !<p>'
				);
			}
			redirect('User');
		}
		$this->load->view('user/form_user');
	}

	public function edit($id)
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		if ($this->input->post('submit')) {
			$this->User_model->editUser($id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:green" class="text-center">user Successfuly edit !<p>'
				);
			} else {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:red" class="text-center">user edit failed !<p>'
				);
			}
			redirect('User');
		}
		$data['user'] = $this->User_model->read_by($id);
		$this->load->view('user/form_user', $data);
	}

	function delete($id)
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$this->User_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:green" class="text-center">User Successfuly delete !<p>'
			);
		} else {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red" class="text-center">User failed delete !<p>'
			);
		}
		redirect('User');
	}

	public function Getuser($id)
	{
		$data['profile'] = $this->User_model->read_by($id);
		$this->load->view('user/profile', $data);
	}

	function history($id)
	{
		$data['history'] = $this->User_model->history_by($id);
		$this->load->view('user/history', $data);
	}

	function changepass()
	{
		if (!$this->session->userdata('username'))
			redirect('Auth/login');

		if ($this->input->post('submit')) {
			$oldpass = $this->User_model->read_by($this->session->userdata('userid'));
			if (password_verify($this->input->post('oldpassword'), $oldpass->password)) {
				if ($this->User_model->changePass()) {
					$this->session->set_flashdata(
						'messagech',
						'<p style="color:green" class="text-center">Password Successfuly change !<p>'
					);
					redirect('User/Getuser/' . $this->session->userdata('userid'));
				} else {
					$this->session->set_flashdata(
						'messagech',
						'<p style="color:red" class="text-center">Password failed to change !<p>'
					);
				}
			} else {
				$this->session->set_flashdata('msg', '<p style="color:red" class="text-center">invalid username or password !<p>');
			}
		}

		$this->load->view('user/changePass');
	}

	function detail_trans($id, $status, $nama_studio)
	{
		$data['price'] = $this->Booking_model->read($nama_studio);
		$data['transaksi'] = $this->User_model->detail_by_user($id, $status, $nama_studio);
		$this->load->view('user/detail_trans', $data);
	}

	function changephoto()
	{
		if (!$this->session->userdata('username'))
			redirect('Auth/login');
		$data['error'] = '';
		if ($this->input->post('submit')) {
			if ($this->upload()) {
				$this->User_model->changePhoto($this->upload->data('file_name'));
				$this->session->userdata('photo', $this->upload->data('file_name'));
				$this->session->set_flashdata(
					'messagech',
					'<p style="color:green" class="text-center">Photo Successfuly change !<p>'
				);
			} else
				$data['error'] = $this->upload->display_errors();
		}
		redirect('User/Getuser/' . $this->session->userdata('userid'));
	}


	private function upload()
	{
		$config['upload_path'] = './upload/user/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '2000';
		$config['max_height'] = '2000';

		$this->load->library('upload', $config);
		return $this->upload->do_upload('photo');
	}


	public function profile_edit()
	{
		if ($this->input->post('submit')) {
			$this->User_model->editUser($this->session->userdata('userid'));
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:green" class="text-center">Profile Successfuly edit !<p>'
				);
			} else {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:red" class="text-center">Profile edit failed !<p>'
				);
			}
			redirect('User/Getuser/' . $this->session->userdata('userid'));
		}
		$data['user'] = $this->User_model->read_by($this->session->userdata('userid'));
		$this->load->view('user/profile_edit', $data);

	}

}