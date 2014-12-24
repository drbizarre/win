<?php
class Tipos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
	function index(){
		$data['module'] = 'tipos';
		$data['template'] = 'home_view';
		$this->load->model('tipos_model');
		$data['tipos'] = $this->tipos_model->getAll();
		$this->load->view('template', $data);			
	}
	function edit($id = NULL) {
		$this->load->model('tipos_model');
		$data["region"] = $this->tipos_model->getById($id);
		$data['module'] = 'tipos';
		$data['template'] = 'edit_view';
		$this->load->view('template', $data);	
	}	
	function nuevo() {
		$data['module'] = 'tipos';
		$data['template'] = 'new_view';
		$this->load->view('template', $data);	
	}
	function save() {
		$save = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('tipos_model');
		$this->tipos_model->save($save);
		redirect("tipos");
	}
	function update() {
		$update = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('tipos_model');
		$this->tipos_model->update($update,$this->input->post("id"));
		redirect("tipos");
	}
	function delete($id = NULL) {
		$this->load->model('tipos_model');
		$this->tipos_model->delete($id);
		redirect("tipos");		
	}
}