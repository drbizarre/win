<?php
class Seguimientos_model extends CI_Model {

	function getAll() {
		$this->db->where('seguimientos.status', 'on');
		$this->db->order_by('id', 'DESC');
		$this->db->select('seguimientos.id,clientes.nombre,seguimientos.comentario,seguimientos.fecha,seguimientos.hora');
		$this->db->from('seguimientos');
		$this->db->join('clientes', 'seguimientos.cliente_id = clientes.id');
		$query = $this->db->get();
		return $query->result(); 
	}
	
	function savea($new) {
		$query = $this->db->insert('seguimientos', $new);
		return $this->db->insert_id();
	}
	function getById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('seguimientos');
		return $query->row(); 
	}
	function getAllByProspecto($id) {
		$this->db->order_by('id', 'DESC');
		$this->db->where('cliente_id', $id);
		$query = $this->db->get('seguimientos');
		return $query->result(); 
	}


	function update($id,$update) {
		$this->db->where('id', $id);
		$this->db->update('seguimientos', $update); 
	}	
	function delete($id = NULL) {
		//$this->db->where('id', $id);
		$this->db->delete('seguimientos', array('id' => $id)); 
	}			
}