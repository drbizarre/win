<?php
class empleados_model extends CI_Model {

	function getAll() {		
		$this->db->select('empleados.id,empleados.nombre, empleados.creacted_date,empresas.nombre as empresa,');
		$this->db->from('empleados');
		$this->db->join('empresas', 'empleados.empresa = empresas.id');		
		$this->db->order_by('empleados.nombre', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	function getFiles() {		
		$this->db->select('archivos.id, archivos.archivo, tipos_archivos.nombre as tipo');
		$this->db->from('archivos');
		$this->db->join('tipos_archivos', 'tipos_archivos.id = archivos.tipo_archivo');		
		$this->db->order_by('archivos.id', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}	
	
	function getAllWe() {		
		$this->db->select('empleados.id,empleados.nombre, empleados.creacted_date,empresas.nombre as empresa,');
		$this->db->from('empleados');
		$this->db->join('empresas', 'empleados.empresa = empresas.id');		
		$this->db->order_by('empleados.nombre', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}	


	function getByEmpresa($id) {		
		$this->db->order_by('nombre', 'ASC');
		$this->db->where('empresa', $id);
		$query = $this->db->get('empleados');
		return $query->result(); 
	}
	function getByEmpresaAndRes($id = NULL, $responsable = NULL) {		
		$this->db->order_by('nombre', 'ASC');
		$this->db->where('empresa', $id);
		$this->db->where('user_id', $responsable);
		$query = $this->db->get('empleados');
		return $query->result(); 
	}	
	
	function save($new) {
		$query = $this->db->insert('empleados', $new);
		return $this->db->insert_id();
	}
	function save_archivo($new) {
		$query = $this->db->insert('archivos', $new);
		return $this->db->insert_id();
	}

	function getById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('empleados');
		return $query->row(); 
	}

	function update($id,$update) {
		$this->db->where('id', $id);
		$this->db->update('empleados', $update); 
	}	
	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('empleados'); 
	}		
	function delete_archivo($id) {
		$this->db->where('id', $id);
		$this->db->delete('archivos'); 
	}		
	
}