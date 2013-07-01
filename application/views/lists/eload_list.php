<?php 
	if($this->session->userdata('role')=='admin') 
?>
<div id="view_record" class="view" >
	<div style="border:0px solid brown;height:30px;"><?php echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?></div>
 
	<div style="width:15%;float:left;height:90%" id="view_left" class="view" >
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
					<?php foreach ($load as $r) { ?>
					<tr>
						<td><?php echo anchor('admin/view_loadDetails/'.$r->date, date('F d, Y', strtoTime($r->date))); ?></td>
					</tr>
					<?php } // end foreach ($expenses as $r) ?>
				</table>
			<?php } // end of else	?>
	</div>

	<div style="width:15%;float:left;height:90%" id="view_center" class="view" >
		<?php if($detail_flag) { 
			$mydate = strtoTime($date);
		?>
			<div style="text-align:left;font-size:20px;margin-bottom:10px;"><?php echo date('F d, Y', $mydate); ?></div>

			<?php echo anchor('admin/view_loadnetwork/'.$date.'/globe', 'Globe/TM'); ?><br>
			<?php echo anchor('admin/view_loadnetwork/'.$date.'/smart', 'Smart'); ?><br>
			<?php echo anchor('admin/view_loadnetwork/'.$date.'/sun', 'Sun'); ?><br>
		<?php } ?>
	</div>

	<div style="width:69%;float:left;height:90%" id="view_right" class="view" >
			<?php 
				if($message1) {
					echo $message1;
				} 
				else {
			?>
				<?php
					if($network_flag) {
						$mydate = strtoTime($date);
				?>
					<div style="text-align:left;font-size:20px;margin-bottom:10px;"><?php echo date('F d, Y', $mydate); ?></div>
					<table border="1px solid brown" cellpadding="6" >
						<thead>
						<tr>
							<th> Load ID </th>
							<th> Network </th>
							<th> Status </th>
							<th> Amount </th>
						</tr>
						</thead>
							<?php foreach ($daily as $d) { ?>	
								<tr>
									<td><?php echo $d->load_id; ?> </td>
									<td><?php echo $d->network; ?> </td>
									<td><?php echo $d->status; ?> </td>
									<td><?php echo $d->amount; ?> </td>
								</tr>			
							<?php } // end foreach ?>
					</table>
				<?php } // end if	?>
				<?php } // end else ?>
				
	</div>
</div>
