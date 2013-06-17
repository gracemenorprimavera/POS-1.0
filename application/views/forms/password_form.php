<div id="password_form" class="forms">
	<?php
		echo $message;
		echo '<span>'.validation_errors().'</span>';

		echo form_open('admin/change_password', array('onsubmit'=>"return confirm('Finalize change password?') "));
			echo '<br>';
			echo 'Role: '.form_dropdown('role_dropdown', array('' => 'Select Role','cashier'=>'Cashier', 'manager'=> 'Manager', 'admin'=>'Administrator'), '', 'required').'<br>';
			echo '<br>Old Password: '.form_password('old_password', '', 'required').'<br>';
			echo 'New Password: '.form_password('new_password', '', 'required').'<br>';
			echo 'Confirm Password: '.form_password('conf_password', '', 'required').'<br>';
			echo form_submit(array('class'=>'button','id'=>'change_pwd', 'name'=>'submit', ), 'Change Password');
		echo form_close();
	?>

</div>