
<div id="closing_form" class="forms">
<h1> CLOSING </h1>
	<?php echo form_open('',array('id' => 'closingBills')); ?>	
	BILLS <br>
	P 20 <input type="number" name="20" pattern="\d*" min="0">
	P 50 <input type="number" name="50" pattern="\d*" min="0"><br>
	P 100 <input type="number" name="100" pattern="\d*" min="0">
	P 200 <input type="number" name="200" pattern="\d*" min="0"><br>
	P 500 <input type="number" name="500" pattern="\d*" min="0">
	P1000<input type="number" name="1000" pattern="\d*" min="0"><br>
	<br>
	COINS <br>
	P1 <input type="number" name="1" pattern="\d*" min="0">
	P5 <input type="number" name="5" pattern="\d*" min="0">
	P10 <input type="number" name="10" pattern="\d*" min="0"><br>
	<span>TOTAL</span><input type="text" name="totalClosing" class="totalBills" min="0" readonly /><br>
	<?php echo form_submit('register_bills', 'Register Closing Amount'); ?>
	<?php echo form_close(); ?>

	<br><br>
	Ending Bills: <span> to be commuted after register closing amount </span><br>
	Ending Coins: <span> to be commuted after register closing amount </span><br>
	Total: <span> to be commuted after register closing amount </span>
</div>