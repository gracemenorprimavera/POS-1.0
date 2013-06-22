<?php 
		if($message) {
			echo $message;
		}
		else {
			
			echo '<div id="table" class="view">';

				echo '<table border="1px solid brown" cellpadding="10">
				<thead>
				<tr>
					<th> Name </th>
				</tr>
				</thead><tbody>';
			
			
			foreach ($emp as $r) {
				echo '<tr>';
				echo '<td>'.$r->name.'</td>';
				echo '</tr>';
			}
			echo '</tbody></table></div>';
		}
?>
