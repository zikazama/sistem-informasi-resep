<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
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
        $this->load->model('assign_bahan_m');
        $this->load->model('resep_m');
    }

    public function resep()
    {
        $data = [
            'resep' => $this->resep_m->read_full()->result_array()
        ];
        $bahan = [];
        foreach ($data['resep'] as $i => $item) {
            $bahan[$i] = $this->assign_bahan_m->read_full_where([
                'resep.id_resep' => $item['id_resep']
            ])->result_array();
        }
        $data['bahan'] = $bahan;
        $data['status'] = 'success';
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function resep_by_id($id_resep)
    {
        try {
            $check = $this->resep_m->read_full_where([
                'id_resep' => $id_resep,
            ])->num_rows();
            if ($check == 0) {
                throw new Exception('Data tidak ditemukan');
            }
            $data = [
                'resep' => $this->resep_m->read_full()->row_array()
            ];

            $bahan = $this->assign_bahan_m->read_full_where([
                'resep.id_resep' => $data['resep']['id_resep']
            ])->result_array();

            $data['bahan'] = $bahan;
            $data['status'] = 'success';
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
        } catch (\Throwable $th) {
            $data = [
                'message' => $th->getMessage(),
                'status' => 'failed'
            ];
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
        }
    }
}
