
<div id="view_record" class="view" >
<?php 
	echo '<div id="view_left" class="view">';
	if($message) {
		echo $message;
	}
	else {
		echo '<table border="1px solid brown"><tr><th> Date </th></tr>';

		foreach ($sales as $r) {
			echo '<tr>';
				echo '<td>'.anchor('admin/view_salesDetails/'.$r->trans_date, $r->trans_date).'</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	echo '</div>';
?>

<?php
	echo '<div id="view_right" class="view" >';

	if($detail_flag) {
		echo '<h3>'.$date.'</h3>';
?>
	<table border="1px solid brown" cellpadding="6">
		<tr>
			<th> Transaction ID </th>
			<th> Amount </th>
		</tr>
<?php foreach ($daily as $d) { ?>
			
		<tr>
			<td><?php echo $d->trans_id; ?> </td>
			<td><?php echo $d->total_amount; ?> </td>
		</tr>			
<?php				
		} // end foreach
	} // end if	
?>
	</table>
	</div>
</div>