<?php
class Credits_model extends CI_Model {

	function getAll_customers() {
		$this->db->select('*');
		$this->db->group_by('customer_name');
		$result = $this->db->get('customers');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_credits() {
		$this->db->select('*');
		$this->db->group_by('date');
		$result = $this->db->get('credit');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_credits_byDate($date) {
		/*$this->db->select('*');
		$this->db->where('date', $date);
		$result = $this->db->get('credit'); */
		$this->db->from('credit');
		$this->db->where('date', $date);
		$this->db->join('customers', 'customers.customer_id = credit.customer_id');
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

	function get_creditDetails_byDate($date) {
		
		$this->db->from('credit_details');
		$this->db->where('credit_details.date', $date);
		//$this->db->join('item', 'credit_details.item_id = item.item_id');
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

	function get_customerDetails($customer_id) {
		
		$this->db->from('customers');
		$this->db->where('customers.customer_id', $customer_id);
		$this->db->join('credit', 'customers.customer_id = credit.customer_id');
		//$this->db->join('trans_details', 'transactions.trans_id = trans_details.trans_id');
		
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

	function get_customerID($customer) {

		$this->db->select('customer_id');
		$this->db->from('customers');
		$this->db->where('customer_name', $customer);
		$result = $this->db->get();
		if($result->num_rows() == 1) {
			foreach ($result->result() as $r) {
				$id = $r->customer_id;
			}
		}

		return $id;
	}

	function store_creditDetails($trans_id, $item_id, $qty, $subtotal) {
		$this->db->insert('credit_details', array('credit_id'=> $trans_id,
			'item_code'=>$item_id,
			'division'=>NULL,
			'quantity'=>$qty,
			'price'=>$subtotal,
			'date'=>date('y-m-d')
			));
		$query_str = "UPDATE credit_details set division=(select division from item where item_id='$item_id') where trans_id=$trans_id and item_code=$item_id";
		$this->db->query($query_str);
	}

	function getAll_customers2() {
	
		$this->db->select('customer_name as label,customer_id as customer_id');
		$this->db->from('customers');
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

	function update_balance($customer_id, $total, $credit_id) {
		$query = "UPDATE customers set balance=balance+$total WHERE customer_id=$customer_id";
		$this->db->query($query);	


		$query1 = "UPDATE credit set credit_balance=(SELECT balance from customers WHERE customer_id=$customer_id) WHERE credit_id=$credit_id";
		$this->db->query($query1);
	}

	function record_payment($id, $amount) {

		$this->db->insert('credit', array('credit_id'=>NULL,  
				'customer_id'=>$id,
				'date'=>date('y-m-d'),
				'status'=>'payment',
				'amount_credit'=>0,
				'amount_paid'=>$amount,
				'credit_balance'=>0
				));

		$credit_id = $this->db->insert_id(); 
		//echo $credit_id;
			// update balance
		$query = "UPDATE customers set balance=balance-$amount WHERE customer_id=$id";
		$this->db->query($query);	

		$query1 = "UPDATE credit set credit_balance=(SELECT balance from customers WHERE customer_id=$id) WHERE credit_id=$credit_id";
		$this->db->query($query1);
	}

	function get_customerBalance($customer) {
		$this->db->select('balance');
		$this->db->where('customer_id', $customer);
		$this->db->from('customers');
		$query = $this->db->get();


		/*$this->db->select('load_balance');
		$this->db->from('eload');
		$query = $this->db->get();*/

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r)
				$balance = $r->balance;
		}
		else
			$balance = 0;

		return $balance;
	}

	function get_customerName($customer) {
		$this->db->select('customer_name');
		$this->db->where('customer_id', $customer);
		$this->db->from('customers');
		$query = $this->db->get();


		/*$this->db->select('load_balance');
		$this->db->from('eload');
		$query = $this->db->get();*/

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r)
				$balance = $r->customer_name;
		}
		else
			$balance = 0;

		return $balance;
	}
	


}
