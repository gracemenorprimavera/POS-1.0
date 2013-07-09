<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; 
?>
<?php 
		if($message) {
			echo $message;
		}
		else {
			
			echo '<div id="table" class="view">';
			echo '<span>'.$msg.'</span>';
				echo '<table border="1px solid brown" cellpadding="10">
				<thead>
				<tr>
					<th> Name </th>
					<th> Position </th>
					<th> Remove </th>
				</tr>
				</thead><tbody>';
			
			
			foreach ($emp as $r) {
				echo '<tr>';
				echo '<td>'.$r->name.'</td>';
				echo '<td>'.$r->position.'</td>';
				echo '<td>'.anchor('admin/remove_emp/'.$r->emp_id.'/'.$r->name, 'Remove', array('onclick'=>"return confirm('Are you sure you want to remove this employee?')")).'</td>';
				echo '</tr>';
			}
			echo '</tbody></table></div>';
		}
?>
