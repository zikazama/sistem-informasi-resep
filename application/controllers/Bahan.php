<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_m');
		$this->load->model('bahan_makanan_m');
		$this->load->model('resep_m');
	}

	public function index()
	{
		$data = [
			'bahan' => $this->bahan_makanan_m->read()->result_array()
		];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('bahan', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$data = [];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('bahan-form', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$data = $this->input->post();
		if ($this->bahan_makanan_m->create($data)) {
			$this->session->set_flashdata('success', 'Berhasil membuat bahan makanan');
		} else {
			$this->session->set_flashdata('failed', 'Gagal membuat bahan makanan');
		}
		redirect(base_url('bahan'));
	}

	public function edit($id)
	{
		$data = [
			'bahan' => $this->bahan_makanan_m->read_where([
				'id_bahan_makanan' => $id
			])->row_array()
		];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('bahan-form', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function update($id)
	{
		$data = $this->input->post();
		if ($this->bahan_makanan_m->update($data, [
			'id_bahan_makanan' => $id
		])) {
			$this->session->set_flashdata('success', 'Berhasil mengubah bahan makanan');
		} else {
			$this->session->set_flashdata('failed', 'Gagal mengubah bahan makanan');
		}
		redirect(base_url('bahan'));
	}

	public function delete($id)
	{
		if ($this->bahan_makanan_m->delete([
			'id_bahan_makanan' => $id
		])) {
			$this->session->set_flashdata('success', 'Berhasil menghapus bahan makanan');
		} else {
			$this->session->set_flashdata('failed', 'Gagal menghapus bahan makanan');
		}
		redirect(base_url('bahan'));
	}
}
