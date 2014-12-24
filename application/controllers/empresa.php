<?php

class Empresa extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
		
	}
	function index(){
		$empresa = $this->session->userdata('empresa');
		$data['module'] = 'empresa';
		$data['template'] = 'home_view';
		$this->load->model('empleados_model');
		$data["empleados"] = $this->empleados_model->getByEmpresa($empresa);
		$this->load->view('template', $data);			
	}
	function empleados() {
		$empresa = $this->session->userdata('empresa');
		$data['title'] = '';
		$data['module'] = 'empresa';
		$data['template'] = 'home_empleados_view';
		$this->load->model('empleados_model');
		$data["empleados"] = $this->empleados_model->getByEmpresa($empresa);
	
		$this->load->view('template', $data);		
	}	
	function nominas(){
		$empresa = $this->session->userdata('empresa');
		$data['module']   = 'empresa';
		$data['template'] = 'home_nominas_view';
		$this->load->model('nominas_model');
		$data["nominas"]  = $this->nominas_model->getAllByEmpresa($empresa);
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