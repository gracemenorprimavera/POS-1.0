<?php
class Outgoing_model extends CI_Model {

	function store_outItem($outgoing_id, $item_id, $qty, $price ) {
		$this->db->insert('out_item', array('outgoing_id'=>$outgoing_id,
			'item_id'=>$item_id,
			'out_quantity'=>$qty,
			'out_price'=>$price
			));
	}

	function subtract_item($item_id, $qty) {
		
		$query = "UPDATE item set quantity=quantity-$qty WHERE item_id=$item_id";
		$this->db->query($query);
		//$this->db->where('item_code',$item_code);
			
		//$this->db->update('item', array('quantity'=>'quantity'-$qty));
	}

	function add_item($item_id, $qty) {	
		$query = "UPDATE item set quantity=quantity+$qty WHERE item_id=$item_id";
		$this->db->query($query);
		//$this->db->where('item_code',$item_code);
			
		//$this->db->update('item', array('quantity'=>'quantity'-$qty));
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

	function getAll_outgoingItems_byId($id) {
		$this->db->from('out_item');
		$this->db->where('outgoing_id', $id);
		$this->db->join('item', 'item.item_id = out_item.item_id');
		$result = $this->db->get();		

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
