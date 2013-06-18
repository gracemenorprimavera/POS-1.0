
	<table>
	<?php echo form_open('credits/add_customer', array('onsubmit'=>"return confirm('Add New Customer?') ")); ?>	
	<tr><td>Name:</td><td><input type="text" name="customerName" required /></td></tr>
	<tr><td>Contact no:</td><td><input type="text" name="customerNum" /></td></tr>
	<tr><td>Address:</td><td><textarea name="customerAdd"></textarea></td></tr>
	<tr><td></td><td><?php echo form_submit(array('name'=>'add_customer', 'class'=>'button'), 'Add Customer'); ?></td></tr>
	<?php echo form_close(); ?>
	</table>