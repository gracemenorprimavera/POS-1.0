<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; ?>
<div id="view_customer" class="view">
<div id="view_left1">
	<?php 
		if($message) {
			echo $message;
		}
		else {
			echo '<table border="1px solid brown" cellpadding="6"><tr><th> Customer Name</th> <th> Balance </th> </tr>';
				foreach ($customers as $r) {
					echo '<tr>';		
						echo '<td>'.anchor('credits/view_customerDetails/'.$r->customer_id,$r->customer_name).'</td>';
						echo '<td>'.$r->balance.'</td>';
					echo '</tr>';
				}

			echo '</table>';
		}
		
	?>
</div>

<div id="view_center">
<?php 
	if($customer_flag) {
		if($message1) {
			echo $message1;
		}
		else {
			echo form_open('credits/pay_credit');
			foreach ($customers_det as $r) {
				$id = $r->customer_id;
				echo 'Customer Name: <b>'.$r->customer_name.'</b><br>';
				echo 'Balance: <b>P '.$r->balance.'</b><br>';
				echo "<button id='pay_credit'>PAY</button><br>";
				break;
			}
			echo form_hidden('customer_id', $id);
			echo "<div style='display:none' id='hcustomerCash'>Amount: <input type='text' name='customerCash' id='customerCash' required /><button >Record</button></div>";

			echo form_close();
			echo '<table border="1px solid brown" cellpadding="2px"><tr><th> Credit ID</th><th> Date </th><th> Status </th><th> Amount </th><th> Balance </th></tr>';
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
<div id="view_right1">
<?php 
	if($customer_flag && $trans_flag) {
		if($message2) {
			echo $message2;
		}
		else {
			foreach ($transactions as $r) {
				$id = $r->customer_id;
				echo 'Credit ID:<b>'.$r->credit_id.'</b><br>';
				echo 'Date: <b>'.date('F d, Y', strtoTime($r->date)).'</b><br>';
				break;
			}
			//echo anchor('cashier/view_customerDetails/'.$id, 'Back ');
			//echo anchor('cashier/pay_credit/'.$id, ' Pay');
			echo '<table border="1px solid brown"><tr><th> Item Code</th><th> Quantity </th><th> Price </th></tr>';
			
			foreach ($transactions as $r) {
				echo '<tr>';
				echo '<td>'.$r->item_code.'</td>';
				echo '<td>'.$r->quantity.'</td>';
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