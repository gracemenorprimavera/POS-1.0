<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?>
<div id="view_customer" class="view">
	<div style="width:20%;float:left;height:90%" id="view_left" class="view">
	<?php 
		if($message) {
			echo $message;
		}
		else {
			echo '<table border="1px solid brown" cellpadding="6"><thead><tr><th> Customer Name</th> <th> Balance </th> </tr></thead>';
				foreach ($customers as $r) {
					echo '<tr>';		
						echo '<td>'.anchor('admin/view_customerDetails/'.$r->customer_id,$r->customer_name).'</td>';
						echo '<td>'.$r->balance.'</td>';
					echo '</tr>';
				}

			echo '</table>';
		}
		
	?>
</div>

<div style="width:40%;float:left;height:90%" id="view_center" class="view" >
<?php 
	if($customer_flag) {
		if($message1) {
			echo $message1;
		}
		else {
			echo '<div style="text-align:left;font-size:20px;margin-bottom:10px;">';
			echo form_open('credits/pay_credit', array('onsubmit'=>"return confirm('Save Payment?') "));
			foreach ($customers_det as $r) {
				$id = $r->customer_id;

				echo 'Customer Name: <b>'.$r->customer_name.'</b><br>';
				echo 'Balance: <b>P '.$r->balance.'</b><br>';
				echo "<button id='pay_credit'>PAY</button><br>";
				break;
			}
			echo form_hidden('customerName', $id);
			echo "<div style='display:none' id='hcustomerCash'>Amount: <input type='text' style='height:50px;width:170px;font-size:45px;' name='customerCash' id='customerCash' required />";
			echo form_submit(array('name'=>'record_submit', 'class'=>'button'), 'Record').'</div>';

			echo form_close();
			echo '</div>';
			echo '<table border="1px solid brown" cellpadding="2px"><thead><tr><th> Credit ID</th><th> Date </th><th> Status </th><th> Amount </th><th> Balance </th></tr></thead>';
			foreach ($customers_det as $r) {
				echo '<tr>';
					
					
					if($r->status=='payment') {
						echo '<td>'.$r->credit_id.'</td>';
						echo '<td>'.date('F d, Y', strtoTime($r->date)).'</td>';
						echo '<td>'.$r->status.'</td>';
						echo '<td>'.$r->amount_paid.'</td>';
						echo '<td>'.$r->credit_balance.'</td>';
					}
					else {
						echo '<td>'.anchor('credits/view_transDetails/'.$r->credit_id.'/'.$id,$r->credit_id).'</td>';
						echo '<td>'.date('F d, Y', strtoTime($r->date)).'</td>';
						echo '<td>'.$r->status.'</td>';
						echo '<td>'.$r->amount_credit.'</td>';
						echo '<td>'.$r->credit_balance.'</td>';
					}
					
				echo '</tr>';
			}
			echo '</table>';
		}
	}
?>
</div>
<div style="width:36%;float:left;height:90%" id="view_right" class="view" >
<?php 
	if($customer_flag && $trans_flag) {
		if($message2) {
			echo $message2;
		}
		else {
			echo '<div style="text-align:left;font-size:20px;margin-bottom:10px;">';
			foreach ($transactions as $r) {
				$id = $r->customer_id;
				echo 'Credit ID:<b>'.$r->credit_id.'</b><br>';
				echo 'Date: <b>'.date('F d, Y', strtoTime($r->date)).'</b><br>';
				break;
			}
			echo '</div>';
			//echo anchor('cashier/view_customerDetails/'.$id, 'Back ');
			//echo anchor('cashier/pay_credit/'.$id, ' Pay');
			echo '<table border="1px solid brown"><thead><tr><th> Item Code</th><th> Quantity </th><th> Price </th></tr></thead>';
			
			foreach ($transactions as $r) {
				echo '<tr>';
				echo "<td>$r->desc1 $r->desc2 $r->desc3 $r->desc4.</td>";
				echo '<td>'.$r->credit_quantity.'</td>';
				echo '<td>'.$r->price.'</td>';
				//echo '<td>'.$r->date.'</td>';
				echo '</tr>';
			}
			echo '</table>';
		}
	}
?>
</div>

</div>