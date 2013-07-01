<?php
class Reports_model extends CI_Model {

/* REPORTS */
	function record_report() {

				
		$date = date('y-m-d');	// date
		//$date = '2013-06-21';
		$this->db->insert('daily_report', array('report_id'=>NULL,
			'date'=>$date
			));
		$id = $this->db->insert_id();

		$q="UPDATE daily_report set open_amt=(SELECT opening_total from amount where date='$date') where report_id=$id";
		$this->db->query($q);
		
		$q="UPDATE daily_report set close_amt=(SELECT closing_total from amount where date='$date') where report_id=$id";
		$this->db->query($q);
		
		$q = "UPDATE daily_report set cash_box=close_amt-open_amt where report_id=$id";
		$this->db->query($q);
		
		$q = "UPDATE daily_report set pos_sales=(SELECT SUM(total_amount) from transactions where trans_date='$date' group by trans_date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set discrepancy=cash_box-pos_sales where report_id=$id";
		$this->db->query($q);
		
		$q = "UPDATE daily_report set expenses=(SELECT SUM(amount) from expenses where date_expense='$date' group by date_expense) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set in_amount=(SELECT SUM(total_amount) from delivery where date_delivered='$date' group by date_delivered) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set out_amount=(SELECT SUM(amount) from outgoing where date_out='$date' group by date_out) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set credit=(SELECT SUM(amount_credit) from credit where date='$date' and status='credit' group by date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set load_bal=0 where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set load_in=0 where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_grocery=(SELECT SUM(price) from trans_details where date='$date' and division ='grocery' group by date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_poultry=(SELECT SUM(price) from trans_details where date='$date' and division ='poultry' group by date)  where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_pet=(SELECT SUM(price) from trans_details where date='$date' and division ='pet' group by date) where report_id=$id";
		$this->db->query($q);

		$q = "UPDATE daily_report set div_load=(SELECT SUM(price) from trans_details where date='$date' and division ='load' group by date) where report_id=$id";
		$this->db->query($q);
	}

	function getAll_reports() {
		$result = $this->db->get('daily_report');

		if($result->num_rows() > 0) {
			foreach ($result->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else 
			return false;
	}

	function get_dailyReport($report_id) {
		$this->db->select('*');
		$this->db->where('report_id', $report_id);
		$result = $this->db->get('daily_report');

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