<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gejala_model');
		
		if ($this->session->userdata('session_login') != TRUE){
			redirect('main','refresh');
		}
	}
	/* View All Data */
	public function index()
	{
		$data['title'] = $this->uri->segment(1);
		$data['gejala'] = $this->gejala_model->get_gejala();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('gejala/index', $data);
		$this->load->view('templates/footer');
	}

	/* View Some Data */
	public function view($params)
	{
		$data['gejala'] = $this->gejala_model->get_gejala($params);
		$data['title'] = $this->uri->segment(1);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('gejala/edit_page', $data);
		$this->load->view('templates/footer');
	}

	/* Create New Data */
	public function create()
	{/* Create New Data */
    	$this->load->library('form_validation');
		$data['title'] = $this->uri->segment(1);

		$this->form_validation->set_rules('id_gejala', 'ID Gejala', 'required');
		$this->form_validation->set_rules('gejala', 'Gejala', 'required');

		/* get last id */
		$get = $this->gejala_model->last_id();
		$char = substr($get['id_gejala'], -3);
		$value = $char+1;

		switch (strlen($value)) {
			case '1':
				$data['id'] = 'G00'.$value;
				break;
			case '2':
				$data['id'] = 'G0'.$value;
				break;
			case '3':
				$data['id'] = 'G'.$value;
				break;
			default:
				$data['id'] = 'G001'.$value;
				break;
		}

		if ($this->form_validation->run() === FALSE ){

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('gejala/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->gejala_model->create_gejala();
			redirect('gejala', 'refresh');
		}
		
	}

	/* Edit Data */
	public function edit(){
		$this->load->library('form_validation');
		$data['title'] = $this->uri->segment(1);


		$this->form_validation->set_rules('id_gejala', 'ID Gejala', 'required');
		$this->form_validation->set_rules('gejala', 'Gejala', 'required');

		if ($this->form_validation->run() === FALSE ){
			
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('gejala/edit_page',$data);
			$this->load->view('templates/footer');
		} else {
			$this->gejala_model->set_update();
			redirect('gejala', 'refresh');
		}
	}

	/* Delete Data */
	public function delete($id){
	$this->gejala_model->delete($id);
	redirect('gejala', 'refresh');
	}
}
