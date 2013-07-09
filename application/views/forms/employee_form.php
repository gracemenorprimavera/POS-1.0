<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; 
?>

<div id="employee_form" class="">
	<?php
		echo $message;
		echo '<span>'.validation_errors().'</span>';

		echo form_open('admin/add_employee', array('onsubmit'=>"return confirm('Finalize add employee?') "));
			echo '<br>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;Name: '.form_input('name', '', 'required').'<br>';
			echo 'Position: '.form_dropdown('role_dropdown', array('' => 'Select Position','cashier'=>'Cashier', 'employee'=> 'Employee'), '', 'required').'<br>';
			echo 'Password: '.form_password('emp_password', '', 'required').'<br>';
			echo form_submit(array('name'=>'addEmp_submit', 'class'=>'button', 'style'=>'width:150px;'), 'Add Employee');
		echo form_close();
	?>

</div>
