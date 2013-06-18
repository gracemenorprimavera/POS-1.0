<?php echo form_open(); ?>
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
	    
	 echo '<label for="amountDate">Delivery date </label>';
	echo form_input($data1);
?>
	<table border="0px solid black" cellpadding="left">
		<tr> 
			<td> Opening Bills<input type="text"> </td>
			<td> Opening Coins<input type="text"> </td>
			<th colspan="2" style="text-align:right"> Subotal<input type="text"> </th>
		</tr>
		<tr>
			<td> Closing Bills <input type="text"> </td>
			<td> Closing Coins<input type="text"> </td>
			<th colspan="2" style="text-align:right"> Subtotal <input type="text"> </th>
		</tr>

		<tr>
			<th colspan="4" style="text-align:right"> Total <input type="text"> </th>
		</tr>
		<tr>
			<td colspan="4" style="text-align:right"> <?php echo form_submit(array('class'=>'button') ,'Register') ?> </td>
		</tr>

	</table>

<?php echo form_close() ?>
