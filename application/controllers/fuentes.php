<?php

class Fuentes extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
	function index(){
		
		$data['module'] = 'fuentes';
		$data['template'] = 'home_view';
		$this->load->model('fuentes_model');
		$data['fuentes'] = $this->fuentes_model->getAll();
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);			
	}
	function edit($id = NULL) {
		$this->load->model('fuentes_model');
		$data["fuente"] = $this->fuentes_model->getById($id);
		$data['module'] = 'fuentes';
		$data['template'] = 'edit_view';
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);	
	}	
	function nuevo() {
		$data['module'] = 'fuentes';
		$data['template'] = 'new_view';
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);	
	}
	function save() {
		$save = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('fuentes_model');
		$this->fuentes_model->save($save);
		redirect("fuentes");
	}
	function update() {
		$update = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('fuentes_model');
		$this->fuentes_model->update($update,$this->input->post("id"));
		redirect("fuentes");
	}
	function delete($id = NULL) {
		$this->load->model('fuentes_model');
		$this->fuentes_model->delete($id);
		redirect("fuentes");		
	}
}