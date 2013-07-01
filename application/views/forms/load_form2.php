<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>

<?php 
$user = $this->session->userdata('role');
	
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

?>
<span><?php echo $msg; ?></span>
<table>
	<?php echo form_open('admin/add_load', array('onsubmit'=>"return confirm('Record E-load?') ")); ?>	

	<tr>
		<td>Date: </td>
		<td ><?php echo form_input($data1); ?></td>
	</tr>
	<tr>
		<td>Network:</td>
		<td><?php echo form_dropdown('load_dropdown', array(''=>'Select Network',
		'globe'=>'Globe/TM', 'smart'=>"Smart/Talk N' Text", 'sun'=>'Sun', 'other'=>'Other Network'),'','required'		); ?></td>
	</tr>
	<tr>
		<td>Incoming Balance:</td>
		<td><input type="text" name="load_balance" required/></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:right"><?php echo form_submit(array('name'=>'add_load', 'class'=>'button'), 'Record'); ?></td>
	</tr>
	<?php echo form_close(); ?>
</table>
