<?php
class Expenses_model extends CI_Model {

	function store_expenses($status, $date, $desc, $amount) {
		//echo $date;
		return $this->db->insert('expenses', array('expense_id'=>NULL,
			'date_expense'=>$date,
			'amount' =>$amount,
			'description'=>$desc,
			'status'=>$status
			));
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
		return $this->db->insert('cashout', array('cashout_id'=>NULL,
			'date_cashout'=>$date,
			'status'=>$status,			
			'description'=>$desc,
			'amount' =>$amount
			));
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