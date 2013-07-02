<div id="reports_form">
	<?php if(isset($report)) {
	 foreach($report as $d) { ?>
	<table border="0px solid black" style='margin-left:auto; margin-right:auto;'>
	<tr> <th colspan="2"> Daily Sales Summary </th></tr>
	<tr> <td colspan="2" style="text-align:center">
		<?php echo 'Date: '.date('F d, Y', strtoTime($report_date)); ?></td></tr>
	
	<tr>
		<td><br>Starting Bills and Coins: </td><td><?php echo $d->open_amt ?></td>
	</tr>

	<tr>
		<td>Ending Bills and Coints: </td><td><?php echo $d->close_amt ?></td>
	</tr>

	<tr>
		<td>Cash Box Sales: </td><td><?php echo $d->cash_box ?></td>
	</tr>

	<tr>
		<td>POS Sales: </td><td><?php echo $d->pos_sales ?></td>
	</tr>
	
	<tr>
		<td>Discrepancy: </td><td><?php echo $d->discrepancy ?></td>	
	</tr>

	<tr>
		<td>Sales on Credit: </td><td><?php echo $d->credit ?></td>
	</tr>

	<tr>
		<td>Sales on Payment: </td><td><?php //echo $d->credit ?></td>
	</tr>

	<tr>
		<td style="text-align:left;">
					
			<?php
			$credit = $this->pos_model->get_credit_byDate($this->uri->segment(4));  
			//$credit = $this->pos_model->get_creditDetails_byDate($this->uri->segment(4)); 
			if($credit) {
			?>

			<table border="1px solid black">
					
					<tr>
						<th> Quantity </th>
						<th> Item </th>
						<th> Price </th>
						<th> Subtotal </th>
					</tr>
					

			<?php
				foreach($credit as $r) {
					echo '<tr><td colspan="4" style="text-align:left;"><span>'.$r->customer_name.'</span></td></tr>';
									
				$credit_details = $this->pos_model->get_creditDetails_byId($r->credit_id); 
			?>


					<?php
				
					foreach($credit_details as $t) {
						echo '<tr>';
						echo '<td>'.$t->credit_quantity.'</td><td>'.$t->desc1.'</td><td>'.$t->retail_price.'</td><td>'.$t->price.'</td>';
						echo '</tr>';
					}
					?>
					<tr>
						<td style="text-align:right;" colspan="4"><?php echo 'Total Amount: <b>'.$r->amount_credit.'</b>'; ?></td>
					</tr>
				
			<?php } //end foreach($credit as $r) ?>
			</table>
			<?php } //end if($credit) ?>
		</td>
	</tr>
	
	<tr>
		<td>Incoming Stocks Amount:</td><td><?php echo $d->in_amount ?></td>
	</tr>
	<tr>
		<td>
			<?php 
			$incoming = $this->pos_model->getAll_incoming_byDate($this->uri->segment(4)); 
			if($incoming) {
			?>
			<table border="1px solid black">
				<tr>
					<th> Supplier </th>
					<th> Amount </th>
				</tr>
				<?php
			
				foreach($incoming as $r) {
					echo '<tr>';
					echo '<td>'.$r->supplier_name.'</td><td>'.$r->total_amount.'</td>';
					echo '</tr>';
				}
			
				?>
			</table>
			<?php } //end if($incoming) ?>
		</td>
	</tr>

	<tr>
		<td>Outgoing Stocks Amount: </td><td><?php echo $d->out_amount ?></td>
	</tr>
	
	<tr>
		<td>Expenses: </td><td><?php echo $d->expenses ?></td>
	</tr>

	<tr>
		<td>
			<?php if($expenses) { ?>
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
			<?php } ?>
		</td>	
	</tr>
	
	<tr>
		<td>Load Balance: </td><td><?php echo $d->load_bal ?></td>	
	</tr>

	<tr>
		<td>Load Incoming Stocks:</td><td><?php echo $d->load_in ?></td>
	</tr>
	
	<tr><th colspan="2">Sales by Division</th></tr>
	
	<tr>
		<td>Grocery:</td><td><?php echo $d->div_grocery ?></td>	
	</tr>
	
	<tr>
		<td>Poultry Supply:</td><td><?php echo $d->div_poultry ?></td>
	</tr>	
	
	<tr> 
		<td>Pet Supply:</td><td><?php echo $d->div_pet ?></td>	
	</tr>
	
	<tr>
		<td>Load:</td><td><?php echo $d->div_load ?></td>
	</tr>
	
	</table>
	<?php } }?>

</div>

