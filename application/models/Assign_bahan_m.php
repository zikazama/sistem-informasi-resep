<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assign_bahan_m extends Base_m {

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
    public $table = "assign_bahan";

	public function read_full(){
		$this->db->from($this->table);
		$this->db->join('bahan_makanan','bahan_makanan.id_bahan_makanan = assign_bahan.id_bahan_makanan');
		$this->db->join('resep','resep.id_resep = assign_bahan.id_resep');
		$this->db->join('kategori','kategori.id_kategori = resep.id_kategori');
		return $this->db->get();
	}

	public function read_full_where($where){
		$this->db->from($this->table);
		$this->db->join('bahan_makanan','bahan_makanan.id_bahan_makanan = assign_bahan.id_bahan_makanan');
		$this->db->join('resep','resep.id_resep = assign_bahan.id_resep');
		$this->db->join('kategori','kategori.id_kategori = resep.id_kategori');
		$this->db->where($where);
		return $this->db->get();
	}
}
