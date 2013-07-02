<div id="reports_form">
	<?php if(isset($report)) {
	 foreach($report as $d) { ?>
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
	</tr>
	<tr>
		<td>Sales on Credit: <input type="text" value="<?php echo $d->credit ?>" ></td>
		<td>
			<?php 
			$credit = $this->pos_model->get_creditDetails_byDate($this->uri->segment(4)); 
			if($credit) {
			?>
			<table border="1px solid black">
				<tr>
					<th> Credit ID </th>
					<th> Item </th>
					<th> Price </th>
				</tr>
				<?php
			
				foreach($credit as $r) {
					echo '<tr>';
					echo '<td>'.$r->credit_id.'</td><td>'.$r->item_code.'</td><td>'.$r->price.'</td>';
					echo '</tr>';
				}
			
				?>
			</table>
			<?php } //end if($credit) ?>
		</td>
	</tr>
		
	<tr>
		<td>Incoming Stocks Amount:<input type="text" value="<?php echo $d->in_amount ?>" ></td>
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
	<tr>
		<td>Expenses: <input type="text"value="<?php echo $d->expenses ?>" ></td>
	
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
	<tr>
		<td colspan="2" style="text-align:right">
			<?php $user=$this->session->userdata('role'); ?>
			<?php echo form_open($user.'/pdf/'.$report_id."/".$report_date); ?>
			<input class="button" type="submit" value="Export PDF" name="exportPDF"></input>
			</form> 
		</td> 
	</tr>

	</table>
	<?php } }?>

</div>

