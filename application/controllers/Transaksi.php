<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username'))
			redirect('Auth/login');
		$this->load->model('Transaksi_model');
		$this->load->model('Booking_model');
		$this->load->model('User_model');

	}

	public function index()
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$data['trans'] = $this->Transaksi_model->read();
		$this->load->view('trans/trans_list', $data);
	}

	public function report()
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$this->load->library('pagination');

		$config['base_url'] = site_url('Transaksi/report');
		$config['total_rows'] = $this->db->count_all('transaksi');
		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		$limit = $config['per_page'];
		$start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$data['i'] = $start + 1;
		$data['report'] = $this->Transaksi_model->report_data($limit, $start);
		$data['count'] = $this->Transaksi_model->calculate_data();
		$data['total_sales'] = $this->Transaksi_model->calculate_sales();
		// $data['calculateAvg'] = $this->Transaksi_model->calculateAverageDuration();
		$this->load->view('trans/report', $data);
	}

	function setlunas($id)
	{
		$this->Transaksi_model->set_lunas($id);
		redirect('Transaksi');
	}

	function detail($id, $status, $nama_studio)
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$data['price'] = $this->Booking_model->read($nama_studio);
		$data['transaksi'] = $this->User_model->detail_by($id, $status, $nama_studio);
		$this->load->view('trans/detail', $data);
	}

	function schedule()
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$this->load->library('pagination');

		$config['base_url'] = site_url('Transaksi/schedule');
		$config['total_rows'] = $this->db->count_all('schedule');
		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		$limit = $config['per_page'];
		$start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$searchQuery = $this->input->post('search_query');

		if (!empty($searchQuery)) {
			$data['i'] = 1;
			$data['schedule'] = $this->Transaksi_model->search_schedule($searchQuery, $limit, $start);
		} else {
			$data['i'] = $start + 1;
			$data['schedule'] = $this->Transaksi_model->read_schedule($limit, $start);
		}
		$data['searchQuery'] = $searchQuery;
		$this->load->view('trans/schedule', $data);
	}



	function detail_Trans($id_wait)
	{
		$data['wait'] = $this->Transaksi_model->wait_detail($id_wait);
		$this->load->view('trans/detail_wait', $data);
	}

	function delete_sch($id)
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$this->Transaksi_model->delete_by($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:green" class="text-center">schedule Successfuly delete !<p>'
			);
		} else {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red" class="text-center">schedule delete failed !<p>'
			);
		}
		redirect('Transaksi/schedule');
	}

	function upload_trans($id_user, $id_wait)
	{
		if (!$this->session->userdata('username'))
			redirect('Auth/login');
		$data['error'] = '';
		if ($this->input->post('upload')) {
			if ($this->upload()) {
				$this->Transaksi_model->upload_bukti($this->upload->data('file_name'), $id_user, $id_wait);
				$this->session->set_flashdata('msg', '<p style="color:green"> bukti berhasil dikirim ! </p>');
			} else
				$data['error'] = $this->upload->display_errors();
		}
		$this->load->view('trans/upload_bukti', $data);
	}

	function trans_detail($id_wait, $id_user)
	{
		if ($this->session->userdata('usertype') == 'Member')
			redirect('Welcome');
		$data['detail'] = $this->Transaksi_model->trans_detail($id_wait);
		$data['bukti'] = $this->Transaksi_model->get_bukti_trans($id_user, $id_wait);
		$this->load->view('trans/trans_detail', $data);

	}

	function delete_wait($id_wait)
	{
		$this->Transaksi_model->delete($id_wait);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:green" class="text-center">Transaksi Successfuly delete !<p>'
			);
		} else {
			$this->session->set_flashdata(
				'msg',
				'<p style="color:red" class="text-center">Transaksi failed delete !<p>'
			);
		}
		redirect('Transaksi');


	}

	private function upload()
	{
		$config['upload_path'] = './upload/trans/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '2000';
		$config['max_width'] = '2000';
		$config['max_height'] = '2000';

		$this->load->library('upload', $config);
		return $this->upload->do_upload('photo');

	}


}