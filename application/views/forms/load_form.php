
<?php
$user = $this->session->userdata('role');
	
	    
	    	$data1 = array(
	              'name'        => 'loadDate',
	              'id'          => '',
	              'value'       => date('y-m-d'),
	              'maxlength'   => '',
	              'size'        => '',
	              'style'       => '',
				  //'required'	=> 'required',
				  'readonly'	=> 'readonly'
	    	);
	    

?>
	<?php $result = $this->db->get('eload_balance'); ?>
	<?php
		$load = array();
		foreach($result->result() as $d) {
			$load[] = $d->balance;
		}
	?>
	<table border="1px solid black" cellpadding="6">
		<tr>
			<th colspan="2">Load Balance</th>
		</tr>
		<tr>
			<td>Globe/TM</td>
			<td><?php echo $load[0]; ?></td>
		</tr>
		<tr>
			<td>Smart/TNT</td>
			<td><?php echo $load[1]; ?></td>
		</tr>
		<tr>
			<td>Sun</td>
			<td><?php echo $load[2]; ?></td>
		</tr>
	</table>
<br><br>
	<table>
	<?php echo form_open('cashier/add_load', array('onsubmit'=>"return confirm('Record E-load?') ")); ?>	


	<tr>
		<td>Date: </td>
		<td ><?php echo form_input($data1); ?></td>
	</tr>
	<tr>
		<td>Network:</td>
		<td><?php echo form_dropdown('load_dropdown', array(''=>'Select Network',
		'globe'=>'Globe/TM', 'smart'=>"Smart/Talk N' Text", 'sun'=>'Sun', 'other'=>'Other Network'),'','required'		); ?></td></tr>
	<tr>
	
		<td>Amount:</td>
		<td><input type="text" name="load_amount" required/></td></tr>
	<tr>
		<td>Load Balance:</td>
		<td><input type="text" name="load_balance" required/></td></tr>
	
		
		<td colspan="2" style="text-align:right"><?php echo form_submit(array('name'=>'addload', 'class'=>'button'), 'Record'); ?></td></tr>
	<?php echo form_close(); ?>
	</table>
