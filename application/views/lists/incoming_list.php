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
			foreach ($incoming as $r) {
				echo '<tr>';
					echo '<td>'.anchor('incoming/view_incomingDetails/'.$r->date_delivered, $r->date_delivered).'</td>';
				
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
			echo $d->delivery_id.' '.$d->total_amount.'<br>';
					
			
		}
	}
	
?>
	</div>
</div>