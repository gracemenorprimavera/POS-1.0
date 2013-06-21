<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?>
<?php 
	$user = $this->session->userdata('role');
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_report" class="view">';
			
			echo '<table border="0px solid brown">
				<tr><th> Date </th></tr>';

			foreach ($report as $r) {
				echo '<tr>';
					echo '<td>'.anchor($user.'/view_daily_report/'.$r->report_id.'/'.$r->date, date('F d, Y', strtoTime($r->date))).'</td>';
				echo '</tr>';
			}

			echo '</table></div>';
		}
?>