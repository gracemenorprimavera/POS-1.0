<div id="login_form" class="forms">
		
	<?php
		echo $message;

		echo form_open('pos/user_login');
			echo form_password('password', '').'<br>';
			echo form_submit('submit', 'Login');
		echo form_close();

		echo anchor('pos/cashier_home', 'Cashier ');
		echo anchor('pos/opening', ' (Opening) ');
		echo anchor('pos/closing', ' (Closing) ').'<br>';
		echo anchor('pos/admin_home', 'Administrator');
	?>
</div>