<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	public function __construct(){
		parent::__construct();
		$this->load->model('kategori_m');
		$this->load->model('bahan_makanan_m');
		$this->load->model('resep_m');
	}

	public function index()
	{	
		$data = [
			'jumlah_kategori' => $this->kategori_m->read()->num_rows(),
			'jumlah_bahan_makanan' => $this->bahan_makanan_m->read()->num_rows(),
			'jumlah_resep' => $this->resep_m->read()->num_rows()
		];
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('dashboard',$data);
		$this->load->view('partials/script');
		$this->load->view('partials/footer');
	}
}
