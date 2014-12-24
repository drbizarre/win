<?php

class Empresas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
		$this->auth->is_admin();
	}

	function index() {
		$data['title'] = '';
		$data['module'] = 'empresas';
		$data['template'] = 'home_view';
		$this->load->model('empresas_model');
		$data["empresas"] = $this->empresas_model->getAll();
		$this->load->view('template', $data);		
	}

	function nuevo() {
		$data['title'] = '';
		$data['module'] = 'empresas';
		$data['template'] = 'new_view';
		$this->load->view('template', $data);		
	}	
	function save() {
		$new = array(
			'user_id'=>$this->session->userdata('user_id'),
			'nombre'=>$this->input->post("nombre"),
			'descripcion'=>$this->input->post("descripcion")
		);
		$this->load->model('empresas_model');
		$this->empresas_model->save($new);
		redirect("empresas");
	}	
	function delete($id = NULL) {
		$this->load->model('empresas_model');
		$this->empresas_model->delete($id);
		//redirect("empresas");
	}
	function edit($id = NULL) {
		$data['title'] = '';
		$data['module'] = 'empresas';
		$data['template'] = 'edit_view';
		$this->load->model('empresas_model');
		$data["empresa"] = $this->empresas_model->getById($id);
		
		$this->load->view('template', $data);	
	}
	function update() {
		$id = $this->input->post("id");
		$update = array(
			'nombre'=>$this->input->post("nombre"),
			'descripcion'=>$this->input->post("descripcion")
		);
		$data['module'] = 'empresas';
		$data['template'] = 'edit_view';
		$this->load->model('empresas_model');
		$this->empresas_model->update($id,$update);
		$data["empresa"] =$this->empresas_model->getById($id);
		$data["mensaje"] = "Datos actualizados correctamente";
		$this->load->view('template', $data);	
	}
}