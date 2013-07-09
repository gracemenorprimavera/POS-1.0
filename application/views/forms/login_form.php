<div id="note">WELCOME</div>
<div id="login_form" class="forms">
		
	<?php
		echo '<div class="error">'.$message.'</div>';

		echo form_open('pos/user_login');
			echo form_password(array('id'=>'login', 'name'=>'password','type'=>'password'), '','required').'<br>';
			//echo form_submit(array('class'=>'btnlog b1', 'name'=>'submit'), 'Cashier');
			//echo form_submit(array('class'=>'btnlog b2', 'name'=>'submit'), 'Manager');
			echo form_submit(array('class'=>'button', 'name'=>'submit'), 'Log in');
		echo form_close();

	?>
</div>