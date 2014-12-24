<?php

class Fases extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
	function index(){
		
		$data['module'] = 'fases';
		$data['template'] = 'home_view';
		$this->load->model('fases_model');
		$data['fases'] = $this->fases_model->getAll();
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);			
	}
	function edit($id = NULL) {
		$this->load->model('fases_model');
		$data["fase"] = $this->fases_model->getById($id);
		$data['module'] = 'fases';
		$data['template'] = 'edit_view';
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);	
	}	
	function nuevo() {
		$data['module'] = 'fases';
		$data['template'] = 'new_view';
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);	
	}
	function save() {
		$save = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('fases_model');
		$this->fases_model->save($save);
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		redirect("fases");
	}
	function update() {
		$update = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('fases_model');
		$this->fases_model->update($update,$this->input->post("id"));
		redirect("fases");
	}
	function delete($id = NULL) {
		$this->load->model('fases_model');
		$this->fases_model->delete($id);
		redirect("fases");		
	}
}