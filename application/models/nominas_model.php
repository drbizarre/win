<?php
class Nominas_model extends CI_Model {

	function getAll() {
		$query = $this->db->get('nominas');
		return $query->result();  
	}
	function getAllGeneradas() {
		$query = $this->db->get('nominas_generadas');
		return $query->result();  
	}	
	function getAllByEmpresa($empresa = NULL) {
		$this->db->where('empresa', $empresa);
		$query = $this->db->get('nominas');
		return $query->result();  
	}	
	function getAllByEmpresaAndRes($empresa = NULL, $responsable = NULL) {
		$this->db->where('empresa', $empresa);
		$this->db->where('user_id', $responsable);
		$query = $this->db->get('nominas');
		return $query->result();  
	}
	
	function newpayroll($empresa = NULL, $responsable = NULL) {
		$query = $this->db->insert('nominas',array('user_id'=>$responsable,'empresa'=>$empresa,'status'=>'incompleta'));
		return $this->db->insert_id();
	}	
	function newemplbyday($data = NULL) {
		$query = $this->db->insert('nominas_xref_empleados',$data);
		return $this->db->insert_id();
	}	
	function newemplbyday2($data = NULL) {
		$query = $this->db->insert('dias_trabajados',$data);
		return $this->db->insert_id();
	}		
	function save($new) {
		$query = $this->db->insert('nominas_generadas', $new);
		return $this->db->insert_id();
	}
	function getById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('nominas');
		return $query->row(); 
	}

	function getcarrito($id) {
		$this->db->where('cotizacion', $id);
		$query = $this->db->get('cotizacion_xref_productos');
		return $query->result(); 
	}	
	function update($update,$id) {
		$this->db->where('id', $id);
		$this->db->update('nominas', $update); 
	}	
	function delete($id = NULL) {
		$this->db->where('id', $id);
		$this->db->delete('nominas_generadas'); 
	}			
	function deleteitems($id = NULL) {
		$this->db->where('nomina', $id);
		$this->db->delete('nominas_generadas'); 
	}		
	function deletec($id = NULL) {
		$this->db->where('id', $id);
		$this->db->delete('nominas'); 
	}			
	function deleteitemsc($id = NULL) {
		$this->db->where('nomina', $id);
		$this->db->delete('nominas_xref_empleados'); 
	}		
	function deletedias($id = NULL) {
		$this->db->where('nomina', $id);
		$this->db->delete('dias_trabajados'); 
	}			
}