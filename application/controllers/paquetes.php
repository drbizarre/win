<?php

class Paquetes extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}
	function index(){
		
		$data['module'] = 'paquetes';
		$data['template'] = 'home_view';
		$this->load->model('paquetes_model');
		$data['paquetes'] = $this->paquetes_model->getAll();
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
		$data['module'] = 'paquetes';
		$data['template'] = 'new_view';
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		$this->load->model('productos_model');
		$data["productos"] = $this->productos_model->getAllByType('producto');				
		$data["servicios"] = $this->productos_model->getAllByType('servicio');				
		$this->load->view('template', $data);	
	}
	function save() {

		$save = array('servicio_id'=>$this->input->post("servicio"),'nombre'=>$this->input->post("nombre"),'precio'=>$this->input->post("precio"));
		$this->load->model('paquetes_model');
		$paquete = $this->paquetes_model->save($save);
		if (!empty($paquete)) {
			$totales = $this->input->post("counter");
			for ($i=1; $i<=$totales; $i++) { 
				$var = $this->input->post("qty".$i);
				$var2 = $this->input->post("concepto".$i);
				$save_item = array('paquete_id'=>$paquete,'qty'=>$var,'nombre'=>$var2);
				$this->paquetes_model->saveitem($save_item);
			}
		}
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		redirect("paquetes");
	}
	function update() {
		$update = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('fases_model');
		$this->fases_model->update($update,$this->input->post("id"));
		redirect("fases");
	}
	function delete($id = NULL) {
		$this->load->model('paquetes_model');
		$this->paquetes_model->delete($id);
		redirect("paquetes");		
	}
}