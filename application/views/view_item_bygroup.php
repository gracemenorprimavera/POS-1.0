<?php 
		echo '<h3> VIEW ITEMS </h3>';
		echo 'View items by: ';
		echo anchor('admin/goto_view_items',' ALL');
		echo anchor('admin/view_item_byclass',' | Classification');
		echo anchor('admin/view_item_bysupplier',' | Supplier');
		echo anchor('admin/view_item_byOutofStock',' | Out of Stock by supplier');
		echo anchor('admin/view_item_bybelowReorder',' | Below reorder point by supplier');
		if($message) {
			echo $message;
		}
		else {
			echo '<h3> ITEMS by GROUP </h3>';
			echo '<div id="view_item" class="view">';
				foreach ($group as $r) {
				echo '<br>';
				echo '<H3>'.$r->group.'</h3>';

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
			$group=$r->group;

			$items = $this->pos_model->get_items_ingroup($group);
			
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
			echo '</table>';
			echo '<br>';
		}
		echo '</div>';
	}
?>