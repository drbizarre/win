<?php

class Seguimientos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
		$this->auth->is_admin();
	}

	function index() {
		$data['title'] = '';
		$data['module'] = 'seguimientos';
		$data['template'] = 'home_view';
		$this->load->model('seguimientos_model');
		$data["seguimientos"] = $this->seguimientos_model->getAll();
		$this->load->view('template', $data);		
	}

	function nuevo($id = NULL) {
		$data["id_cliente"] = $id;
		$data['title'] = '';
		$data['module'] = 'pendientes';
		$data['template'] = 'new_view';
		$this->load->model('prospectos_model');
		$data["clientes"] = $this->prospectos_model->getAll();
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);		
	}	
	function grabar() {
		$new = array(
			'user_id'=>$this->input->post("user_id"),
			'cliente_id'=>$this->input->post("cliente_id"),
			'fecha'=>date("Y-m-d"),
			'hora'=>date("H:s:i"),
			'comentario'=>$this->input->post("comentario")
		);
		$this->load->model('seguimientos_model');
		$this->seguimientos_model->savea($new);
		
		//redirect("seguimientos/".$this->input->post("cliente_id"));
	}	
	function delete($id = NULL) {
		$this->load->model('seguimientos_model');
		$this->seguimientos_model->delete($id);
		redirect("seguimientos");
	}
	function edit($id = NULL) {
		$data['title'] = '';
		$data['module'] = 'pendientes';
		$data['template'] = 'edit_view';
		$this->load->model('prospectos_model');
		$this->load->model('pendientes_model');
		$data["clientes"] = $this->prospectos_model->getAll();
		$data["pendiente"] = $this->pendientes_model->getById($id);
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);
	}

	function ver($id = NULL) {
		$data['module'] = 'pendientes';
		$data['template'] = 'view_view';
		$this->load->model('pendientes_model');
		$data["pendiente"] = $this->pendientes_model->getById($id);
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);
	}

	function por_prospecto($id = NULL) {
		$data['module'] = 'seguimientos';
		$data['template'] = 'home_view';
		$this->load->model('pendientes_model');
		$this->load->model('seguimientos_model');
		$this->load->model('clients_model');
		$data["seguimientos"] = $this->seguimientos_model->getAllByProspecto($id);
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$data["cliente"] = $this->clients_model->getClientById($id);
		$this->load->view('template', $data);
	}
	function update() {
		$tmp = explode("/",$this->input->post("fecha"));
		$fecha = $tmp[2]."-".$tmp[0]."-".$tmp[1];
		$tmp2 = explode(" ",$this->input->post("hora"));
		$hora = $tmp2[0];			
		$id = $this->input->post("id");
		$update = array(
			'cliente_id'=>$this->input->post("cliente"),
			'pendiente'=>$this->input->post("pendiente"),
			'oportunidad'=>$this->input->post("oportunidad"),
			'fecha'=>$fecha,
			'hora'=>$hora,
			'comentario'=>$this->input->post("comentario")
		);
		$data['module'] = 'pendientes';
		$data['template'] = 'edit_view';
		$this->load->model('pendientes_model');
		$this->pendientes_model->update($id,$update);
		$data["pendiente"] =$this->pendientes_model->getById($id);
		$data["mensaje"] = "Datos actualizados correctamente";
		$this->load->model('prospectos_model');
		$data["clientes"] = $this->prospectos_model->getAll();
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->view('template', $data);	
	}
	function status($id = NULL) {
		$update = array(
			'status'=>"off"
		);
		$this->load->model('seguimientos_model');
		$this->seguimientos_model->update($id,$update);
		redirect("seguimientos/".$id);
	}	
}