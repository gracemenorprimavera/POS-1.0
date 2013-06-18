<?php $user = $this->session->userdata('role'); ?>
<div id="bills_form" class="forms">

		
	<?php echo form_open('cashier/register_amount',array('id' => 'openingBills', 'onsubmit'=>"return confirm('Finalize Record?') ")); ?>	
	
	<table id="three">
	<tr>
		<th colspan="3"> 
<?php
	if($user=='admin') {
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
	    }
	    else {
	    	$data1 = array(
	              'name'        => 'amountDate',
	              'id'          => '',
	              'value'       => date('m/d/Y'),
	              'maxlength'   => '',
	              'size'        => '',
	              'style'       => '',
				  'required'	=> 'required',
				  'readonly'	=> 'readonly'
	    	);
	    }
	echo '<label for="amountDate">Date </label>';
	echo form_input($data1);
?>

		</th>
	</tr>
	<tr>
		<th colspan="2"><b>BILLS</b> </th>
		<th> <b>COINS</b>  </th>
	</tr>
	<tr id="two">

		<td>P 20 <input type="number" name="20" pattern="\d*" min="0" id="one" class="bills"> </td>
		<td>P 200 <input type="number" name="200" pattern="\d*" min="0" class="bills"> </td>
		<td>P1 <input type="number" name="1" pattern="\d*" min="0" class="coins"></td>
	</tr>
	<tr>
		<td>P 50 <input type="number" name="50" pattern="\d*" min="0" class="bills"> </td>
		
		<td>P 500 <input type="number" name="500" pattern="\d*" min="0" class="bills"></td>
		<td>P5 <input type="number" name="5" pattern="\d*" min="0" class="coins"></td>
		
	</tr>
	<tr>
		<td>P 100 <input type="number" name="100" pattern="\d*" min="0" class="bills"> </td>
		<td>P1000<input type="number" name="1000" pattern="\d*" min="0" class="bills"></td>
		
		<td>P10 <input type="number" name="10" pattern="\d*" min="0" class="coins"></td>
	</tr>
	<tr>
		<td colspan="2">Bills Total: <input type="text" name="billsTotal" min="0" readonly /></td>
		<td colspan="2">Coins Total: <input type="text" name="coinsTotal" min="0" readonly /></td>
		<td colspan="2">Total: <input type="text" name="total" class="totalBills" min="0" readonly /></td>
	</tr>
	<tr>
		<td></td><td></td>	
		<td><?php echo form_submit(array('class'=>'button','id'=>'amount_submit', 'name'=>'register_bills'), 'Register Amount'); ?></td>
	</tr>
		<input type='hidden' name='registerMode' value='opening' />
	</table>
	<?php echo form_close(); ?>
</div>

<?php echo anchor('#', 'Home', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>