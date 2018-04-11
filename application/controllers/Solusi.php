<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solusi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('solusi_model');
		$this->load->model('kerusakan_model');
		
		if ($this->session->userdata('session_login') != TRUE){
			redirect('main','refresh');
		}
	}
	/* View All Data */
	public function index()
	{
		$data['title'] = $this->uri->segment(1);
		$data['solusi'] = $this->solusi_model->get_solusi();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('solusi/index', $data);
		$this->load->view('templates/footer');
	}

	/* View Some Data */
	public function view($params)
	{
		$data['title'] = $this->uri->segment(1);
		$data['solusi'] = $this->solusi_model->get_solusi($params);
		$data['kerusakan'] = $this->kerusakan_model->get_kerusakan();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('solusi/edit_page', $data);
		$this->load->view('templates/footer');
	}

	/* Create New Data */
	public function create()
	{/* Create New Data */
		$this->load->library('form_validation');
		$data['kerusakan'] = $this->kerusakan_model->get_kerusakan();
		$data['title'] = $this->uri->segment(1);

		$this->form_validation->set_rules('id_solusi', 'ID Solusi', 'required');
		$this->form_validation->set_rules('solusi', 'Solusi', 'required');
		$this->form_validation->set_rules('id_kerusakan', 'ID Kerusakan', 'required');

		/* get last id */
		$get = $this->solusi_model->last_id();
		$char = substr($get['id_solusi'], -3);
		$value = $char+1;

		switch (strlen($value)) {
			case '1':
				$data['id'] = 'S00'.$value;
				break;
			case '2':
				$data['id'] = 'S0'.$value;
				break;
			case '3':
				$data['id'] = 'S'.$value;
				break;
			default:
				$data['id'] = 'S001'.$value;
				break;
		}

		if ($this->form_validation->run() === FALSE ){
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('solusi/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->solusi_model->create_solusi();
			redirect('solusi', 'refresh');
		}
		
	}

	/* Edit Data */
	public function edit(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_solusi', 'ID Solusi', 'required');
		$this->form_validation->set_rules('solusi', 'Solusi', 'required');
		$this->form_validation->set_rules('id_kerusakan', 'ID Kerusakan', 'required');

		if ($this->form_validation->run() === FALSE ){		
			$data['solusi'] = array
				(
					'id_solusi' => $this->input->post('id_solusi'),
					'solusi' => $this->input->post('solusi'),
					'id_kerusakan' => $this->input->post('id_kerusakan')
				);
			$data['kerusakan'] = $this->kerusakan_model->get_kerusakan();

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('solusi/edit_page', $data);
			$this->load->view('templates/footer');
		} else {
			$this->solusi_model->set_update();
			redirect('solusi', 'refresh');
		}
	}

	/* Delete Data */
	public function delete($id){
		$this->solusi_model->delete($id);
		redirect('solusi', 'refresh');
	}
}
