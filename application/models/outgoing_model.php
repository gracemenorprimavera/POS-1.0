<?php
class Outgoing_model extends CI_Model {

	function store_outItem($outgoing_id, $item_id, $qty, $price ) {
		$this->db->insert('out_item', array('outgoing_id'=>$outgoing_id,
			'item_code'=>$item_id,
			'quantity'=>$qty,
			'price'=>$price
			));
	}

	function getAll_outgoing() {
		$this->db->select('*');
		$this->db->group_by('date_out');
		$result = $this->db->get('outgoing');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}
	
	function getAll_outgoing_byDate($date) {
		$this->db->select('*');
		$this->db->where('date_out', $date);
		$result = $this->db->get('outgoing');


		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

}
