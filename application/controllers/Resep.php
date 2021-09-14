<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep extends CI_Controller {

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
		$this->load->model('assign_bahan_m');
		$this->load->model('resep_m');
	}

	public function index()
	{
		$data = [
			'resep' => $this->resep_m->read_full()->result_array()
		];
		$bahan = [];
		foreach($data['resep'] as $i => $item){
			$bahan[$i] = $this->assign_bahan_m->read_full_where([
				'resep.id_resep' => $item['id_resep']
			])->result_array();
		}
		$data['bahan'] = $bahan;
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('resep', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$data = [
			'kategori' => $this->kategori_m->read()->result_array()
		];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('resep-form', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$data = $this->input->post();
		if ($this->resep_m->create($data)) {
			$this->session->set_flashdata('success', 'Berhasil membuat resep');
		} else {
			$this->session->set_flashdata('failed', 'Gagal membuat resep');
		}
		redirect(base_url('resep'));
	}

	public function edit($id)
	{
		$data = [
			'resep' => $this->resep_m->read_where([
				'id_resep' => $id
			])->row_array(),
			'kategori' => $this->kategori_m->read()->result_array()
		];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('resep-form', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function update($id)
	{
		$data = $this->input->post();
		if ($this->resep_m->update($data, [
			'id_resep' => $id
		])) {
			$this->session->set_flashdata('success', 'Berhasil mengubah resep');
		} else {
			$this->session->set_flashdata('failed', 'Gagal mengubah resep');
		}
		redirect(base_url('resep'));
	}

	public function delete($id)
	{
		if ($this->resep_m->delete([
			'id_resep' => $id
		])) {
			$this->session->set_flashdata('success', 'Berhasil menghapus resep');
		} else {
			$this->session->set_flashdata('failed', 'Gagal menghapus resep');
		}
		redirect(base_url('resep'));
	}

	public function kelola_bahan($id_resep)
	{
		$data = [
			'resep' => $this->resep_m->read_full_where([
				'id_resep' => $id_resep
			])->row_array(),
			'bahan' => $this->assign_bahan_m->read_full_where([
				'resep.id_resep' => $id_resep
			])->result_array()
		];
		
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('assign', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function kelola_bahan_create($id_resep)
	{
		$data = [
			'resep' => $this->resep_m->read_full_where([
				'id_resep' => $id_resep
			])->row_array(),
			'bahan' => $this->bahan_makanan_m->read()->result_array()
		];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('assign-form', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function kelola_bahan_store($id_resep)
	{
		$data = $this->input->post();
		$data['id_resep'] = $id_resep;
		if ($this->assign_bahan_m->create($data)) {
			$this->session->set_flashdata('success', 'Berhasil assign bahan');
		} else {
			$this->session->set_flashdata('failed', 'Gagal assgin bahan');
		}
		redirect(base_url('resep/kelola_bahan/'.$id_resep));
	}

	public function kelola_bahan_edit($id_resep,$id_assign)
	{
		$data = [
			'resep' => $this->resep_m->read_full_where([
				'id_resep' => $id_resep
			])->row_array(),
			'bahan' => $this->bahan_makanan_m->read()->result_array(),
			'assign' => $this->assign_bahan_m->read_full_where([
				'id_assign_bahan' => $id_assign
			])->row_array(),
		];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('assign-form', $data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}

	public function kelola_bahan_update($id_resep,$id_assign)
	{
		$data = $this->input->post();
		if ($this->assign_bahan_m->update($data, [
			'id_assign_bahan' => $id_assign
		])) {
			$this->session->set_flashdata('success', 'Berhasil mengubah assign bahan');
		} else {
			$this->session->set_flashdata('failed', 'Gagal mengubah assign bahan');
		}
		redirect(base_url('resep/kelola_bahan/'.$id_resep));
	}

	public function kelola_bahan_delete($id_resep, $id_assign)
	{
		if ($this->assign_bahan_m->delete([
			'id_assign_bahan' => $id_assign
		])) {
			$this->session->set_flashdata('success', 'Berhasil menghapus assign bahan');
		} else {
			$this->session->set_flashdata('failed', 'Gagal menghapus assign bahan');
		}
		redirect(base_url('resep/kelola_bahan/'.$id_resep));
	}
}
