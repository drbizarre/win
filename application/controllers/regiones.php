<?php
class Regiones extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
	function index(){
		
		$data['module'] = 'regiones';
		$data['template'] = 'home_view';
		$this->load->model('regiones_model');
		$data['regiones'] = $this->regiones_model->getAll();
		$this->load->view('template', $data);			
	}
	function edit($id = NULL) {
		$this->load->model('regiones_model');
		$data["region"] = $this->regiones_model->getById($id);
		$data['module'] = 'regiones';
		$data['template'] = 'edit_view';
		$this->load->view('template', $data);	
	}	
	function nuevo() {
		$data['module'] = 'regiones';
		$data['template'] = 'new_view';
		$this->load->view('template', $data);	
	}
	function save() {
		$save = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('regiones_model');
		$this->regiones_model->save($save);
		redirect("regiones");
	}
	function update() {
		$update = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('regiones_model');
		$this->regiones_model->update($update,$this->input->post("id"));
		redirect("regiones");
	}
	function delete($id = NULL) {
		$this->load->model('regiones_model');
		$this->regiones_model->delete($id);
		redirect("regiones");		
	}
}