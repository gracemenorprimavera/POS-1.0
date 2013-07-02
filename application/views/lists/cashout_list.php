<?php 
	if($this->session->userdata('role')=='admin') 	
?>
<div id="view_record" class="view" >
	<div style="border:0px solid brown;height:30px;"><?php echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?></div>
 
	<div id="view_left" class="view" >
		<?php
			if($message) {
				echo $message;
			}
			else {
		?>
				<table border="0px solid brown" cellpadding="6">
					<tr>
						<th> Date </th>
					</tr>
					<?php foreach ($cashout as $r) { ?>
					<tr>
						<td><?php echo anchor('expenses/view_cashoutDetails/'.$r->date_cashout, date('F d, Y', strtoTime($r->date_cashout))); ?></td>
					</tr>
					<?php } // end foreach ($cashout as $r) ?>
				</table>
			<?php } // end of else	?>
	</div>


	<div id="view_right" class="view" >
		<?php
			if($detail_flag) {
				$mydate = strtoTime($date);
		?>
				<div style="text-align:left;font-size:20px;margin-bottom:10px;"><?php echo date('F d, Y', $mydate); ?></div>
				<table border="1px solid brown" cellpadding="6" >
					<thead>
					<tr>
						<th> Cashout ID </th>
						<th> Status </th>
						<th> Description </th>
						<th> Amount </th>
					</tr>
					</thead>
						<?php foreach ($daily as $d) { ?>	
							<tr>
								<td><?php echo $d->cashout_id; ?> </td>
								<td><?php echo $d->status; ?> </td>
								<td><?php echo $d->description; ?> </td>
								<td><?php echo $d->amount; ?> </td>
							</tr>			
						<?php } // end foreach ?>
				</table>
			<?php } // end if	?>
			
	</div>
</div>