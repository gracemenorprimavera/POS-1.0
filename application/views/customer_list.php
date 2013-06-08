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
						echo '<td>'.anchor('cashier/view_customerDetails/'.$r->customer_id,$r->customer_name).'</td>';
						echo '<td>'.$r->balance.'</td>';
						//echo '<td>'.anchor('','Pay', array('onclick'=>"return confirm('Finalize Payment')")).'</td>';
						//echo '<td>'.anchor('cashier/pay_credit/'.$r->customer_id,'Pay', array('onclick'=>"return confirm('Finalize Payment')")).'</td>';
					echo '</tr>';
				}

			echo '</table>';
		}
		echo '<br>'.anchor('cashier', 'Home', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); 
		
	?>
</div>

<div id="view_center">
<?php 
	if($customer_flag) {
		if($message) {
			echo $message;
		}
		else {
			echo form_open('cashier/pay_credit');
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
			//echo anchor('cashier/credit', 'Back ');
			//echo anchor('cashier/pay_credit/'.$id, ' Pay');
			echo '<table border="1px solid brown"><tr><th> Credit ID</th><th> Transaction Date </th><th> Total Amount </th></tr>';
			foreach ($customers_det as $r) {
				echo '<tr>';
					echo '<td>'.anchor('cashier/view_transDetails/'.$r->credit_id.'/'.$id,$r->credit_id).'</td>';
					echo '<td>'.$r->credit_date.'</td>';
					echo '<td>'.$r->total_amount.'</td>';
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
		if($message) {
			echo $message;
		}
		else {
			foreach ($transactions as $r) {
				$id = $r->customer_id;
				echo 'Credit ID:<b>'.$r->credit_id.'</b><br>';
				echo 'Date: <b>'.$r->credit_date.'</b><br>';
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
				echo '</tr>';
			}
			echo '</table>';
		}
	}
?>
</div>

</div>