<?php
class Incoming_model extends CI_Model {

/* ADD INCOMING */
	function store_deliveredItem($delivery_id, $item_id, $qty, $amount, $price ) {
		$this->db->insert('delivered_item', array('delivery_id'=>$delivery_id,
			'item_id'=>$item_id,
			'del_quantity'=>$qty,
			'del_price'=>$amount
			));
		$this->db->where('item_id', $item_id);	// should be item_id
		$this->db->update('item', array('cost'=>$price));
	}

	function add_item($item_id, $qty) {	
		$query = "UPDATE item set quantity=quantity+$qty WHERE item_id=$item_id";
		$this->db->query($query);
		//$this->db->where('item_code',$item_code);
			
		//$this->db->update('item', array('quantity'=>'quantity'-$qty));
	}

	function getAll_delivery() {

		$this->db->from('supplier');
		$this->db->join('delivery', 'supplier.supplier_id = delivery.supplier_id');
		$this->db->join('delivered_item', 'delivery.delivery_id = delivered_item.delivery_id');

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

	function getAll_supplier() {

		$result = $this->db->get('supplier');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_supplierID($customer) {

		$this->db->select('supplier_id');
		$this->db->from('supplier');
		$this->db->where('supplier_name', $customer);
		$result = $this->db->get();
		if($result->num_rows() == 1) {
			foreach ($result->result() as $r) {
				$id = $r->supplier_id;
			}
		}
		return $id;
	}

/* VIEW INCOMING */
	function getAll_incoming() {
		$this->db->select('*');
		$this->db->group_by('date_delivered');
		$result = $this->db->get('delivery');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_incoming_byDate($date) {
		/*$this->db->select('*');
		$this->db->where('date_delivered', $date);
		$result = $this->db->get('delivery');*/
		$this->db->from('delivery');
		$this->db->where('date_delivered', $date);
		$this->db->join('supplier', 'supplier.supplier_id = delivery.supplier_id');
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

	function getAll_incomingItems_byId($id) {
		$this->db->from('delivered_item');
		$this->db->where('delivery_id', $id);
		$this->db->join('item', 'item.item_id = delivered_item.item_id');
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



	function add_supplier($supplier){
		$arr = array('supplier_id'=>NULL,
			'supplier_name'=>$supplier,
			'manufacturer'=>NULL
		);
		$this->db->insert('supplier',$arr);
		if($this->db->affected_rows() > 0)
		{	
		return true;
		}
		else return false;
	}

}
