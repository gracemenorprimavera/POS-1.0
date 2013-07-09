<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>
	<span><?php echo $msg; ?></span>
	<table>
	<?php echo form_open('credits/add_customer', array('onsubmit'=>"return confirm('Add New Customer?') ")); ?>	
	<tr><td>Name:</td><td><input type="text" name="customerName" required /></td></tr>
	<tr><td></td><td><?php echo form_submit(array('name'=>'add_customer', 'class'=>'button', 'style'=>'width:150px;'), 'Add Customer'); ?></td></tr>
	<?php echo form_close(); ?>
	</table>
