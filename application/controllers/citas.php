<?php



class Citas extends CI_Controller {



	function __construct() {

		parent::__construct();

		$this->auth->is_logged_in();

		//$this->auth->is_admin();

	}

	

	function index() {
		$data['module'] = 'citas';
		$data['template'] = 'home_view';
		$this->load->model('citas_model');
		$sucursal = $this->session->userdata('sucursal')->id;
		$data["citas"] = $this->citas_model->getAll($sucursal);
		$this->load->view('template', $data);		
	}

	function calendar() {
		$this->load->model('citas_model');
		$sucursal = $this->session->userdata('sucursal')->id;
		$data["citas"] = $this->citas_model->getAll($sucursal);
		$citas = array();
		foreach ($data["citas"] as $cita) {
			$title = $cita->label;
			$start = $cita->fecha_inicio."T".$cita->hora_inicio;
			$end = $cita->fecha_fin."T".$cita->hora_fin;
			$url = site_url("citas/".$cita->id);
			$new = array('title' => $title, 'start' => $start ,'end'=>$end,'url'=>$url,'allDay'=>FALSE);
			array_push($citas,$new);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($citas));
	}
	function upload() {
			$directory = './assets/img/uploaded'; 
		  	$config['upload_path'] = $directory ; /* NB! create this dir! */
		  	$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		  	$config['max_size']  = '0';
		  	$config['max_width']  = '0';
		  	$config['max_height']  = '0';
		  	$this->load->library('upload', $config);
		  	$upload = $this->upload->do_upload('qqfile');	
		  	if($upload){
		  		//$data_image = $this->upload->data();
		  		$return = array("success"=>true);
		  	}else{
		  		$return = array("success"=>false,"error"=>"npi");
		  	}

		  	echo json_encode($return);
	}

	function imprimir($id = NULL) {
		$this->load->model('clients_model');
		$this->load->model('servicios_model');
		$this->load->model('tarimas_model');
		$data["cliente"] = $this->clients_model->getClientById($id);
		$data["servicios"] = $this->servicios_model->getServicesForPrintByClient($id);
		$data["almacenajes"] = $this->tarimas_model->getAlmacenajesByClient($id);
		$data["tarimas"] = $this->tarimas_model->getTarimasByCliente($id);
		if ($data["cliente"]->esquema_cobranza=="variable") {
			$data["tarifas"] = $this->tarimas_model->getTarifasByCliente($id);
		}
		
		$this->load->view('clientes/print', $data);		
	}	
	function nueva() {
		$data['title'] = '';
		$data['module'] = 'citas';
		$data['template'] = 'create_view';
		
		$this->load->model('clients_model');
		$this->load->model('user');
		$this->load->model('procedimientos');
		$sucursal = $this->session->userdata('sucursal')->id;
		$data["doctores"] = $this->user->getUserByLevel(1,$sucursal);
		$data["cosmetologas"] = $this->user->getUserByLevel(2,$sucursal);
		$data["procedimientos"] = $this->procedimientos->getAll();
		$data["recepcionista"] = $this->session->userdata('user_id');
		$data["pacientes"] = $this->clients_model->getAllClients($sucursal);
		$data["sucursal"] = $sucursal;
		$this->load->view('template', $data);		
	}	
	function save() {
		
		$this->load->model('clients_model');
		$pacientito = $this->input->post("paciente");
		$cliente =  $this->clients_model->getClientById($pacientito);
		$new = array(
			'creada_por'=>$this->input->post("creada_por"),
			'sucursal'=>$this->input->post("sucursal"),
			'asunto'=>$this->input->post("asunto"),
			'paciente'=>$this->input->post("paciente"),
			'tipo'=>$this->input->post("tipo"),
			'atiende'=>$this->input->post("atiende"),
			'fecha_inicio'=>$this->input->post("fecha_inicio"),
			'hora_inicio'=>$this->input->post("hora_inicio"),
			'fecha_fin'=>$this->input->post("fecha_inicio"),
			'hora_fin'=>$this->input->post("hora_fin"),
			'status'=>"vigente",
			'comentarios'=>$this->input->post("comentarios_adicionales"),
			'label'=>$this->input->post("paciente_text")." ".$this->input->post("asunto_text")
			);
		$data['module'] = 'recepcionistas';
		$data['template'] = 'home_view';
		$this->load->model('citas_model');
		$data["citas"] = $this->citas_model->save($new);

			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from("contacto@dermatologica.org", "Dermatologica");
			$this->email->to($cliente->email_contacto,$cliente->nombre);

			$this->email->subject("Cita Dermatologica");
			$message = "
			<h3>Dermatologica</h3>
			<p>Hola <strong>".$this->input->post("paciente_text")."</strong>, hemos agendado una cita para el dia:<br><strong>".$this->input->post("fecha_inicio")."</strong> a las:<br><strong>".$this->input->post("hora_inicio")."</strong></p>
			<p>El motivo de la cita es: ".$this->input->post("asunto_text")." y seras atentido por ".$this->input->post("tipo").": ".$this->input->post("atiende_text")."</p>
			";
			$this->email->message($message);

			$this->email->send();

		$data["mensaje"] = "Nueva cita Agendada el: " .$this->input->post("fecha_inicio")." a las: ".$this->input->post("hora_inicio");
		$this->load->view('template', $data);	
	}	


