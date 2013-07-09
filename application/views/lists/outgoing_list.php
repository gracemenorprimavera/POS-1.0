
<?php 
	if($this->session->userdata('role')=='admin') 
?>
<div id="view_record" class="view" >
	<div style="border:0px solid brown;height:30px;"><?php echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?></div>
 	
 	<div style="width:15%;float:left;height:90%" id="view_left" class="view">
		<?php 
			if($message) {
				echo $message;
			}
			else {
		?>
			<table border="0px solid brown" cellpadding="6">
				<tr><th> Date </th></tr>
				<?php foreach ($outgoing as $r) { ?>
				<tr>
					<td>
						<?php echo anchor('outgoing/view_outgoingDetails/'.$r->date_out, date('F d, Y', strtoTime($r->date_out))); ?>
					</td>
				</tr>
				<?php } //end of foreach ($incoming as $r) ?>
			</table>
		<?php } // end of else ?>	
	</div>

	<div style="width:36%;float:left;height:90%" id="view_center" class="view" >
		<?php
			if($detail_flag) {
				$mydate = strtoTime($date);
		?>
				<div style="text-align:left;font-size:20px;margin-bottom:10px;"><?php echo 'Date: '.date('F d, Y', $mydate); ?></div>
				<table border="1px solid brown" cellpadding="6">
					<tr>
						<th> Outgoing ID </th>
						<th> Status </th>
						<th> Description </th>
						<th> Amount </th>
					</tr>
					<?php foreach ($daily as $d) { ?>
						
					<tr>
						<td><?php echo anchor('outgoing/view_outgoingItems/'.$date.'/'.$d->outgoing_id, $d->outgoing_id); ?> </td>
						<td><?php echo $d->status; ?> </td>
						<td><?php echo $d->description; ?> </td>
						<td><?php echo $d->amount; ?> </td>
					</tr>		
					<?php } // end foreach ?>
				</table>
			<?php } // end if ?>
			
	</div>

	<div style="width:45%;float:left;height:90%" id="view_right" class="view" >
		<?php
			if($item_flag) {
				$mydate = strtoTime($date);
		?>
				<div style="text-align:left;font-size:20px;margin-bottom:10px;"><?php echo 'Outgoing ID: '.$this->uri->segment(4); ?></div>
				<table border="1px solid brown" cellpadding="6">
					<thead>
					<tr>
						<th> Item </th>
						<th> Quantity </th>
						<th> Price </th>
						<th> Subtotal </th>
					</tr>
					</thead>
					<?php foreach ($items as $d) { ?>	
					<tr>
						<td><?php echo "$d->desc1 $d->desc2 $d->desc3 $d->desc4"; ?> </td>
						<td><?php echo $d->out_quantity; ?> </td>
						<td><?php echo $d->retail_price; ?> </td>
						<td><?php echo $d->out_price; ?> </td>
						
					</tr>			
					<?php } // end foreach ?>
				</table>
			<?php } // end if ?>
	</div>
</div>