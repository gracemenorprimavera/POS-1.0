<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>


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
<!-- Employee: <input type="text" required><br> -->
Time-in <input type="time"><br>
Time-out <input type="time"><br>
<input type="submit" class="button">