	function editar($id = NULL) {

		$data['title'] = '';

		$data['module'] = 'admin';

		$data['template'] = 'edit_client_view';
		
		$this->load->model('clients_model');
		$this->load->model('tarimas_model');
		$data["cliente"] = $this->clients_model->getClientById($id);
		$data["tarifas"] = $this->tarimas_model->getTarifasByCliente($id);
		$this->load->view('template', $data);	

	}
	function eliminar($id = NULL) {

		$data['title'] = '';

		$data['module'] = 'admin';

		$data['template'] = 'clients_view';
		
		$this->load->model('clients_model');

		$this->clients_model->eliminar($id);
		
		$data["clientes"] = $this->clients_model->getAllClients();

		$this->load->view('template', $data);	
	}
	function update() {
		$id = $this->input->post("id");
		
		$update_cliente = array(
			'profesion'=>$this->input->post("profesion"),
			'recomendacion'=>$this->input->post("recomendacion"),
			'genero'=>$this->input->post("sexo"),
			'nombre_contacto'=>$this->input->post("contacto"),
			'apellido_paterno'=>$this->input->post("apellido_paterno"),
			'apellido_materno'=> $this->input->post("apellido_materno"),
			'email_contacto'=>$this->input->post("correo"),
			'telefono_contacto'=>$this->input->post("telefono"),
			'domicilio'=>$this->input->post("domicilio"),
			'fecha_ingreso'=>$this->input->post("fecha_ingreso"),
			'fecha_nacimiento'=>$this->input->post("fecha_nacimiento")			
			);

		$data['module'] = 'admin';

		$data['template'] = 'edit_client_view';
		
		$this->load->model('clients_model');
		$this->clients_model->updateClient($id,$update_cliente);
		$data["cliente"] =$this->clients_model->getClientById($id);
		
		$data["mensaje"] = "Datos actualizados correctamente";
		$this->load->view('template', $data);	

	}		

	//It is normal behavior for this function to display errors

	//To turn the errors off, go into the main index.php and switch the environment from 'production' to 'development'

	function panel($page) {

		if ($page == 'create') {

			$this->auth->create_user('admin');	

		} elseif ($page == 'update') {

			$this->auth->update_user('admin');	

		} elseif ($page == 'delete') {

			$this->auth->delete_user('admin');

		} elseif ($page == 'roles') {

			$this->auth->change_roles();

		} else {

			$data['title'] = 'Admin Panel | Envysea Codeigniter Authentication';

			$data['module'] = 'admin';

			$data['template'] = 'panel_view';



			$this->load->view('template', $data);

		}

	}

	

	//required callback -- codeigniter forces these to be in the controller -- this function is private

	function _check_username_exist_create($username) {

		$this->load->model('user');

		$result = $this->user->check_username_exist($username);

		

		if ($result == TRUE) {

			$this->form_validation->set_message('_check_username_exist_create', 'The username "'.$username.'" already exists! Please pick a different username.');

			return FALSE;

		} else {

			return TRUE;

		}

	}

	

	//required callback -- codeigniter forces these to be in the controller -- this function is private

	function _check_email_exist_create($email) {

		$this->load->model('user');

		$result = $this->user->check_email_exist($email);

		

		if ($result == TRUE) {

			$this->form_validation->set_message('_check_email_exist_create', 'The email "'.$email.'" already exists!');

			return FALSE;

		} else {

			return TRUE;

		}

	}	

	

	//required callback -- codeigniter forces these to be in the controller -- this function is private

	function _verify_password($password) {

		$this->load->model('user');

		

		$user_id = $this->session->userdata('user_id');

		

		$result = $this->user->verify_password($user_id, sha1($this->config->item('salty_salt').$password));

		

		if ($result == FALSE) {

			$this->form_validation->set_message('_verify_password', 'Incorrect password submitted.');

			return FALSE;

		} else {

			return TRUE;

		}

	}

	

	

}