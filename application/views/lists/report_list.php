<?php 
	if($this->session->userdata('role')=='admin') 
		echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; 
	$user = $this->session->userdata('role');
?>

<div id="view_record" class="view" >
	 
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
					<?php foreach ($report as $r) { ?>
					<tr>
						<td><?php echo anchor($user.'/view_daily_report/'.$r->report_id.'/'.$r->date, date('F d, Y', strtoTime($r->date))); ?></td>
					</tr>
					<?php } // end foreach ($report as $r) ?>
				</table>
			<?php } // end of else	?>
	</div>


	<div id="view_right" class="view" >
		<?php
			if($detail_flag) {
				$mydate = strtoTime($date);
		?>
				<?php $this->load->view('forms/report_form'); ?>
			<?php } // end if	?>
			
	</div>
</div>