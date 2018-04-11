<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerusakan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kerusakan_model');
		
		if ($this->session->userdata('session_login') != TRUE){
			redirect('main','refresh');
		}
	}
	/* View All Data */
	public function index()
	{
		$data['title'] = $this->uri->segment(1);
		$data['kerusakan'] = $this->kerusakan_model->get_kerusakan();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kerusakan/index', $data);
		$this->load->view('templates/footer');
	}

	/* View Some Data */
	public function view($params)
	{
		$data['title'] = $this->uri->segment(1);
		$data['kerusakan'] = $this->kerusakan_model->get_kerusakan($params);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kerusakan/edit_page', $data);
		$this->load->view('templates/footer');
	}

	/* Create New Data */
	public function create()
	{/* Create New Data */
    	$this->load->library('form_validation');
		$data['title'] = $this->uri->segment(1);

		$this->form_validation->set_rules('id_kerusakan', 'ID Kerusakan', 'required');
		$this->form_validation->set_rules('nama_kerusakan', 'Nama Kerusakan', 'required');
		$this->form_validation->set_rules('definisi', 'Definisi', 'required');

		/* get last id */
		$get = $this->kerusakan_model->last_id();
		$char = substr($get['id_kerusakan'], -3);
		$value = $char+1;

		switch (strlen($value)) {
			case '1':
				$data['id'] = 'P00'.$value;
				break;
			case '2':
				$data['id'] = 'P0'.$value;
				break;
			case '3':
				$data['id'] = 'P'.$value;
				break;
			default:
				$data['id'] = 'P001'.$value;
				break;
		}

		if ($this->form_validation->run() === FALSE ){

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('kerusakan/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->kerusakan_model->create_kerusakan();
			redirect('kerusakan', 'refresh');
		}
		
	}

	/* Edit Data */
	public function edit(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_kerusakan', 'ID Kerusakan', 'required');
		$this->form_validation->set_rules('nama_kerusakan', 'Nama Kerusakan', 'required');
		$this->form_validation->set_rules('definisi', 'Definisi', 'required');

		if ($this->form_validation->run() === FALSE ){
			
			$this->load->view('templates/header');
			$this->load->view('kerusakan/edit_page',$data);
			$this->load->view('templates/footer');
		} else {
			$this->kerusakan_model->set_update();
			redirect('kerusakan', 'refresh');
		}
	}

	/* Delete Data */
	public function delete($id){
		$this->kerusakan_model->delete($id);
		redirect('kerusakan', 'refresh');
	}
}
