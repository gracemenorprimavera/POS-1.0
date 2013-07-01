<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?>
<div id="view_record" class="view" >

<?php 
	echo '<div id="view_left" class="view">';
	if($message) {
		echo $message;
	}
	else {
		echo '<table border="0px solid brown" cellpadding="6"><tr><th> Date </th></tr>';

		foreach ($incoming as $r) {
			echo '<tr>';
				echo '<td>'.anchor('incoming/view_incomingDetails/'.$r->date_delivered, date('F d, Y', strtoTime($r->date_delivered))).'</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	echo '</div>';
?>

<?php
	echo '<div id="view_right" class="view" >';

	if($detail_flag) {
		echo '<h3>'.date('F d, Y', strtoTime($date)).'</h3>';
?>
	<table border="1px solid brown" cellpadding="6">
		<tr>
			<th> Delivery ID </th>
			<th> Supplier ID </th>
			<th> Supplier Name </th>
			<th> Description </th>
			<th> Amount </th>
		</tr>
<?php foreach ($daily as $d) { ?>
			
		<tr>
			<td><?php echo $d->delivery_id; ?> </td>
			<td><?php echo $d->supplier_id; ?> </td>
			<td><?php echo $d->supplier_name; ?> </td>
			<td><?php echo $d->description; ?> </td>
			<td><?php echo $d->total_amount; ?> </td>
		</tr>			
<?php				
		} // end foreach
	} // end if	
?>
	</table>
	</div>
</div>