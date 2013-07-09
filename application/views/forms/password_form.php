<?php echo '<ul id="otherlinks"><li>'.anchor('admin', 'Back').'</li></ul>'; ?>
<div id="password_form" class="forms">
	<?php
		echo $message;
		echo '<span>'.validation_errors().'</span>';
	?>
	<table style="text-align:right">
	<?php echo form_open('admin/change_password', array('onsubmit'=>"return confirm('Finalize change password?') "));
			$account = $this->pos_model->getAll_accounts();
			$options = array();
			$options[''] = 'Select one';
				if(isset($account )){
					foreach($account as $row){
						$options[$row->name] = $row->name;
					}
			
			}
			echo '<tr><td>Role: '.form_dropdown('role_dropdown', $options, '', 'autocomplete="off" required').'</td></tr>';
			//echo 'Role: '.form_dropdown('role_dropdown', array('' => 'Select Role','cashier'=>'Cashier', 'manager'=> 'Manager', 'admin'=>'Administrator'), '', 'required').'<br>';
			echo '<tr><td>Old Password: '.form_password('old_password', '', 'required').'</td></tr>';
			echo '<tr><td>New Password: '.form_password('new_password', '', 'required').'</td></tr>';
			echo '<tr><td>Confirm Password: '.form_password('conf_password', '', 'required').'</td></tr>';
			echo '<tr><td>'.form_submit(array('class'=>'button','id'=>'change_pwd', 'name'=>'submit', ), 'Change Password').'</td></tr>';
		echo form_close();
	?>
</table>
</div>