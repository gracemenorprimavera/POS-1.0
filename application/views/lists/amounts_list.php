<?php
	if($this->session->userdata('role')=='admin') 
		echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; 
?>
<div id="view_amounts" class="view" >
	<div style="border:0px solid brown;height:30px;"><?php echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?></div>

<?php 

		if($message) {
			echo $message;
		}
		else {
?>
			<table border="1px solid brown" cellpadding="5px">
				<thead>
				<tr>
					<th> </th>
					<th colspan="3"> Opening </th>
					<th colspan="3"> Closing </th>
					<th colspan="3"> Action</th>
				</tr>
				<tr>
					<th> Date </th>
					<td> Bills </td>
					<td> Coins </td>
					<th> Total Amount </th>
					<td> Bills </td>
					<td> Coins </td>
					<th> Total Amount </th>
					<th> Personnel </th>
					<!--<th> Edit </th>
					<th> Delete </th>	-->
				</tr>
			</thead>
			

<?php

			foreach($amounts as $d) {
				echo '<tr>';
					echo '<td>'.date('F d, Y', strtoTime($d->date)).'</td>';
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
					echo '<td>'.$d->personnel.'</td>';
					//echo '<td>*Edit</td>'; //echo '<td>'.anchor('admin', 'Edit').'</td>';	// parang edit item lang din ito
					//echo '<td>*Delete</td>'; //echo '<td>'.anchor('admin/delete_amount/'.$d->amount_id, 'Delete', array('onclick'=>'return confirm("Delete this record?")')).'</td>';
				echo '</tr>';
			}
			echo '</table>';
			//echo '<small>* Not yet functional </small>';
		}
?>		

</div>