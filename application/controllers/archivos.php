<?php

class Archivos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
		$this->auth->is_admin();
	}

	function index() {
		$data['title'] = '';
		$data['module'] = 'archivos';
		$data['template'] = 'home_view';
		$this->load->model('user');
		$data["empleados"] = $this->user->getAllByEmpresa();
	
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
		$directory = './media/'; 
		$config['upload_path'] = $directory ; /* NB! create this dir! */
		$config['allowed_types'] = '*';
		$config['max_size']  = 0;
		$config['max_width']  = 0;
		$config['max_height']  = 0;
		$this->load->library('upload', $config);
		$this->load->helper("image");
		$upload_archivo = $this->upload->do_upload('archivo');		  		  
		if ($upload_archivo) {
			$data_archivo = $this->upload->data();
		}else{
			$data_archivo["file_name"] = NULL;
		}		
		$new = array('tipo_archivo' =>$this->input->post("tipo"),'id_empleado'=>$this->input->post("id"),"archivo"=>$data_archivo["file_name"]);
		$this->load->model('empleados_model');
		$this->empleados_model->save_archivo($new);
		$this->session->set_flashdata('message', 'agregado');
		redirect("archivos/edit/".$this->input->post("id"));
	}	
	function delete($id = NULL,$empleado) {
		$this->load->model('empleados_model');
		$this->empleados_model->delete_archivo($id);
		$this->session->set_flashdata('message', 'borrado');
		redirect("archivos/edit/".$empleado);
	}
	function edit($id = NULL) {
		$data['title'] = '';
		$data['module'] = 'archivos';
		$data['template'] = 'edit_view';
		$this->load->model('user');
		$data["empleado"] = $this->user->getUserById($id);
		$this->load->model('empresas_model');
		$data["empresas"] = $this->empresas_model->getAll();
		$this->load->model('tipos_model');
		$data["tipos"] = $this->tipos_model->getAll();
		$data["archivos"] = $this->user->getFiles($id);
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