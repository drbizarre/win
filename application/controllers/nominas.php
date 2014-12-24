<?php

class Nominas extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->auth->is_logged_in();
	}

	function index(){
		$data['module'] = 'nominas';
		$data['template'] = 'home_view';
		$this->load->model('nominas_model');
		$data['nominas'] = $this->nominas_model->getAllGeneradas();
		/*$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		*/
		$this->load->view('template', $data);			
	}

	function carrito($cotizacion = NULL){
		$this->load->model('cotizacion_model');
		$data['carrito'] = $this->cotizacion_model->getcarrito($cotizacion);
		$html = "<table class=\"table\"><thead><tr><th>Qty</th><th>Concepto</th><th>Costo Unitario</th><th>Precio</th></tr></thead>";
		$html .= "<tbody>";
		$subtotal = 0;
		foreach ($data['carrito'] as $item) {
			$costo = $item->costo*$item->qty;
			$html .= "<tr><td>".$item->qty."</td><td>".$item->concepto."";
			$html .= (!empty($item->descripcion))?$item->descripcion:"";
            $html .= "</td><td>$".number_format($item->costo,2)."</td><td>$".number_format($costo,2)."</td>";
            $subtotal = $subtotal + $costo;
		}
		$iva = $subtotal * 0.16;
		$total = $subtotal + $iva;
		$html .= "</tbody>";
		$html .= "<tfoot><tr><td></td><td></td><td><strong>Subtotal</strong></td><td>$".number_format($subtotal,2)."</td>
                              </tr><tr><td></td><td></td><td><strong>IVA</strong></td><td>$".number_format($iva,2)."</td></tr><tr>
                                <td></td><td></td><td><strong>TOTAL</strong></td><td><strong>$".number_format($total,2)."</strong></td></tr></tfoot></table>";
	   echo $html;
	}

	function pdf($nomina = NULL){

		$this->load->model('nominas_model');
		$data = array(
			'nomina' => $nomina
		);	
		
		$data1["nomina"] = $this->nominas_model->getById($nomina);
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
		$data['module'] = 'nominas';
		$data['template'] = 'new_view';			
		$this->load->view('template', $data);	
	}
	function empleados() {
		$data['module'] = 'nominas';
		$data['template'] = 'new_view';
		$this->load->model('nominas_model');
		$this->load->model('empresas_model');
		$this->load->model('empleados_model');


		$fechas_string = $this->input->post("fechas");
		$fechas_split = explode("-",$fechas_string);
		$fecha_string_i = explode("/", $fechas_split[0]);
		$fecha_string_f = explode("/", $fechas_split[1]);
		$fechai = $fecha_string_i[2]."-".str_replace(" ", "", $fecha_string_i[0])."-".str_replace(" ", "", $fecha_string_i[1]);
		$fechaf = $fecha_string_f[2]."-".str_replace(" ", "", $fecha_string_f[0])."-".str_replace(" ", "", $fecha_string_f[1]);
		$this->nominas_model->save(array("fechai"=>str_replace(" ", "", $fechai),"fechat"=>$fechaf));

		redirect("nominas");
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
		$data["empleados"] = $this->empleados_model->getByEmpresa($empresa);
		$total = 0;
		foreach ($data["empleados"] as $empleado) {
			$empleado_dias = $this->input->post("dias".$empleado->id);
			$empleadodatos = $this->empleados_model->getById($empleado->id);
			$this->nominas_model->newemplbyday(array('nomina'=>$data["nomina"],'empleado'=>$empleado->id,'salario'=>$empleadodatos->salario,'dias'=>$empleado_dias));
			$total = $total + ($empleadodatos->salario*$empleado_dias);
		}
		$this->nominas_model->update(array("total"=>$total,"status"=>'completa'),$nomina);
		redirect("nominas");
		//$this->load->view('template', $data);	
	}	
	function additem($cotizacion = NULL,$tipo = NULL,$qty = NULL,$concepto = NULL,$descripcion = NULL,$costo = NULL,$id_tipo = NULL) {
		$save = array('cotizacion'=>$_GET["cotizacion"],'tipo'=>$_GET["tipo"],'qty'=>$_GET["qty"],'concepto'=>$_GET["concepto"],'descripcion'=>utf8_decode($_GET["descripcion"]),'costo'=>$_GET["costo"],'id_tipo'=>$_GET["id_tipo"]);
		$this->load->model('cotizacion_model');
		$this->cotizacion_model->newitemquote($save);
	}	

	function save() {
		$this->load->model('cotizacion_model');
		$data['carrito'] = $this->cotizacion_model->getcarrito($this->input->post("id"));
		$subtotal = 0;
		foreach ($data['carrito'] as $item) {
			$costo = $item->costo*$item->qty;
		    $subtotal = $subtotal + $costo;
		}
		$iva = $subtotal * 0.16;
		$total = $subtotal + $iva;
		$save = array('id_tipo_cliente'=>$this->input->post("cliente"),'descuento'=>$this->input->post("descuento"),'correo'=>$this->input->post("correo"),'status'=>'completa','subtotal'=>$subtotal,'iva'=>$iva,'total'=>$total,'atte'=>$this->input->post("user"));
		
		$this->cotizacion_model->update($save,$this->input->post("id"));
		$this->load->model('pendientes_model');
		$data["pendientes"] = $this->pendientes_model->getAll();		
		redirect("cotizacion");
	}

	function update() {
		$update = array('nombre'=>$this->input->post("nombre"));
		$this->load->model('fases_model');
		$this->fases_model->update($update,$this->input->post("id"));
		redirect("fases");
	}

	function delete($id = NULL) {
		$this->load->model('nominas_model');
		$this->nominas_model->delete($id);
		$this->nominas_model->deleteitems($id);
		
		redirect("nominas");		
	}
	function deleteg($id = NULL) {
		$this->load->model('nominas_model');
		$this->nominas_model->delete($id);
		//$this->nominas_model->deleteitems($id);
		
		redirect("nominas");		
	}	
}