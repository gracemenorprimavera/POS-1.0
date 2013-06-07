<h1> ADD CUSTOMER </h1>	
	<table>
	<?php echo form_open(); ?>	
	<tr><td>Name:</td><td><input type="text" name="customerName" /></td></tr>
	<tr><td>Contact no:</td><td><input type="number" name="customerNum" /></td></tr>
	<tr><td>Address:</td><td><textarea name="customerAdd"></textarea></td></tr>
	<tr><td></td><td><?php echo form_submit('add_customer', 'Add Customer'); ?></td></tr>
	<?php echo form_close(); ?>
	</table>