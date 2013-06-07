<?php 
	if($list_id==1) { 	// items list
		echo '<h3> VIEW ITEMS </h3>';
		echo '<div class="links">View items by: ';
		echo anchor('admin/get_item_bygroup',' Group');
		echo ' | ';
		echo anchor('admin/get_item_byclass',' Classification');
		echo ' | ';
		echo anchor('admin/get_item_bysupplier',' Supplier');
		echo ' | ';
		echo anchor('admin/get_item_byOutofStock',' Out of Stock by supplier');
		echo ' | ';
		echo anchor('admin/get_item_bybelowReorder',' Below reorder point by supplier').'</div>';
		if($message) {
			echo $message;
		}
		else {
			echo '<h3> ALL ITEMS </h3>';
			echo '<div id="view_item" class="view">';

				echo '<table border="1px solid brown">
				<tr>
					<th> Bar Code </th>
					<th> Item Code</th>
					<th> Description 1 </th>
					<th> Description 2 </th>
					<th> Description 3 </th>
					<th> Description 4 </th>
					<th> Group </th>
					<th> Classification 1 </th>
					<th> Classification 2 </th>
					<th> Cost </th>
					<th> Retail Price </th>
					<th> Model Quantity </th>
					<th> Supplier Code </th>
					<th> Manufacturer </th>
					<th> Quantity </th>
					<th> Reorder Point </th>
					<th> Action </th>
				</tr>';
			
			
			foreach ($items as $r) {
				echo '<tr>';
				echo '<td>'.$r->bar_code.'</td>';
				echo '<td>'.$r->item_code.'</td>';
				echo '<td>'.$r->desc1.'</td>';
				echo '<td>'.$r->desc2.'</td>';
				echo '<td>'.$r->desc3.'</td>';
				echo '<td>'.$r->desc4.'</td>';
				echo '<td>'.$r->group.'</td>';
				echo '<td>'.$r->class1.'</td>';
				echo '<td>'.$r->class2.'</td>';
				echo '<td>'.$r->cost.'</td>';
				echo '<td>'.$r->retail_price.'</td>';
				echo '<td>'.$r->model_quantity.'</td>';
				echo '<td>'.$r->supplier_code.'</td>';
				echo '<td>'.$r->manufacturer.'</td>';
				echo '<td>'.$r->quantity.'</td>';
				echo '<td>'.$r->reorder_point.'</td>';
				$edit = $r->item_code;
				echo '<td>'.anchor('admin/delete_item/'.$edit,'Delete');
				echo ' '.anchor('admin/goto_edit_item/'.$edit, 'Edit').'</td>';
				echo '</tr>';
			}
			echo '</table></div>';
		}
	}
?>

<?php 
	if($list_id==2) {	//customer list 
		echo '<h3> VIEW CUSTOMERS </h3>';
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_customer" class="view">';

			echo '<table border="1px solid brown">
				<tr>
					<th> Customer Name</th>
					<th> Balance </th>
					<th> Action </th>
				</tr>';

			echo $message;
			foreach ($customers as $r) {
				echo '<tr>';
				
				echo '<td>'.anchor('cashier/view_customerDetails/'.$r->customer_id,$r->customer_name).'</td>';
				echo '<td>'.$r->balance.'</td>';
				
				echo '<td>'.anchor('cashier/pay_credit/'.$r->customer_id,'Pay', array('onclick'=>"return confirm('Finalize Payment')")).'</td>';
				echo '</tr>';
			}

			echo '</table></div>';
		}
	}
?>

<?php 
	if($list_id==3) {	//delivery list 
		echo '<h3> VIEW DELIVERY </h3>';
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_delivery" class="view">';

			echo '<table border="1px solid brown">
				<tr>
					<th> Supplier ID </th>
					<th> Supplier Name</th>
					<th> Delivery ID </th>
					<th> Delivery Date</th>
					<th> Delivered Item </th>
				</tr>';

			echo $message;
			foreach ($delivery as $r) {
				echo '<tr>';
				echo '<td>'.$r->supplier_id.'</td>';
				echo '<td>'.$r->supplier_name.'</td>';
				echo '<td>'.$r->delivery_id.'</td>';
				echo '<td>'.$r->date_delivered.'</td>';
				echo '<td>'.$r->item_code.'</td>';
				echo '</tr>';
			}

			echo '</table></div>';
		}
	}
?>

<?php 
	if($list_id==4) {	//customer full details 
		echo '<h3> VIEW CUSTOMERS </h3>';
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_customer" class="view">';
			foreach ($customers as $r) {
				$id = $r->customer_id;
				echo 'Customer Name: '.$r->customer_name.'<br>';
				echo 'Balance: P'.$r->balance.'<br>';
				break;
			}
			echo anchor('cashier/credit', 'Back ');
			echo anchor('cashier/pay_credit/'.$id, ' Pay');
			echo '<table border="1px solid brown">
				<tr>
					
					<th> Transaction ID</th>
					<th> Transaction Date </th>
					<th> Total Amount </th>
				</tr>';

			echo $message;
			foreach ($customers as $r) {
				echo '<tr>';
				
				echo '<td>'.anchor('cashier/view_transDetails/'.$r->trans_id,$r->trans_id).'</td>';
				echo '<td>'.$r->trans_date.'</td>';
				echo '<td>'.$r->total_amount.'</td>';
				
				echo '</tr>';
			}

			echo '</table>';

			

			echo '</div>';
		}
	}
?>

<?php 
	if($list_id==5) {	//transactions full details 
		echo '<h3> VIEW CUSTOMERS </h3>';
		if($message) {
			echo $message;
		}
		else {
			echo '<div id="view_customer" class="view">';
			foreach ($transactions as $r) {
				$id = $r->customer_id;
				echo 'Transaction ID: '.$r->trans_id.'<br>';
				echo 'Date: '.$r->trans_date.'<br>';
				break;
			}
			echo anchor('cashier/view_customerDetails/'.$id, 'Back ');
			//echo anchor('cashier/pay_credit/'.$id, ' Pay');
			echo '<table border="1px solid brown">
				<tr>
					
					<th> Item Code</th>
					<th> Quantity </th>
					<th> Price </th>
				</tr>';

			echo $message;
			foreach ($transactions as $r) {
				echo '<tr>';
				
				echo '<td>'.$r->item_code.'</td>';
				echo '<td>'.$r->quantity.'</td>';
				echo '<td>'.$r->price.'</td>';
				
				echo '</tr>';
			}

			echo '</table>';

			

			echo '</div>';
		}
	}
?>




