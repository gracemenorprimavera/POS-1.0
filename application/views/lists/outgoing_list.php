<div id="view_record" class="view" >

<?php 

		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_left" class="view">';

			echo '<table border="1px solid brown">
				<tr>
					<th> Date </th>
					
				</tr>';

			echo $message;
			foreach ($outgoing as $r) {
				echo '<tr>';
					echo '<td>'.anchor('outgoing/view_outgoingDetails/'.$r->date_out, $r->date_out).'</td>';
					
				echo '</tr>';
			}

			echo '</table></div>';
		}
?>

<?php
	echo '<div id="view_right" class="view" >';

	if($detail_flag) {
		echo '<h3>'.$date.'</h3>';
		foreach ($daily as $d) {
			echo $d->outgoing_id.' '.$d->status.' '.$d->amount.'<br>';
					
			
		}
	}
	
?>
	</div>
</div>