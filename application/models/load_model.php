<?php
class Load_model extends CI_Model {

/* LOAD */
	function getload_balance($network) {
		$this->db->select('balance');
		$this->db->where('network', $network);
		$this->db->from('eload_balance');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $r)
				$balance = $r->balance;
		}
		else
			$balance = 0;

		return $balance;
	}

	function getAll_eload() {

		$this->db->from('eload');
		$this->db->order_by('date');
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

	function getAll_load() {
		$this->db->select('*');
		$this->db->group_by('date');
		$result = $this->db->get('eload');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function getAll_load_byDate($date, $network) {
		$this->db->select('*');
		$this->db->where('date', $date);
		$this->db->where('network', $network);
		$result = $this->db->get('eload');

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
