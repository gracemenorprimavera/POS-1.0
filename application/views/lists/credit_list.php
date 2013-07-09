
<?php 
	if($this->session->userdata('role')=='admin') 
?>
<div id="view_record" class="view" >
	<div style="border:0px solid brown;height:30px;">
		<?php echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?></div>
 	
 	<div style="width:15%;float:left;height:90%" id="view_left" class="view">
		<?php 
			if($message) {
				echo $message;
			}
			else {
		?>
			<table border="0px solid brown" cellpadding="6">
				<tr><th> Date </th></tr>
				<?php foreach ($credits as $r) { ?>
				<tr>
					<td>
						<?php echo anchor('admin/view_creditDetails/'.$r->date, date('F d, Y', strtoTime($r->date))); ?>
					</td>
				</tr>
				<?php } //end of foreach ($credits as $r) ?>
			</table>
		<?php } // end of else ?>	
	</div>

	<div style="width:40%;float:left;height:90%" id="view_center" class="view" >
		<?php
			if($detail_flag) {
				$mydate = strtoTime($date);
		?>
				<div style="text-align:left;font-size:20px;margin-bottom:10px;"><?php echo 'Date: '.date('F d, Y', $mydate); ?></div>
				<table border="1px solid brown" cellpadding="6">
					<thead>
					<tr>
						<th> Credit ID </th>
						<th> Customer Name </th>
						<!-- <th> Status</th> -->
						<th> Amount </th>
						<th> Balance</th>
					</tr>
					</thead>
					<?php foreach ($daily as $d) { ?>	
					<tr>
						<?php $id = $d->credit_id; ?>
						<?php if($d->status=='credit') { ?>
							<td><?php echo anchor('admin/view_creditDetailsbyId/'.$date.'/'.$d->credit_id, $d->credit_id); ?></td>
							<td><?php echo $d->customer_name; ?></td>
							<!-- <td><?php echo $d->status; ?></td> -->
							<td><?php echo $d->amount_credit; ?></td>
							<td><?php echo $d->credit_balance; ?></td>
						<?php } // end if ?>
					</tr>
					<?php } // end foreach ?>
				</table>
			<?php } // end if ?>
			
	</div>
	<div style="width:41%;float:left;height:90%" id="view_right" class="view" >
		<?php
			if($item_flag) {
				$mydate = strtoTime($date);
				$id = $this->uri->segment(4);
		?>
				<div style="text-align:left;font-size:20px;margin-bottom:10px;"><?php echo 'Credit ID: '.$id; ?></div>
				<table border="1px solid brown" cellpadding="6">
					<thead>
					<tr>
						<th> Item </th>
						<th> Quantity </th>
						<th> Price </th>
						<th> Subtotal </th>
					</tr>
					</thead>
					<?php foreach ($credit as $t) { ?>	
					<tr>
						<td><?php echo "$t->desc1 $t->desc2 $t->desc3 $t->desc4"; ?> </td>
						<td><?php echo $t->credit_quantity; ?> </td>
						<td><?php echo $t->retail_price; ?> </td>
						<td><?php echo $t->price; ?> </td>
						
					</tr>			
					<?php } // end foreach ?>
				</table>
			<?php } // end if ?>
	</div>
</div>