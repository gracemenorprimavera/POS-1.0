<?php 
	$user = $this->session->userdata('role');
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_report" class="view">';

			echo '<table border="1px solid brown">
				<tr><th> Date </th></tr>';

			foreach ($report as $r) {
				echo '<tr>';
					echo '<td>'.anchor($user.'/view_daily_report/'.$r->report_id.'/'.$r->date, $r->date).'</td>';
				echo '</tr>';
			}

			echo '</table></div>';
		}
?>