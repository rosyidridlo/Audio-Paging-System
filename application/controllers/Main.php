<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('main_model');       		
	}
	
	/* Fungsi Untuk Menampilkan Halaman Utama atau Login */
	public function index()
	{
		if ($this->session->userdata('session_login') != '') {
			redirect('Dashboard', 'refresh');
		} else {
			// $this->load->view('templates/header');
			$this->load->view('login');
			// $this->load->view('templates/footer');
		}
	}

	public function login()
	{
		$user = $this->input->post('username', TRUE);
		$pass = $this->input->post('password', TRUE);
		$check_login = $this->main_model->valid_check($user,$pass)->result();
		if (count($check_login) > 0) {
			foreach ($check_login as $key) {
				$temp_session['password'] = $key->password;
				$temp_session['username'] = $key->username;
				$temp_session['nama'] = $key->nama;

				//simpan session
				$this->session->set_userdata('session_login', $temp_session);
				$this->index();
			}
		} else {
			echo "Gagal Login , <a href=".base_url()."Main> Back >> </a>";
		}
	}

	public function home()
	{
		redirect('Dashboard', 'refresh');
	}

	public function logout()
	{
		$this->session->unset_userdata('session_login');
		redirect('home', 'refresh');
	}
}
