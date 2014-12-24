<?php
class Fuentes_model extends CI_Model {

	function getAll() {
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get('fuentes');
		return $query->result(); 
	}
	
	function save($new) {
		$query = $this->db->insert('fuentes', $new);
		return $this->db->insert_id();
	}
	function getById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('fuentes');
		return $query->row(); 
	}
	function update($update,$id) {
		$this->db->where('id', $id);
		$this->db->update('fuentes', $update); 
	}	
	function delete($id = NULL) {
		$this->db->where('id', $id);
		$this->db->delete('fuentes'); 
	}			
}