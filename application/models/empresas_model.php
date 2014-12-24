<?php
class Empresas_model extends CI_Model {

	function getAll() {
		$sql = "SELECT  * FROM empresas ORDER BY nombre ASC";
		$query = $this->db->query($sql);
		return $query->result(); 
	}
	function save($new) {
		$query = $this->db->insert('empresas', $new);
		return $this->db->insert_id();
	}

	function getById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('empresas');
		return $query->row(); 
	}
	function update($id,$update) {
		$this->db->where('id', $id);
		$this->db->update('empresas', $update); 
	}	
	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('empresas'); 
	}		
	
}