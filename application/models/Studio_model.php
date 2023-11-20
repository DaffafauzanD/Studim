<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Studio_model extends CI_Model
{
	public function create()
	{
		$data = [
			'nama_studio' => $this->input->post('nama_studio'),
			'fasilitas' => $this->input->post('fasilitas'),
			'harga' => $this->input->post('harga'),
			'alat_musik' => $this->input->post('alat_musik'),
			'deskripsi' => $this->input->post('deskripsi'),

		];
		$this->db->insert('studio', $data);
	}
	public function read($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get('studio');
		return $query->result();
	}

	public function update($id, $photo = null)
	{
		$previousPhoto = $this->getPhotoById($id);
		$data = [
			'nama_studio' => $this->input->post('nama_studio'),
			'fasilitas' => $this->input->post('fasilitas'),
			'harga' => $this->input->post('harga'),
			'alat_musik' => $this->input->post('alat_musik'),
			'deskripsi' => $this->input->post('deskripsi'),
		];

		if ($photo !== null) {
			$data['foto_studio'] = $photo;
		}

		$this->db->trans_start(); // Start a transaction

		$this->db->where('id_studio', $id);
		$this->db->update('studio', $data);

		// Delete the previous photo if it exists
		if ($previousPhoto && $previousPhoto != $photo) {
			$this->deletePhoto($previousPhoto);
		}


		$this->db->trans_complete(); // Complete the transaction

		if ($this->db->trans_status() === FALSE) {
			// Transaction failed

			return false;
		}
		return true;

	}


	private function getPhotoById($id)
	{
		$query = $this->db->select('foto_studio')
			->from('studio')
			->where('id_studio', $id)
			->get();

		if ($query->num_rows() > 0) {
			return $query->row()->foto_studio;
		}

		return null;
	}

	private function deletePhoto($photo)
	{
		$filePath = './upload/studio/' . $photo;

		if (file_exists($filePath)) {
			unlink($filePath);
		}
	}



	public function delete($id)
	{
		$previousPhoto = $this->getPhotoById($id);
		$this->deletePhoto($previousPhoto);
		$this->db->where('id_studio', $id);
		$this->db->delete('studio');
	}

	public function read_byId($id)
	{
		$this->db->where('id_studio', $id);
		$query = $this->db->get('studio');
		return $query->row();
	}

	public function read_by($nama_studio)
	{
		$this->db->where('nama_studio', $nama_studio);
		$query = $this->db->get('studio');
		return $query->row();
	}
}