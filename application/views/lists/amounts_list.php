<div id="view_amounts" class="view" >

<?php 

		if($message) {
			echo $message;
		}
		else {
?>
			<table border="1px solid brown" cellpadding="5px">
				<tr>
					<th> </th>
					<th colspan="3"> Opening </th>
					<th colspan="3"> Closing </th>
					<th colspan="2"> Action</th>
				</tr>
				<tr>
					<th> Date </th>
					<td> Bills </td>
					<td> Coins </td>
					<th> Total Amount </th>
					<td> Bills </td>
					<td> Coins </td>
					<th> Total Amount </th>
					<th> Edit </th>
					<th> Delete </th>
					
				</tr>
			

<?php

			foreach($amounts as $d) {
				echo '<tr>';
					echo '<td>'.$d->date.'</td>';
					echo '<td>'.$d->opening_bills.'</td>';
					echo '<td>'.$d->opening_coins.'</td>';
					if($d->opening_total==0)
						echo '<th><span>'.$d->opening_total.'</span></th>';
					else
						echo '<th>'.$d->opening_total.'</th>';
					echo '<td>'.$d->closing_bills.'</td>';
					echo '<td>'.$d->closing_coins.'</td>';
					if($d->closing_total==0)
						echo '<th><span>'.$d->closing_total.'</span></th>';
					else 
						echo '<th>'.$d->closing_total.'</th>';
					echo '<td>*Edit</td>'; //echo '<td>'.anchor('admin', 'Edit').'</td>';	// parang edit item lang din ito
					echo '<td>*Delete</td>'; //echo '<td>'.anchor('admin/delete_amount/'.$d->amount_id, 'Delete', array('onclick'=>'return confirm("Delete this record?")')).'</td>';
				echo '</tr>';
			}
			echo '</table>';
			echo '<small>* Not yet functional </small>';
		}
?>		

</div>