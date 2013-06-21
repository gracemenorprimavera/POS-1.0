<div id="note">WELCOME</div>
<div id="login_form" class="forms">
		
	<?php
		echo '<div class="error">'.$message.'</div>';

		echo form_open('pos/user_login');
			echo form_password(array('id'=>'login', 'name'=>'password','type'=>'password'), '','required').'<br>';
			echo form_submit(array('id'=>'btnlog', 'name'=>'submit'), 'Login');
		echo form_close();

	?>
</div>