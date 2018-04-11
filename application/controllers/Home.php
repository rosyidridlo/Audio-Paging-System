<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('gejala_model');
        $this->load->model('kerusakan_model');           		
	}
	
	/* Fungsi Untuk Menampilkan Halaman Utama atau Login */
	public function index()
	{
		$this->load->view('top-nav/header');
		$this->load->view('top-nav/index');
		$this->load->view('top-nav/footer');
    }

    public function diagnosa()
    {
        $this->load->view('top-nav/header');
		$this->load->view('diagnosa/index');
		$this->load->view('top-nav/footer');
    }

    public function informasi()
    {
		$data['kerusakan'] = $this->kerusakan_model->get_kerusakan_solusi();
		$data['gejala'] = $this->gejala_model->get_gejala();

        $this->load->view('top-nav/header');
		$this->load->view('informasi/index',$data);
		$this->load->view('top-nav/footer');
    }
}