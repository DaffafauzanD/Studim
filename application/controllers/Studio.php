<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Studio extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (!$this->session->userdata('username'))
			redirect('Auth/login');
		$this->load->model('Studio_model');
		$this->load->model('Booking_model');
	}

	public function index()
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$this->load->library('pagination');

		$config['base_url'] = site_url('Studio/index');
		$config['total_rows'] = $this->db->count_all('studio');
		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		$limit = $config['per_page'];
		$start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$data['i'] = $start + 1;
		$data['studio'] = $this->Studio_model->read($limit, $start);
		$this->load->view('front/studio_list', $data);
	}

	public function add()
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		if ($this->input->post('submit')) {
			$this->Studio_model->create();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:green" class="text-center">Studio Successfuly added !<p>'
				);
			} else {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:red" class="text-center">Studio failed added !<p>'
				);
			}
			redirect('Studio');
		}
		$this->load->view('front/form_studio');
	}

	public function deleteStudio($id)
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$this->Studio_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:green" class="text-center">Studio Successfuly delete !<p>'
			);
		} else {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red" class="text-center">Studio failed delete !<p>'
			);
		}
		redirect('Studio');

	}

	public function edit($id)
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');

		if ($this->input->post('submit')) {
			$photo = $this->upload_photo();
			if ($photo !== false) {
				$this->Studio_model->update($id, $photo);
			} else {
				$this->Studio_model->update($id);

			}
			if ($this->db->affected_rows() < 0) {

			} else {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:green" class="text-center">Studio successfully updated!</p>'

				);
			}
			redirect('Studio');

		}
		$data['studio'] = $this->Studio_model->read_byId($id);
		$this->load->view('front/form_studio', $data);
	}

	public function studio_info($nama_studio)
	{
		$data['studio'] = $this->Studio_model->read_by($nama_studio);
		$data['sch'] = $this->Booking_model->read_stud();
		$this->load->view('front/studio_info', $data);
	}


	private function upload_photo()
	{
		if (!empty($_FILES['foto_studio']['name'])) {
			$config['upload_path'] = './upload/studio/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto_studio')) {

				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error', '<p style="color:red">' . $error . '</p>');
				$this->session->set_flashdata(
					'msg',
					'<p style="color:red" class="text-center">Studio failed to update!</p>'
				);
				return false;
			}
			return $this->upload->data('file_name');
		}
		return null;
	}

}