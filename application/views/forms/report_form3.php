<div id="reports_form">
	<?php if(isset($report)) {
	 foreach($report as $d) { ?>

	<table style="margin-left:100px;" >
	<tr> <th colspan="2"> Daily Sales Summary </th></tr>
	<tr> <td colspan="2" style="text-align:center">
		<?php echo 'Date: '.date('F d, Y', strtoTime($report_date)); ?></td>
	</tr>
	<tr><td style="padding-left:10px;">
	<table border="0px solid black" >	
	<tr>
		<td><br>Starting Bills and Coins: <input type="text" value="<?php echo $d->open_amt ?>"></td>
	</tr>
	<tr>	
		<td>Ending Bills and Coints: <input type="text" value="<?php echo $d->close_amt ?>" ></td>
	</tr>
	<tr>
		<td>Cash Box Sales: <input type="text" value="<?php echo $d->cash_box ?>" ></td>
	</tr>
	<tr>
		<td>POS Sales: <input type="text" value="<?php echo $d->pos_sales ?>" ></td>
	</tr>
	<tr>
		<td>Discrepancy: <input type="text" value="<?php echo $d->discrepancy ?>" ></td>
	</tr>
	<tr>
		<td>Sales on Credit: <input type="text" value="<?php echo $d->credit ?>" ></td>
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
		<td>Incoming Stocks Amount: <input type="text" value="<?php echo $d->in_amount ?>" ></td>
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
		<td>Outgoing Stocks Amount: <input type="text" value="<?php echo $d->out_amount ?>" ></td>
	</tr>

	</table>
</td>
<td style="padding-left:20px;">
	<table border="0px solid black" >
		<tr>
		<td>Cash Out: <input type="text"value="<?php echo $d->expenses ?>" ></td>
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
					echo '<td>'.$r->status.'</td><td>'.$r->description.'</td><td>'.$r->amount.'</td>';
					echo '</tr>';
				}
			
		?>
		</table>
		<?php } ?>
		</td>
	</tr>
	<tr>
		<td>Load Balance: <input type="text" value="<?php echo $d->load_bal ?>" ></td>
	</tr>
	<tr>
		<td>Load Incoming Stocks: <input type="text" value="<?php echo $d->load_in ?>" ></td>
	</tr>

	<tr><th colspan="2">Sales by Division</th></tr>
	<tr>
		<td>Grocery: <input type="text" value="<?php echo $d->div_grocery ?>" ></td>
	</tr>
	<tr>
		<td>Poultry Supply: <input type="text" value="<?php echo $d->div_poultry ?>" ></td>
	</tr>
	<tr> 
		<td>Pet Supply: <input type="text" value="<?php echo $d->div_pet ?>" ></td>
	</tr>
	<tr>
		<td>Load: <input type="text" value="<?php echo $d->div_load ?>" ></td>
	</tr>
	</table>
	</td></tr>
		<tr>
		<td colspan="2" style="text-align:center">
			<?php $user=$this->session->userdata('role'); ?>
			<?php echo form_open($user.'/pdf/'.$report_id."/".$report_date, array('onsubmit'=>"return confirm('Save Report?') ")); ?>
			<input class="button" style="width:150px;" type="submit" value="Export PDF" name="exportPDF"></input>
			</form> 
		</td> 
	</tr>
	</table>
	<?php } }?>

</div>

