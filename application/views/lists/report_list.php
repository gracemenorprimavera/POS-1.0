<?php 
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_report" class="view">';

			echo '<table border="1px solid brown">
				<tr>
					<th> Date </th>
				</tr>';

			echo $message;
			foreach ($report as $r) {
				echo '<tr>';
					echo '<td>'.anchor('cashier/view_daily_report/'.$r->report_id.'/'.$r->date, $r->date).'</td>';
				
				echo '</tr>';
			}

			echo '</table></div>';
		}
?>