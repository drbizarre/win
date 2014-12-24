<?php
class Productos_model extends CI_Model {

	function getAllByType($tipo = NULL) {
		$this->db->where('tipo', $tipo);
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get('productos');
		return $query->result(); 
	}
	
	function save($new) {
		$query = $this->db->insert('productos', $new);
		return $this->db->insert_id();
	}
	function getById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('productos');
		return $query->row(); 
	}
	function update($update,$id) {
		$this->db->where('id', $id);
		$this->db->update('productos', $update); 
	}	
	function delete($id = NULL) {
		$this->db->where('id', $id);
		$this->db->delete('productos'); 
	}			
}