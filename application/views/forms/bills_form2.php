<div id="bills_form" class="forms">

		
	<?php echo form_open('',array('id' => 'openingBills')); ?>	
	<table >
	<tr>
		<th colspan="2"><b>BILLS</b> </th>
		<th> <b>COINS</b>  </th>
	</tr>
	<tr>

		<td>P 20 <input type="number" name="20" pattern="\d*" min="0"> </td>
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
		<td colspan="2">Total: <input type="text" name="totalOpening" class="totalBills" min="0" readonly /></td>
		<td><?php echo form_submit(array('id'=>'amount_submit', 'name'=>'register_bills'), 'Register Amount'); ?></td>
	</tr>
		
	</table>
	<?php echo form_close(); ?>



</div>



<div id="bills_form" class="forms">	
	<?php echo form_open('',array('id' => 'openingBills')); ?>	
	<b>BILLS </b><br>
	P 20 <input type="number" class="bills" name="20" pattern="\d*" min="0">
	P 50 <input type="number" class="bills"  name="50" pattern="\d*" min="0">
	P 100 <input type="number" class="bills"  name="100" pattern="\d*" min="0"><br>
	P 200 <input type="number" class="bills"  name="200" pattern="\d*" min="0">
	P 500 <input type="number" class="bills"  name="500" pattern="\d*" min="0">
	P1000<input type="number" class="bills"  name="1000" pattern="\d*" min="0"><br>
	<br>
	Total Bills: <input type="text" name="totalCoins" class="totalBills" min="0" readonly /><br>

	<b> COINS </b><br>
	P1 <input type="number" class="coins" name="1" pattern="\d*" min="0">
	P5 <input type="number" class="coins" name="5" pattern="\d*" min="0">
	P10 <input type="number" class="coins" name="10" pattern="\d*" min="0"><br>
	Total Coins: <input type="text" name="totalCoins" class="totalCoins" min="0" readonly /><br>
	<?php echo form_submit(array('id'=>'amount_submit', 'name'=>'register_coins'), 'Register Amount'); ?>
	<?php echo form_close(); ?>

	
</div>