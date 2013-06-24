<div id="dtr" style="text-align:left">
<?php 
	if($this->session->userdata('emp_login')) { 
		$emp_id = $this->session->userdata('empid'); 
		$emp_name = $this->session->userdata('empname'); 

		echo '<br>EMPLOYEE NAME: '.$emp_name;
		echo '<br>EMPLOYEE ID: '.$emp_id;
		echo '<br>DATE: '.date('F d, Y');
		echo '<br>TIME: '.date("G:i:s ");;
		echo '<br><br>';
		//echo $emp_id.$emp_name;
		echo '<button style="height:70px; width:100px" id="inEmp"> In </button>';
		echo '<button style="height:70px; width:100px" id="outEmp"> Out </button>';
		echo '<br><br><br>';

		$this->db->select('*');
		$this->db->from('employee_dtr');
		$this->db->where('emp_id', $emp_id);
		$result = $this->db->get();
		if($result->num_rows() == 0)
			echo 'No Details Found';
		else {
?>
	<table border="1px solid black">
		<tr>
			<th>Date</th>
			<th>Time In</th>
			<th>Time Out</th>
			<th>Hours</th>
		</tr>
<?php

		foreach($result->result() as $r) {
			echo '<tr>';
			echo '<td>'.date('F d, Y', strToTime($r->date)).'</td>';
			echo '<td>'.$r->time_in.'</td>';
			echo '<td>'.$r->time_out.'</td>';
			echo '<td>'.$r->work_hours.'</td>';
			echo '</tr>';
		}
?>

	</table>

<?php } ?>
	
	<input type='button' id='logoutEmp' value='Log-out' class='button' />
	

<?php } else { ?>
	Employee Log-in<br>
	
	Username <input type="text" name="username" id="empuName" /><br>
	Password <input type="password" name="password" id="empPwd" /><br>
	<input type='button' id='loginEmp' value='Log-in' class='button' />

<?php } ?>


</div>

<!--
<?php $data1 = array(
	              'name'        => 'dtrDate',
	              'id'          => '',
	              'value'       => date('y-m-d'),
	              'maxlength'   => '',
	              'size'        => '',
	              'style'       => '',
				  'required'	=> 'required',
				  'readonly'	=> 'readonly'
	    	); 
	echo form_input($data1);
?><br>
	
<?php
	$employee = $this->pos_model->getAll_employee();
$data = array();
	$data[''] = 'Please Select';
	if(isset($employee)){
		foreach($employee as $row){
			$data[$row->name] = $row->name;
			//echo $row->emp_id;
		}
	}
	//else echo 'no';	
	echo 'Employee Name '.form_dropdown('employee', $data,'','id="employee" autocomplete="off" required');
		
?>
<br>
Employee: <input type="text" required><br>
Time-in <input type="time"><br>
Time-out <input type="time"><br>
<input type="submit" class="button">-->