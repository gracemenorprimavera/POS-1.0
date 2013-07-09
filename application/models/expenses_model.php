<?php
class Expenses_model extends CI_Model {

	function store_expenses($status, $date, $desc, $amount) {
		//echo $date;
		$this->db->insert('expenses', array('expense_id'=>NULL,
			'date_expense'=>$date,
			'time'=>'',
			'amount' =>$amount,
			'description'=>$desc,
			'status'=>$status
			));
		$id = $this->db->insert_id();	// get delivery ID 
		$qtr = "UPDATE expenses SET time=(select curtime()) where expense_id=$id";
		$this->db->query($qtr);
	}

	function getAll_expenses() {
		$this->db->select('*');
		$this->db->group_by('date_expense');
		$result = $this->db->get('expenses');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_expenses_byDate($date) {
		$this->db->select('*');
		$this->db->where('date_expense', $date);
		$result = $this->db->get('expenses');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}
/* CASH OUT*/	
	function store_cashout($status, $date, $desc, $amount) {
		//echo $date;
		$this->db->insert('cashout', array('cashout_id'=>NULL,
			'date_cashout'=>$date,
			'status'=>$status,			
			'description'=>$desc,
			'amount' =>$amount
			));
		$id = $this->db->insert_id();	// get delivery ID 
		$qtr = "UPDATE cashout SET time=(select curtime()) where cashout_id=$id";
		$this->db->query($qtr);
	}

	function getAll_cashout() {
		$this->db->select('*');
		$this->db->group_by('date_cashout');
		$result = $this->db->get('cashout');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_cashout_byDate($date) {
		$this->db->select('*');
		$this->db->where('date_cashout', $date);
		$result = $this->db->get('cashout');

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