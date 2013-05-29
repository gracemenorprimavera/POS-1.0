
<div id="closing_form" class="forms">
<h1> CLOSING </h1>
	<?php echo form_open(''); ?>	
	BILLS <br>
	P 20 <input type="number" name="twenty" min="0">
	P 50 <input type="number" name="fifty" min="0"><br>
	P 100 <input type="number" name="hund" min="0">
	P 200 <input type="number" name="thund" min="0"><br>
	P 500 <input type="number" name="fhund" min="0">
	P1000<input type="number" name="thou" min="0"><br>
	<br>
	COINS <br>
	P1 <input type="number" name="one" min="0">
	P5 <input type="number" name="five" min="0">
	P10 <input type="number" name="ten" min="0"><br>
	<?php echo form_submit('register_bills', 'Register Closing Amount'); ?>
	<?php echo form_close(); ?>

	<br><br>
	Ending Bills: <span> to be commuted after register closing amount </span><br>
	Ending Coins: <span> to be commuted after register closing amount </span><br>
	Total: <span> to be commuted after register closing amount </span>
</div>