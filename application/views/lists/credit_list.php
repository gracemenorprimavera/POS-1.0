
<div id="view_record" class="view" >
<?php 
	echo '<div id="view_left" class="view">';
	if($message) {
		echo $message;
	}
	else {
		echo '<table border="1px solid brown"><tr><th> Date </th></tr>';

		foreach ($credits as $r) {
			echo '<tr>';
				echo '<td>'.anchor('admin/view_creditDetails/'.$r->date, $r->date).'</td>';
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
			<th> Credit ID </th>
			<th> Customer ID</th>
			<th> Status</th>
			<th> Amount </th>
			<th> Balance</th>
		</tr>
<?php foreach ($daily as $r) { 
		echo '<tr>';
		$id = $r->customer_id;	
		if($r->status=='credit') {
				echo '<td>'.$r->credit_id.'</td>';
				echo '<td>'.$r->customer_id.'</td>';
				echo '<td>'.$r->status.'</td>';
				echo '<td>'.$r->amount_paid.'</td>';
				echo '<td>'.$r->credit_balance.'</td>';
		}
		
		echo '</tr>';			
				
		} // end foreach
	} // end if	
?>
	</table>
	</div>
</div>