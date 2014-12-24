<?php
class Roles_model extends CI_Model {

	function getAll() {
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get('roles');
		return $query->result(); 
	}
	
	function save($new) {
		$query = $this->db->insert('roles', $new);
		return $this->db->insert_id();
	}
	function getById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('roles');
		return $query->row(); 
	}
	function update($update,$id) {
		$this->db->where('id', $id);
		$this->db->update('roles', $update); 
	}	
	function delete($id = NULL) {
		$this->db->where('id', $id);
		$this->db->delete('roles'); 
	}			
}