<?php

class Roles extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
	function index(){
		
		$data['module'] = 'roles';
		$data['template'] = 'home_view';
		$this->load->model('roles_model');
		$data['roles'] = $this->roles_model->getAll();
		$this->load->view('template', $data);			
	}
	function edit($id = NULL) {
		$this->load->model('roles_model');
		$data["role"] = $this->roles_model->getById($id);
		$data['module'] = 'roles';
		$data['template'] = 'edit_view';
		$this->load->view('template', $data);	
	}	
	function nuevo() {
		$data['module'] = 'roles';
		$data['template'] = 'new_view';
		$this->load->view('template', $data);	
	}
	function save() {
		$save = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('roles_model');
		$this->roles_model->save($save);
		redirect("roles");
	}
	function update() {
		$update = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('roles_model');
		$this->roles_model->update($update,$this->input->post("id"));
		redirect("roles");
	}
	function delete($id = NULL) {
		$this->load->model('roles_model');
		$this->roles_model->delete($id);
		redirect("roles");		
	}
}