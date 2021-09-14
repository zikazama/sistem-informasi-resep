<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

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
			'kategori' => $this->kategori_m->read()->result_array()
		];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('kategori', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$data = [];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('kategori-form', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$data = $this->input->post();
		if ($this->kategori_m->create($data)) {
			$this->session->set_flashdata('success', 'Berhasil membuat kategori');
		} else {
			$this->session->set_flashdata('failed', 'Gagal membuat kategori');
		}
		redirect(base_url('kategori'));
	}

	public function edit($id)
	{
		$data = [
			'kategori' => $this->kategori_m->read_where([
				'id_kategori' => $id
			])->row_array()
		];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('kategori-form', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function update($id)
	{
		$data = $this->input->post();
		if ($this->kategori_m->update($data, [
			'id_kategori' => $id
		])) {
			$this->session->set_flashdata('success', 'Berhasil mengubah kategori');
		} else {
			$this->session->set_flashdata('failed', 'Gagal mengubah kategori');
		}
		redirect(base_url('kategori'));
	}

	public function delete($id)
	{
		if ($this->kategori_m->delete([
			'id_kategori' => $id
		])) {
			$this->session->set_flashdata('success', 'Berhasil menghapus kategori');
		} else {
			$this->session->set_flashdata('failed', 'Gagal menghapus kategori');
		}
		redirect(base_url('kategori'));
	}
}
