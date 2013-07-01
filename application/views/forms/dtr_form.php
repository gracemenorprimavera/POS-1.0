<div id="dtr" style="text-align:left">
<?php 
		$this->db->select('*');
		$this->db->from('employee');
		//$this->db->where('emp_id', $emp_id);
		$result = $this->db->get();
		if($result->num_rows() == 0)
			echo 'No Details Found';
		else {
?>
	<table border="1px solid black">
		<tr>
			<th>Name</th>
			<th>Date</th>
			<th>Time In</th>
			<th>Time Out</th>
			<th>Hours</th>
		</tr>
<?php
			foreach($result->result() as $r) {
				echo '<tr>';
				echo '<td>'.$r->name.'</td>';
				$this->db->select('*');
				$this->db->from('employee_dtr');
				$this->db->where('emp_id', $r->emp_id);
				$result2 = $this->db->get();
			
?>

<?php

		foreach($result2->result() as $d) {
			
			echo '<td>'.date('F d, Y', strToTime($d->date)).'</td>';
			echo '<td>'.$d->time_in.'</td>';
			echo '<td>'.$d->time_out.'</td>';
			echo '<td>'.$d->work_hours.'</td>';
			echo '</tr>';
		} // end of foreach($result2->result() as $d) {
?>

<?php } // end of foreach($result->result() as $r) 

	} // end of else 
?>
