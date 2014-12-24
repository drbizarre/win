<?php
class Pendientes_model extends CI_Model {

	function getAll() {
		$this->db->where('pendientes.status', 'on');
		$this->db->order_by('id', 'DESC');
		$this->db->select('pendientes.id,clientes.nombre,pendientes.pendiente,pendientes.oportunidad,pendientes.fecha,pendientes.hora');
		$this->db->from('pendientes');
		$this->db->join('clientes', 'pendientes.cliente_id = clientes.id');
		$query = $this->db->get();
		return $query->result(); 
	}
	function getSolicitudesByClient($client) {
		$this->db->where('solicitudes.status', 'nodeclarado');
		$this->db->select('*,solicitudes.id as gastoid');
		$this->db->from('solicitudes');
		$this->db->join('productos', 'solicitudes.product_id = productos.id');
		$query = $this->db->get();
		return $query->result(); 
	}		
	function save($new) {
		$query = $this->db->insert('pendientes', $new);
		return $this->db->insert_id();
	}
	function getById($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('pendientes');
		return $query->row(); 
	}
	function getSaldoByUserId($id) {
		$this->db->where('user_id', $id);
		$query = $this->db->get('user');
		return $query->row(); 
	}

	function update($id,$update) {
		$this->db->where('id', $id);
		$this->db->update('pendientes', $update); 
	}	
	function delete($id = NULL) {
		//$this->db->where('id', $id);
		$this->db->delete('pendientes', array('id' => $id)); 
	}			
}