<?php 
		echo '<div class="links">';
		echo form_open('items/get_view');
		$options = array(
				'' => 'Please Select',
				'all' => 'All Items',
				'group' => 'Group',
				'division' => 'Division',
				'class' => 'Classification',
				'supplier' => 'Supplier',
				'out' => 'Out of Stock by supplier',
				'reorder' => 'Below reorder point by supplier'
			);
		echo 'View items by: '.form_dropdown('view_dropdown', $options,'','id="view" autocomplete="off" style="width:250px;" required');
		echo form_submit(array('class'=>'button','style'=>'width:50px;','name'=>'view_submit'),'Go');
		echo form_close();
		echo '</div>';

		if($message) {
			echo $message;
		}
		else {
			
			echo '<div id="view_item" class="view">';

				echo '<table border="1px solid brown" cellpadding="10">
				<tr>
					<th colspan="2"> Action </th>
					<th> Item ID </th>
					<th> Bar Code </th>
					<th> Item Code</th>
					<th> Description 1 </th>
					<th> Description 2 </th>
					<th> Description 3 </th>
					<th> Description 4 </th>
					<th> Division </th>
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
					
				</tr>';
			
			
			foreach ($items as $r) {
				echo '<tr>';
				$edit = $r->item_id;
				//echo $edit;
				echo '<td>'.anchor('items/delete_item/'.$edit,'Delete', array('onclick'=>"return confirm('Are you sure you want to delete this item?') ")).'</td>';
				echo '<td>'.anchor('items/goto_editItemForm/'.$edit, 'Edit').'</td>';
				echo '<td>'.$r->item_id.'</td>';
				echo '<td>'.$r->bar_code.'</td>';
				echo '<td>'.$r->item_code.'</td>';
				echo '<td>'.$r->desc1.'</td>';
				echo '<td>'.$r->desc2.'</td>';
				echo '<td>'.$r->desc3.'</td>';
				echo '<td>'.$r->desc4.'</td>';
				echo '<td>'.$r->division.'</td>';
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
				echo '</tr>';
				
				
			}
			echo '</table></div>';
		}
	
?>
