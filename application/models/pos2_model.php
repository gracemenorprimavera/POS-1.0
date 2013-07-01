<?php
class Pos2_model extends CI_Model {

	/* Contains queries related to amounts, employee, inventory, search and other */

/* AMOUNTS */
	function register_adminAmount($date, $opening, $closing) {
		return $this->db->insert('amount', array('amount_id'=>NULL,
					'date'=>$date,
					'opening_bills'=>0,
					'opening_coins'=>0,
					'opening_total'=>$opening,
					'closing_bills'=>0,
					'closing_coins'=>0,
					'closing_total'=>$closing,
					'personnel'=>$this->session->userdata('role') // $this->session->userdata('personnel')
				));
	}

	function register_amount($mode,$amount,$bills,$coins,$date) {
		if($mode == 'opening'){
			return $this->db->insert('amount', array('amount_id'=>NULL,
					'date'=>$date,
					'opening_bills'=>$bills,
					'opening_coins'=>$coins,
					'opening_total'=>$amount,
					'closing_bills'=>0,
					'closing_coins'=>0,
					'closing_total'=>0,
					'personnel'=>$this->session->userdata('role') // $this->session->userdata('personnel')
				));
			$this->session->set_userdata('open', true);
		}
		else if($mode  == 'closing'){
			return $this->db->where('date', $date);
			$this->db->update('amount', array(
					'closing_bills'=>$bills,
					'closing_coins'=>$coins,
					'closing_total'=>$amount
				));
		}
	}

	function getAll_amounts() {
		$result = $this->db->get('amount');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

/* EMPLOYEE */
	function getAll_employee() {

		$result = $this->db->get('employee');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_emp() {

		$this->db->select('name');
		$result = $this->db->get('employee');
		
		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

/* INVENTORY */
	function get_inventory($i){

		if($i==1) $this->db->select(' sum(quantity*retail_price) as inventory');
		elseif ($i==2) $this->db->select(' sum(quantity*cost) as inventory');
		
		$this->db->from('item');

		$result=$this->db->get();

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_itemsInventory() {
		$this->db->select('desc1, cost, retail_price, quantity');
		$this->db->from('item');

		$result=$this->db->get();

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

/* SEARCH */
	function get_search($search,$searchin) {
		if ($searchin == 'ps'){
			$this->db->like('item_code',$search);
			$this->db->or_like('bar_code',$search);
			$this->db->or_like('desc1',$search);
			$this->db->or_like('desc2',$search);
			$this->db->or_like('desc3',$search);
			$this->db->or_like('desc4',$search);
			$this->db->or_like('group',$search);
			$this->db->or_like('class1',$search);
			$this->db->or_like('class2',$search);
			$this->db->or_like('cost',$search);
			$this->db->or_like('retail_price',$search);
			$this->db->or_like('model_quantity',$search);
			$this->db->or_like('supplier_code',$search);
			$this->db->or_like('manufacturer',$search);
			$this->db->or_like('quantity',$search);
			$this->db->or_like('reorder_point',$search);
			$this->db->from('item');
		}else{
			$this->db->like($searchin,$search);
			$this->db->from('item');
		}

		$query = $this->db->get();

		return $query->result();
	}

	function get_search2($search,$mode) {
		if ($mode == 'itemDSearch'){
			$this->db->select('desc1,desc2,desc3,desc4, quantity');
			$this->db->like('item_code',$search);
			$this->db->or_like('bar_code',$search);
			$this->db->or_like('desc1',$search);
			$this->db->or_like('desc2',$search);
			$this->db->or_like('desc3',$search);
			$this->db->or_like('desc4',$search);
			$this->db->or_like('group',$search);
			$this->db->or_like('class1',$search);
			$this->db->or_like('class2',$search);
			$this->db->or_like('cost',$search);
			$this->db->or_like('retail_price',$search);
			$this->db->or_like('model_quantity',$search);
			$this->db->or_like('supplier_code',$search);
			$this->db->or_like('manufacturer',$search);
			$this->db->or_like('quantity',$search);
			$this->db->or_like('reorder_point',$search);
			$this->db->from('item');
		}
		else if($mode == 'priceDSearch'){
			$this->db->select('desc1, bar_code, retail_price');
			$this->db->like('bar_code',$search);
			$this->db->or_like('desc1',$search);
			$this->db->from('item');
		}
		else if($mode == 'custDSearch'){
			$this->db->like('customer_id',$search);
			$this->db->or_like('customer_name',$search);
			$this->db->or_like('contact_number',$search);
			$this->db->or_like('address',$search);
			$this->db->from('customers');
		}
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

/* OTHER */
	function fetch_table($table_name){
		 return $result = $this->db->get($table_name);	
	}























}