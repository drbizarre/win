<?php

class Empleados extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
		$this->auth->is_admin();
	}

	function index() {
		$data['title'] = '';
		$data['module'] = 'empleados';
		$data['template'] = 'home_view';
		$this->load->model('empleados_model');
		$data["empleados"] = $this->empleados_model->getAll();
	
		$this->load->view('template', $data);		
	}
	function porid($id = NULL) {
		
		$this->load->model('clientes_model');
		$data["cliente"] = $this->clientes_model->getById($id);
		echo $data["cliente"]->email;
	}
	function nuevo() {
		$data['title'] = '';
		$data['module'] = 'empleados';
		$data['template'] = 'new_view';
		$this->load->model('empresas_model');
		$this->load->model('regiones_model');
		$data["empresas"] = $this->empresas_model->getAll();
		$data["regiones"] = $this->regiones_model->getAll();
		$this->load->view('template', $data);		
	}	
	function save() {
		$new = array(
			'user_id'  =>$this->session->userdata('user_id'),
			'no'       =>$this->input->post("no"),
			'empresa'  =>$this->input->post("empresa"),
			'nombre'   =>$this->input->post("nombre"),
			'apellidos'=>$this->input->post("apellidos"),
			'puesto'   =>$this->input->post("puesto"),
			'region'   =>$this->input->post("region"),
			'ciudad'   =>$this->input->post("ciudad"),
			'salario'  =>$this->input->post("salario")
		);
		$this->load->model('empleados_model');
		$this->empleados_model->save($new);
		redirect("empleados");
	}	
	function delete($id = NULL) {
		$this->load->model('empleados_model');
		$this->empleados_model->delete($id);
		redirect("empleados");
	}
	function edit($id = NULL) {
		$data['title'] = '';
		$data['module'] = 'empleados';
		$data['template'] = 'edit_view';
		$this->load->model('empleados_model');
		$data["empleado"] = $this->empleados_model->getById($id);
		$this->load->model('empresas_model');
		$data["empresas"] = $this->empresas_model->getAll();
		$this->load->view('template', $data);	
	}
	function update() {
		$id = $this->input->post("id");
		$update = array(
			'nombre'=>$this->input->post("nombre"),
			'apellidos'=>$this->input->post("apellidos"),
			'no'=>$this->input->post("no"),
			'empresa'=>$this->input->post("empresa"),
			'puesto'=>$this->input->post("puesto"),
			'region'=>$this->input->post("region"),
			'ciudad'=>$this->input->post("ciudad"),
			'salario'=>$this->input->post("salario")
		);
		$data['module'] = 'empleados';
		$data['template'] = 'edit_view';
		$this->load->model('empleados_model');
		$this->empleados_model->update($id,$update);
		$data["empleado"] =$this->empleados_model->getById($id);
		$data["mensaje"] = "Datos actualizados correctamente";
		$this->load->model('empresas_model');
		$data["empresas"] = $this->empresas_model->getAll();
		
		$this->load->view('template', $data);	
	}
	function status($id = NULL) {
		
		$update = array(
			'tipo'=>"cliente"
		);
		$this->load->model('clientes_model');
		$this->clientes_model->update($id,$update);
	}	
}