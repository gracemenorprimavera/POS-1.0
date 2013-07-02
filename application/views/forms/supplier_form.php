<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>

	<span><?php echo $msg; ?></span>
	<table>
		<?php echo form_open('incoming/add_supplier', array('onsubmit'=>"return confirm('Finalize Add Supplier?') ")); ?>	
		<tr><td>Supplier:</td><td><input type="text" name="supplierName" required /></td></tr>
		<tr><td></td><td><?php echo form_submit(array('name'=>'add_supplier', 'class'=>'button'), 'Add Supplier'); ?></td></tr>
		<?php echo form_close(); ?>
	</table>

