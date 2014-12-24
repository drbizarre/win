<?php

class Capturista extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
		
	}
	function index(){
		$empresa = $this->session->userdata('empresa');
		$responsable = $this->session->userdata('user_id');
		$r = $this->session->userdata('regiones');
		$data["regiones"] = $regiones = explode(",",$r);
		$data['module']   = 'capturista';
		$data['template'] = 'home_view';
		$this->load->model('nominas_model');
		$data["nominas"]  = $this->nominas_model->getAllByEmpresaAndRes($empresa,$responsable);
		$this->load->view('template', $data);			
	}
	function archivos() {		
		$empresa = $this->session->userdata('empresa');
		$responsable = $this->session->userdata('user_id');
		$r = $this->session->userdata('regiones');
		$data["regiones"] = $regiones = explode(",",$r);
		$data['module']   = 'capturista';
		$data['template'] = 'files_view';
		$this->load->model('user');
		$data["archivos"] = $this->user->getFiles($responsable);
		$this->load->model('tipos_model');
		$data["tipos"] = $this->tipos_model->getAll();
		
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
	function pdf($nomina = NULL){

		$this->load->model('nominas_model');
		$data = array(
			'nomina' => $nomina
		);	
		
		$data1["nomina"] = $this->nominas_model->getById($nomina);
		$this->nominas_model->update(array("pdf"=>1),$nomina);
 		$ch = curl_init();
  		curl_setopt ($ch, CURLOPT_URL, 'http://creactivoclientes.com/sowi/cotizaciones/invoice.php');
  		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
  		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  		$file_contents = curl_exec($ch);
		require_once 'dompdf/dompdf_config.inc.php';  
        $dompdf = new DOMPDF();
        $dompdf->load_html($file_contents);
        $dompdf->render();
        $ouput2 = $dompdf->output();
        file_put_contents('cotizaciones/Nomina'.$nomina.'.pdf', $ouput2);   
			/*$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from("alara@creactivo.mx", "Aldo Lara");
			$this->email->to($data1["cotizacion"]->correo);
			$this->email->subject("Cotización No.".$cotizacion."- Creactivo");
			$this->email->attach('cotizaciones/Cotizacion'.$cotizacion.'.pdf');	
			$this->email->message(utf8_encode($file_contents));
			$this->email->send(); */
  	}
	function generar() {
		$data['module'] = 'nominas';
		$data['template'] = 'new_view';
		$this->load->model('nominas_model');
		$this->load->model('empresas_model');
		$this->load->model('empleados_model');
		$nomina  = $this->input->post("nomina");
		$empresa = $this->input->post("empresa");

		$data["nomina"] = $this->input->post("nomina");		

		$data["fechas"] = $this->input->post("fechas");			
		$data["empresa1"] = $empresa;			
		$data["empresas"] = $this->empresas_model->getAll();	
		$responsable = $this->session->userdata('user_id');		
		$data["empleados"] = $this->empleados_model->getByEmpresaAndRes($empresa,$responsable);
		$total = 0;
		foreach ($data["empleados"] as $empleado) {
			//$empleado_dias = $this->input->post("dias".$empleado->id);
			$empleado_dias = $_POST["dias".$empleado->id];
			foreach ($empleado_dias as $dia) {
				$this->nominas_model->newemplbyday2(array('nomina'=>$nomina,'empleado'=>$empleado->id,'dia'=>$dia));
			}
			$empleadodatos = $this->empleados_model->getById($empleado->id);
			$this->nominas_model->newemplbyday(array('nomina'=>$data["nomina"],'empleado'=>$empleado->id,'salario'=>$empleadodatos->salario,'dias'=>count($empleado_dias)));
			$total = $total + ($empleadodatos->salario*count($empleado_dias));
		}
		$this->nominas_model->update(array("total"=>$total,"status"=>'completa'),$nomina);
		redirect("capturista");
		$this->load->view('template', $data);	
	}		
	function empleados() {
		$r = $this->session->userdata('regiones');
		$data["regiones"] = explode(",",$r);
		$data['module'] = 'capturista';
		$data['template'] = 'new_nomina_view';
		$this->load->model('nominas_model');
		$this->load->model('empresas_model');
		$this->load->model('empleados_model');
		$nomina  = $this->input->post("nomina");
		$empresa = $this->input->post("empresa");

		$responsable = $this->session->userdata('user_id');
		$fechas_string = $this->input->post("fechas");
		$fechas_split = explode("-",$fechas_string);
		$fecha_string_i = explode("/", $fechas_split[0]);
		$fecha_string_f = explode("/", $fechas_split[1]);
		$fechai = str_replace(" ", "", $fecha_string_i[2])."-".str_replace(" ", "", $fecha_string_i[0])."-".str_replace(" ", "", $fecha_string_i[1]);
		$fechaf = str_replace(" ", "", $fecha_string_f[2])."-".str_replace(" ", "", $fecha_string_f[0])."-".str_replace(" ", "", $fecha_string_f[1]);

		$from = @date_create($fechai);
		$to   = @date_create($fechaf);
		$diff = date_diff($to,$from);
		$incremental = $diff->format('%a');
		$rango = array();
		$rango[] = $fechai;
		for ($i=1; $i <= $incremental; $i++) { 
			$date_sum = date_add(@date_create($fechai), date_interval_create_from_date_string($i.' days'));
			$date_total = date_format($date_sum, 'Y-m-d');
			$rango[] = $date_total;

		}	
		$data["rangos"] = $rango;
		$this->nominas_model->update(array("empresa"=>$empresa,"fechai"=>str_replace(" ", "", $fechai),"fechat"=>$fechaf),$nomina);
		$data["nomina"] = $this->input->post("nomina");			
		$data["fechas"] = $this->input->post("fechas");			
		$data["empresa1"] = $empresa;			
		$data["empresas"] = $this->empresas_model->getAll();			
		$data["empleados"] = $this->empleados_model->getByEmpresaAndRes($empresa,$responsable);
		$this->load->view('template', $data);	
	}	
	function nuevo() {
		$data['module'] = 'capturista';
		$data['template'] = 'new_nomina_view';
		$this->load->model('nominas_model');
		$this->load->model('empresas_model');
		$this->load->model('empleados_model');
		$responsable = $this->session->userdata('user_id');
		$empresa = $this->session->userdata('empresa');
		$data["nomina"] = $this->nominas_model->newpayroll($empresa,$responsable);			
		$data["empresa1"] = $empresa;			
		$data["empresas"] = $this->empresas_model->getAll();			
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
		$this->load->model('nominas_model');
		$this->nominas_model->deletec($id);
		$this->nominas_model->deleteitemsc($id);
		$this->nominas_model->deletedias($id);
		redirect("capturista");		
	}
	
}