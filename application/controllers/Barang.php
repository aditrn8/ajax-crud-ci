<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Ajax Practice - Aditya Ridwan Nugraha";
		$this->load->view('Barang/v_barang', $data);
	}

	public function data_barang()
	{
		$data = $this->m_barang->tampil_data();
		echo json_encode($data);
	}

	public function save_barang()
	{
		$this->form_validation->set_rules('nama_barang', 'Barang', 'required|trim', [
			'required' => 'Barang wajib di isi gan! Gaboleh di kosongin!'
		]);
		$this->form_validation->set_rules('jumlah_barang', 'Jumlah', 'required|trim|min_length[1]', [
			'required' => 'Jumlah wajib di isi gan! Gaboleh di kosongin!',
			'min_length' => 'Minimal jumlah nya 1 ya gan!',
		]);
		$this->form_validation->set_rules('keterangan_barang', 'Keterangan', 'required|trim', [
			'required' => 'Keterangan wajib di isi gan! Gaboleh di kosongin!'
		]);

		if ($this->form_validation->run()) {
			$data = $this->m_barang->save();
			echo json_encode($data);
		} else {
			$data['title'] = "Ajax Practice - Aditya Ridwan Nugraha";
			$this->load->view('Barang/v_barang', $data);
		}
	}

	public function update_barang()
	{
		$data = $this->m_barang->update();
		echo json_encode($data);
	}

	public function delete_barang()
	{
		$data = $this->m_barang->delete();
		echo json_encode($data);
	}
}
