<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>

<span><?php echo $msg; ?></span>
	
<?php echo form_open('admin/add_amount', array('onsubmit'=>"return confirm('Finalize Record?') ")); ?>
<?php
	
		$data1 = array(
	              'name'        => 'amountDate',
	              'id'          => '',
	              'type'		=> 'date',
	              //'value'       => date('m/d/Y'),
	              'maxlength'   => '',
	              'size'        => '',
	              'style'       => '',
				  'required'	=> 'required'
	    	);
	    
	 //echo '<label for="amountDate">Date </label>';
	//echo form_input($data1);
?>
	<table border="0px solid black" cellpadding="left">
		<tr>
			<td></td>
			<th style="text-align:right"><?php echo 'Date '.form_input($data1); ?></th>
		</tr>
		<tr> 
			
			<th colspan="2" style="text-align:right"> Opening Amount <input type="text" name="openSubTotal" required> </th>
		</tr>
		<tr>
			
			<th colspan="2" style="text-align:right"> Closing Amount <input type="text" name="closeSubTotal" required> </th>
		</tr>

		<tr>
			<td colspan="4" style="text-align:right"> <?php echo form_submit(array('class'=>'button') ,'Register') ?> </td>
		</tr>

	</table>

<?php echo form_close() ?>
