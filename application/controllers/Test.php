<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('kategori_m');
    }

    public function testAddKategori()
    {
        $test = $this->kategori_m->create([
            'nama_kategori' => "coba unit test"
        ]);

        $expected_result = true;

        $test_name = 'Test menambahkan kategori';

        return $this->unit->run($test, $expected_result, $test_name);
    }

    public function testGetKategori()
    {
        $test = $this->kategori_m->read_where([
            'nama_kategori' => "coba unit test"
        ])->num_rows();

        $expected_result = 1;

        $test_name = 'Test melihat kategori';

        return $this->unit->run($test, $expected_result, $test_name);
    }

    public function testUpdateKategori()
    {
        $test = $this->kategori_m->update([
            'nama_kategori' => "nyoba kedua"
        ],[
            'nama_kategori' => "coba unit test"
        ]);

        $expected_result = true;

        $test_name = 'Test update kategori';

        return $this->unit->run($test, $expected_result, $test_name);
    }

    public function testDeleteKategori()
    {
        $test = $this->kategori_m->delete([
            'nama_kategori' => "nyoba kedua"
        ]);

        $expected_result = true;

        $test_name = 'Test hapus kategori';

        return $this->unit->run($test, $expected_result, $test_name);
    }

    public function index()
    {
        echo $this->testAddKategori();
        echo $this->testGetKategori();
        echo $this->testUpdateKategori();
        echo $this->testDeleteKategori();
    }
}
