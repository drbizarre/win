<?php
class Paquetes_model extends CI_Model {

	function getAll() {
		$this->db->order_by('nombre', 'ASC');
		$query = $this->db->get('paquetes');
		return $query->result(); 
	}
	
	function save($new) {
		$query = $this->db->insert('paquetes', $new);
		return $this->db->insert_id();
	}
	function saveitem($new) {
		$query = $this->db->insert('items_per_package', $new);
		return $this->db->insert_id();
	}	
	
	function getById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('fases');
		return $query->row(); 
	}
	function getitems($paquete) {
		$this->db->where('items_per_package.paquete_id', $paquete);
		$this->db->select('productos.nombre,items_per_package.qty');
		$this->db->from('items_per_package');
		$this->db->join('productos', 'items_per_package.nombre = productos.id');
		$query = $this->db->get();		
		return $query->result(); 
	}	
	function update($update,$id) {
		$this->db->where('id', $id);
		$this->db->update('fases', $update); 
	}	
	function delete($id = NULL) {
		$this->db->where('id', $id);
		$this->db->delete('paquetes'); 
	}			
}