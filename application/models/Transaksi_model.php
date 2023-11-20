<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{


	public function set_lunas($id)
	{
		$existingData = $this->db->where('id_trans', $id)
			->get('transaksi')
			->row();

		if ($existingData) {
			$this->session->set_flashdata('message', '<p style="color:red" class="text-center">Previous value already exists</p>');
		} else {

			$data = [
				'status' => 1
			];
			$this->db->where('id_wait', $id)->update('waiting_room', $data);
			$subquery = $this->db->select('*')
				->from('waiting_room')
				->where('id_wait', $id)
				->get_compiled_select();

			$insert_query = "INSERT INTO transaksi $subquery";
			$sub = $this->get_data_wait($id);
			$sch = [
				'nama_studio' => $sub->nama_studio,
				'jam' => $sub->jam_mulai,
				'tanggal' => $sub->tgl_booking,
				'durasi' => $sub->durasi
			];
			$this->db->insert('schedule', $sch);
			$this->db->query($insert_query);
			$this->db->where('id_wait', $id);
			$this->db->delete('waiting_room');
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata(
					'message',
					'<p style="color:green" class="text-center">Status complete change !<p>'
				);
			} else {
				$this->session->set_flashdata(
					'message',
					'<p style="color:red" class="text-center">Status failed to change !<p>'
				);
			}
		}
	}
	// public function calculateAverageDuration()
	// {
	// 	$query = $this->db->select_avg('harga_booking')->get('transaksi');
	// 	$result = $query->row();
	// 	$averageDuration = $result->harga_booking;

	// 	return $averageDuration;
	// }

	private function get_data_wait($id)
	{
		$this->db->where('id_wait', $id);
		return $this->db->get('waiting_room')->row();

	}

	public function read()
	{
		$this->db->select('*');
		$this->db->from('waiting_room');
		$this->db->join('user', 'user.user_id = waiting_room.id_user');
		$query = $this->db->order_by('id_wait', 'DESC')->get();
		return $query->result();
	}

	public function read_by($nama_studio)
	{
		$this->db->where('nama_studio', $nama_studio);
		$query = $this->db->get('studio');
		return $query->row();
	}

	function calculate_data()
	{
		$this->db->from('transaksi');
		$count = $this->db->count_all_results(); // Calculate the number of rows
		return $count;
	}

	function calculate_sales()
	{
		$this->db->select_sum('harga_booking');
		$query = $this->db->get('transaksi');
		$result = $query->row();

		return $result->harga_booking;
	}

	function search_schedule($searchQuery, $limit, $start)
	{
		$this->db->like('nama_studio', $searchQuery);
		$this->db->or_like('tanggal', $searchQuery);
		$this->db->limit($limit, $start);
		$query = $this->db->get('schedule');
		return $query->result();
	}

	function read_schedule($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get('schedule');
		return $query->result();
	}

	function delete_by($id)
	{
		$this->db->where('id_schedule', $id);
		$this->db->delete('schedule');
	}

	function report_data($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('user', 'user.user_id = transaksi.id_user');
		$query = $this->db->order_by('id_trans', 'DESC')->get();
		return $query->result();

	}

	function upload_bukti($photo, $id_user, $id_wait)
	{
		$data = [
			'id_trans' => $id_wait,
			'id_user' => $id_user
		];

		$this->db->set('bukti_gambar', $photo);
		$this->db->insert('bukti_trans', $data);

	}

	function trans_detail($id_wait)
	{
		$this->db->select('*');
		$this->db->from('waiting_room');
		$this->db->join('user', 'user.user_id = waiting_room.id_user');
		$this->db->join('studio', 'studio.nama_studio = waiting_room.nama_studio');
		$this->db->where('waiting_room.id_wait', $id_wait);
		$query = $this->db->get();
		return $query->row();

	}

	function delete($id_wait)
	{
		$this->db->where('id_wait', $id_wait);
		$this->db->delete('waiting_room');

	}

	function get_bukti_trans($id_user, $id_wait)
	{
		$this->db->where('id_user', $id_user);
		$this->db->where('id_trans', $id_wait);
		$query = $this->db->get('bukti_trans');
		return $query->row();
	}

}