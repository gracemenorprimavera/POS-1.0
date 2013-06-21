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
			?>

			<input type="button" class="button" value="Show" onclick="document.getElementById('table').className='showDetail';if(document.all){document.getElementById('table').getElementsByTagName('th')[0].style.display='block';}" />
			<input type="button" class="button" value="Hide" onclick="document.getElementById('table').className='';" />
			<br>
			<div id="view_item" class="view">

				<table id="table" border="1px solid brown" cellpadding="10">
				<thead>
				<tr>
					<th colspan="2"> Action </th>
					<th> Item ID </th>
					<th> Bar Code </th>
					<th> Item Code</th>
					<th> Item Description</th>
					<th> Division </th>
					<th> Group </th>
					<th> Classification 1 </th>
					<th class="moreDetail"> Classification 2 </th>
					<th> Cost </th>
					<th> Retail Price </th>
					<th class="moreDetail"> Model Quantity </th>
					<th class="moreDetail"> Supplier Code</th>
					<th class="moreDetail"> Manufacturer</th>
					<th> Quantity </th>
					<th class="moreDetail"> Reorder Point </th>
					
				</tr></thead>

				<tbody>
			<?php
			
			foreach ($items as $r) {
				echo '<tr>';
				$edit = $r->item_id;
				//echo $edit;
				echo '<td>'.anchor('items/delete_item/'.$edit,'Delete', array('onclick'=>"return confirm('Are you sure you want to delete this item?') ")).'</td>';
				echo '<td>'.anchor('items/goto_editItemForm/'.$edit, 'Edit').'</td>';
				echo '<td>'.$r->item_id.'</td>';
				echo '<td>'.$r->bar_code.'</td>';
				echo '<td>'.$r->item_code.'</td>';
				echo '<td>'.$r->desc1.' ';
				echo $r->desc2.' ';
				echo $r->desc3.' ';
				echo $r->desc4.'</td>';
				echo '<td>'.$r->division.'</td>';
				echo '<td>'.$r->group.'</td>';
				echo '<td>'.$r->class1.'</td>';
				echo '<td class="moreDetail">'.$r->class2.'</td>';
				echo '<td>'.$r->cost.'</td>';
				echo '<td>'.$r->retail_price.'</td>';
				echo '<td class="moreDetail">'.$r->model_quantity.'</td>';
				echo '<td class="moreDetail">'.$r->supplier_code.'</td>';
				echo '<td class="moreDetail">'.$r->manufacturer.'</td>';
				echo '<td>'.$r->quantity.'</td>';
				echo '<td class="moreDetail">'.$r->reorder_point.'</td>';
				echo '</tr></tbody>';
				
				
			}
			echo '</table></div>';
		}
	
?>
