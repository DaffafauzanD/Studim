<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (!$this->session->userdata('username'))
			redirect('Auth/login');
		$this->load->model('Booking_model');
		$this->load->model('Studio_model');
	}

	public function index()
	{
		$data['studio'] = $this->Booking_model->readStudio();
		$this->load->view('front/studio_booking', $data);
	}


	public function jadwal_book()
	{
		$data['studio'] = $this->Booking_model->read_stud();
		$this->load->view('front/jadwal_booking', $data);
	}

	public function add($id, $nama_studio, $harga)
	{
		if ($this->input->post('submit')) {
			$this->Booking_model->create($id, $nama_studio, $harga);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:green" class="text-center">booking Successfuly added !<p>'
				);
			} else {
				$this->session->set_flashdata(
					'msg',
					'<p style="color:red" class="text-center">booking Successfuly failed !<p>'
				);
			}
			redirect('booking');
		}
		$data['studio'] = $this->Booking_model->read_by($nama_studio);
		$this->load->view('front/form_booking', $data);

	}
}