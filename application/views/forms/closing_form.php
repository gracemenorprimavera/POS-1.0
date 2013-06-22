<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>
<?php $user = $this->session->userdata('role'); ?>
<div id="bills_form" class="forms">

		
	<?php echo form_open('cashier/register_amount',array('id' => 'closingBills', 'onsubmit'=>"return confirm('Finalize Record?') ")); ?>	
	
	<table id="three" border="0px solid black">
	<tr>
		<th colspan="2" style="text-align:right">  
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
	              'value'       => date('y-m-d'),
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
		<th><b>BILLS</b> </th>
		<th> <b>COINS</b>  </th>
	</tr>
	<tr id="two">
		<td>P 20.00 <input type="number" name="20" pattern="\d*" min="0" id="one" class="bills"> </td>
		<td>P 0.50 <input type="number" name="0.5" pattern="\d*" min="0" class="coins"></td>
		
	</tr>
	<tr>
		<td>P 50.00 <input type="number" name="50" pattern="\d*" min="0" class="bills"> </td>
		<td>P 1.00 <input type="number" name="1" pattern="\d*" min="0" class="coins"></td>	
		
	</tr>
	
	<tr>
		<td>P 100.00 <input type="number" name="100" pattern="\d*" min="0" class="bills"> </td>
		<td>P 5.00 <input type="number" name="5" pattern="\d*" min="0" class="coins"></td>
		
	</tr>
		
	<tr>
		<td>P 200.00 <input type="number" name="200" pattern="\d*" min="0" class="bills"></td>
		<td>P 10.00 <input type="number" name="10" pattern="\d*" min="0" class="coins"></td>
	</tr>
	<tr><td>P 500.00 <input type="number" name="500" pattern="\d*" min="0" class="bills"> </td></tr>
	<tr><td>P 1000.00 <input type="number" name="1000" pattern="\d*" min="0" class="bills"></td></tr>
	<tr>
		<th >Bills Total: <input type="text" name="billsTotal" min="0" readonly /></th>
		<th >Coins Total: <input type="text" name="coinsTotal" min="0" readonly /></th>
	</tr>
	<tr>
		<th colspan="2" style="text-align:right">Total: <input type="text" name="total" class="totalBills" min="0" readonly /></th>
	</tr>
	<tr>
		<tr>

		<td colspan="2" style="text-align:right"><?php echo form_submit(array('class'=>'button','style'=>'width:220px;', 'name'=>'register_bills'), 'Register Amount'); ?>
			</td>
	</tr>
		<input type='hidden' name='registerMode' value='closing' />
	</table>
	<?php echo form_close(); ?>
</div>
