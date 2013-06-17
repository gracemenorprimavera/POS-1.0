<?php
$user = $this->session->userdata('role');
	if($user=='admin') {
			$data1 = array(
	              'name'        => 'loadDate',
	              'id'          => '',
	              'type'		=> 'date',
	              //'value'       => date('m/d/Y'),
	              'maxlength'   => '',
	              'size'        => '',
	              'style'       => '',
				  'required'	=> 'required'
	    	);
	    }
	    else {
	    	$data1 = array(
	              'name'        => 'loadDate',
	              'id'          => '',
	              'value'       => date('y-m-d'),
	              'maxlength'   => '',
	              'size'        => '',
	              'style'       => '',
				  'required'	=> 'required',
				  'readonly'	=> 'readonly'
	    	);
	    }

?>
	<table>
	<?php echo form_open($user.'/add_load', array('onsubmit'=>"return confirm('Record E-load?') ")); ?>	
	<tr>
		<td>Date: </td>
		<td ><?php echo form_input($data1); ?></td>
	</tr>
	<tr>
		<td>Network:</td>
		<td><?php echo form_dropdown('load_dropdown', array(''=>'Select',
		'globe'=>'Globe', 'tm'=>'TM', 'smart'=>'Smart', 'tnt'=>'Talk N Text', 'sun'=>'Sun', 'other'=>'Other Network'),'','required'		); ?></td></tr>
	<tr>
	<?php if($user=='cashier') {?>
		<td>Amount:</td>
		<td><input type="text" name="load_amount" required/></td></tr>
	<tr>
		<td>Load Balance:</td>
		<td><input type="text" name="load_balance" required/></td></tr>
	<tr>
	<?php } else { ?>
		<td>Wallet:</td>
		<td><input type="text" name="load_amount" required/></td></tr>
	<?php } ?>
	
		
		<td colspan="2"><?php //echo form_submit(array('name'=>'add_load', 'class'=>'button'), 'Record'); ?></td></tr>
	<?php echo form_close(); ?>
	</table>
<?php echo anchor($user, 'Home', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>