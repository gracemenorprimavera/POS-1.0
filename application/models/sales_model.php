<?php
class Sales_model extends CI_Model {

	function get_transDetails($trans_id) {
		
		$this->db->from('customers');
		
		$this->db->join('credit', 'customers.customer_id = credit.customer_id');
		$this->db->join('credit_details', 'credit.credit_id = credit_details.credit_id');
		$this->db->where('credit.credit_id', $trans_id);
		
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

	function store_transDetails($trans_id, $item_id, $qty, $subtotal) {
		$this->db->insert('trans_details', array('trans_id'=> $trans_id,
			'item_code'=>$item_id,
			'division'=>NULL,
			'quantity'=>$qty,
			'price'=>$subtotal,
			'date'=>date('y-m-d')
			));
		$id = $this->db->insert_id();
		$query_str = "UPDATE trans_details set division=(select division from item where item_id=$item_id) where trans_id=$trans_id and item_code=$item_id";
		$this->db->query($query_str);
	}

	function getAll_sales() {
		$this->db->select('*');
		$this->db->group_by('date');
		$result = $this->db->get('transactions');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_sales_byDate($date) {
		$this->db->select('*');
		$this->db->where('date', $date);
		$result = $this->db->get('transactions');


		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_transID() {
		$this->db->select('trans_id');
		//$this->db->where('network', $network);
		$this->db->from('transactions');
		$query = $this->db->get();


		/*$this->db->select('load_balance');
		$this->db->from('eload');
		$query = $this->db->get();*/

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r)
				$balance = $r->trans_id;
		}
		else
			$balance = 0;

		return $balance;
	}

}
