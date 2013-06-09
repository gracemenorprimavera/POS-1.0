<div id="note">WELCOME</div>

<div id="login_form" class="forms">
		
	<?php
		echo '<div class="error">'.$message.'</div>';
		echo form_open('pos/user_login');
			echo form_password(array('id'=>'login', 'name'=>'password','type'=>'password'), '','required').'<br>';
			echo form_submit(array('id'=>'btnlog', 'name'=>'submit'), 'Login');
		echo form_close();

	/*	echo anchor('pos/cashier_home', 'Cashier ');
		echo anchor('pos/opening', ' (Opening) ');
		echo anchor('pos/closing', ' (Closing) ').'<br>';
		echo anchor('pos/admin_home', 'Administrator'); */
	?>
</div>