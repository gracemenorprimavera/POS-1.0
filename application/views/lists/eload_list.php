<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?>

<?php 
		if($message) {
			echo $message;
		}
		else {
			
			echo '<div id="table" class="view">';

				echo '<table border="1px solid brown" cellpadding="10">
				<thead>
				<tr>
					<th> Date </th>
					<th> Network </th>
					<th> E-Load </th>
					<th> Previous Balance </th>
					<th> Balance </th>
					<th> Amount </th>
					<th> Load Cost </th>
					<th> Profit </th>
				</tr>
				</thead><tbody>';
			
			
			foreach ($eload as $r) {
				echo '<tr>';
				echo '<td>'.date('F d, Y', strToTime($r->date)).'</td>';
				echo '<td>'.$r->network.'</td>';
				echo '<td>'.$r->status.'</td>';
				echo '<td>'.$r->prev_balance.'</td>';
				echo '<td>'.$r->load_balance.'</td>';
				echo '<td>'.$r->amount.'</td>';
				echo '<td>'.$r->load_cost.'</td>';
				echo '<td>'.$r->profit.'</td>';
				echo '</tr>';
			}
			echo '</tbody></table>';
			echo anchor('admin/goto_eloadForm', 'Load Form'); 
			echo '</div>';
		}
?>

