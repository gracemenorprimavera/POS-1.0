<div id="bills_form" class="forms">

		
	<?php echo form_open('pos/register_amount',array('id' => 'openingBills')); ?>	
	<table id="three">
	<tr>
		<th colspan="2"><b>BILLS</b> </th>
		<th> <b>COINS</b>  </th>
	</tr>
	<tr id="two">

		<td>P 20 <input type="number" name="20" pattern="\d*" min="0" id="one"> </td>
		<td>P 50 <input type="number" name="50" pattern="\d*" min="0"> </td>
		<td>P 100 <input type="number" name="100" pattern="\d*" min="0"> </td>
	</tr>
	<tr>
		<td>P 200 <input type="number" name="200" pattern="\d*" min="0"> </td>
		<td>P 500 <input type="number" name="500" pattern="\d*" min="0"></td>
		<td>P1000<input type="number" name="1000" pattern="\d*" min="0"></td>
	</tr>
	<tr>
		<td>P1 <input type="number" name="1" pattern="\d*" min="0"></td>
		<td>P5 <input type="number" name="5" pattern="\d*" min="0"></td>
		<td>P10 <input type="number" name="10" pattern="\d*" min="0"></td>
	</tr>
	<tr>
		<td colspan="2">Total: <input type="text" name="total" class="totalBills" min="0" readonly /></td>
		<td><?php echo form_submit(array('class'=>'button','id'=>'amount_submit', 'name'=>'register_bills'), 'Register Amount'); ?></td>
	</tr>
		
	</table>
	<?php echo form_close(); ?>
</div>

<?php echo anchor('pos/cashier_home', 'Home', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>