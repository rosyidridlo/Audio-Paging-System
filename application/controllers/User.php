<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		
		if ($this->session->userdata('session_login') != TRUE){
			redirect('main','refresh');
		}
	}
	/* View All Data */
	public function index()
	{
		$data['title'] = $this->uri->segment(1);
		$data['user'] = $this->user_model->get_user();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	/* View Some Data */
	public function view($params)
	{
		$data['title'] = $this->uri->segment(1);
		$data['user'] = $this->user_model->get_user($params);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('user/edit_page', $data);
		$this->load->view('templates/footer');
	}

	/* Create New Data */
	public function create()
	{/* Create New Data */
    	$this->load->library('form_validation');
		$data['title'] = $this->uri->segment(1);

		$this->form_validation->set_rules('id_user', 'ID User', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		/* get last id */
		$get = $this->user_model->last_id();
		$char = substr($get['id_user'], -3);
		$value = $char+1;

		switch (strlen($value)) {
			case '1':
				$data['id'] = 'U00'.$value;
				break;
			case '2':
				$data['id'] = 'U0'.$value;
				break;
			case '3':
				$data['id'] = 'U'.$value;
				break;
			default:
				$data['id'] = 'U001'.$value;
				break;
		}

		if ($this->form_validation->run() === FALSE ){

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('user/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->user_model->create_user();
			redirect('user', 'refresh');
		}
		
	}

	/* Edit Data */
	public function edit(){
		$this->load->library('form_validation');
		$data['title'] = $this->uri->segment(1);

		$this->form_validation->set_rules('id_user', 'ID User', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() === FALSE ){
			$data['user'] = array
				(
					'id_user' => $this->input->post('id_user'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'email' => $this->input->post('email')
				);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('user/edit_page',$data);
			$this->load->view('templates/footer');
		} else {
			$this->user_model->set_update();
			redirect('User', 'refresh');
		}
	}

	/* Delete Data */
	public function delete($id){
		$this->user_model->delete($id);
		redirect('User', 'refresh');
	}
}
