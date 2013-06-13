<div id="reports_form">
	<?php foreach($report as $d) { ?>
	<table border="0px solid black" >
	<tr> <th colspan="2"> Daily Sales Summary </th></tr>

	<tr>
		<td>Starting Bills and Coins: <input type="text" value="<?php echo $d->open_amt ?>"></td>
		<td>Ending Bills and Coints: <input type="text" value="<?php echo $d->close_amt ?>" ></td>
	</tr>
	<tr>
		<td>Cash Box Sales: <input type="text" value="<?php echo $d->cash_box ?>" ></td>
		<td>POS Sales: <input type="text" value="<?php echo $d->pos_sales ?>" ></td>
	</tr>
	<tr>
		<td>Discrepancy: <input type="text" value="<?php echo $d->discrepancy ?>" ></td>
		<td>Sales on Credit: <input type="text" value="<?php echo $d->credit ?>" ></td>
	</tr>
		
	<tr>
		<td>Incoming Stocks Amount:<input type="text" value="<?php echo $d->in_amount ?>" ></td>
		<td>Outgoing Stocks Amount: <input type="text" value="<?php echo $d->out_amount ?>" ></td>
	</tr>
	<tr>
		<td>Expenses: <input type="text"value="<?php echo $d->expenses ?>" ></td>
	
		<td>
		<table border="1px solid black">
			<tr>
				<th> Status </th>
				<th> Description </th>
				<th> Amount </th>
			</tr>
		<?php 
			foreach($expenses as $r) {
				echo '<tr>';
				echo '<td>'.$r->status.'</td><td>'.$r->description.'</td><td>'.$r->amount.'</td><br>';
				echo '</tr>';
			}
		?>
		</table>
		</td>
	</tr>
	<tr>
		<td>Load Balance: <input type="text" value="<?php echo $d->load_bal ?>" ></td>
		<td>Load Incoming Stocks:<input type="text" value="<?php echo $d->load_in ?>" ></td>
	</tr>

	<tr><th colspan="2">Sales by Division</th></tr>
	<tr>
		<td>Grocery:<input type="text" value="<?php echo $d->div_grocery ?>" ></td>
		<td>Poultry Supply:<input type="text" value="<?php echo $d->div_poultry ?>" ></td>
	</tr>
	<tr> 
		<td>Pet Supply:<input type="text" value="<?php echo $d->div_pet ?>" ></td>
		<td>Load:<input type="text" value="<?php echo $d->div_load ?>" ></td>
	</tr>

	</table>
	<?php } ?>

</div>
<?php echo anchor('pos/cashier_home', 'Home', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>