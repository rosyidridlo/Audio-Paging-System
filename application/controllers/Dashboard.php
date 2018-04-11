<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();      		
	}
	
	/* Fungsi Untuk Menampilkan Halaman Template */
	public function index()
	{
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/content');
			$this->load->view('templates/footer');
    }
}