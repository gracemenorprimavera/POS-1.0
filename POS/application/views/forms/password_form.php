<div id="password_form" class="forms">
	<?php
		echo $message;
		echo validation_errors();
		echo form_open('admin/change_password');
			echo 'Role: '.form_dropdown('role_dropdown', array('empty' => ' ','cashier'=>'Cashier', 'admin'=>'Administrator')).'<br>';
			echo 'Old Password: '.form_password('old_password', '').'<br>';
			echo 'New Password: '.form_password('new_password', '').'<br>';
			echo 'Confirm Password: '.form_password('conf_password', '').'<br>';
			echo form_submit('submit', 'Change Password');
		echo form_close();
	?>
</div>