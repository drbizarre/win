<?php
class Productos extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
	function index($tipo = NULL){
		
		$data['module'] = 'productos';
		$data['template'] = 'home_view';
		$this->load->model('productos_model');
		if ($tipo=="producto") {
			$data['productos'] = $this->productos_model->getAllByType($tipo);
		}else{
			$data['servicios'] = $this->productos_model->getAllByType($tipo);
		}
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$data["tipo"] = $tipo;		
		$this->load->view('template', $data);			
	}
	function edit($id = NULL) {
		$this->load->model('productos_model');
		$data["producto"] = $this->productos_model->getById($id);
		$data['module'] = 'productos';
		$data['template'] = 'edit_view';
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);	
	}	
	function nuevo($tipo = NULL) {
		$data['module'] = 'productos';
		$data['template'] = 'new_view';
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$data["tipo"] = $tipo;
		$this->load->view('template', $data);	
	}
	function save() {
		$tipo = $this->input->post("tipo");
		$save = array('nombre'=>$this->input->post("nombre"),'precio'=>$this->input->post("precio"),'descripcion'=>$this->input->post("descripcion"),'tipo'=>$tipo);
		$this->load->model('productos_model');
		$this->productos_model->save($save);
		if ($tipo=="servicio") {
			redirect("servicios");	
		}else{
			redirect("productos");	
		}
	}
	function update() {
		$update = array('nombre'=>$this->input->post("nombre"),'descripcion'=>$this->input->post("descripcion"));
		$this->load->model('productos_model');
		$this->productos_model->update($update,$this->input->post("id"));
		redirect("servicios");
	}
	function delete($id = NULL) {
		$this->load->model('productos_model');
		$this->productos_model->delete($id);
		redirect("servicios");		
	}
}