<div id="view_record" class="view" >

<?php 
	echo '<div id="view_left" class="view" >';
	if($message) {
		echo $message;
	}
	else {
		echo '<table border="1px solid brown" cellpadding="6"><tr><th> Date </th></tr>';
		foreach ($expenses as $r) {
			echo '<tr>';
				echo '<td>'.anchor('expenses/view_expensesDetails/'.$r->date_expense, $r->date_expense).'</td>';
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
			<th> Expense ID </th>
			<th> Status </th>
			<th> Description </th>
			<th> Amount </th>
		</tr>
<?php foreach ($daily as $d) { ?>
			
		<tr>
			<td><?php echo $d->expense_id; ?> </td>
			<td><?php echo $d->status; ?> </td>
			<td><?php echo $d->description; ?> </td>
			<td><?php echo $d->amount; ?> </td>
		</tr>			
<?php				
		} // end foreach
	} // end if	
?>
	</table>
	</div>
</div>