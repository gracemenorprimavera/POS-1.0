<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_recordsPAge', 'Back').'</li></ul>'; 
?>
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
<input type='hidden' id='hEditableValue' />
				<table id="table" border="1px solid brown" cellpadding="10">
				<thead>
				<tr>
					<th> Action </th>
					<th><?php $order=1; echo anchor('items/orderbyID/'.$order, 'Item ID') ?></th>
					<th><?php $order=2; echo anchor('items/orderbyID/'.$order, 'Bar Code') ?></th>
					<th><?php $order=3; echo anchor('items/orderbyID/'.$order, 'Item Code') ?></th>
					<th><?php $order=4; echo anchor('items/orderbyID/'.$order, 'Item Description') ?></th>
					<th><?php $order=5; echo anchor('items/orderbyID/'.$order, 'Division') ?></th>
					<th><?php $order=6; echo anchor('items/orderbyID/'.$order, 'Group') ?></th>
					<th><?php $order=7; echo anchor('items/orderbyID/'.$order, 'Classification 1') ?></th>
					<th class="moreDetail"><?php $order=8; echo anchor('items/orderbyID/'.$order, 'Classification 2') ?></th>
					<th><?php $order=9; echo anchor('items/orderbyID/'.$order, 'Cost') ?> </th>
					<th><?php $order=10; echo anchor('items/orderbyID/'.$order, 'Retail Price') ?></th>
					<th class="moreDetail"><?php $order=11; echo anchor('items/orderbyID/'.$order, 'Model Quantity') ?></th>
					<th class="moreDetail"><?php $order=12; echo anchor('items/orderbyID/'.$order, 'Supplier Code') ?></th>
					<th class="moreDetail"><?php $order=13; echo anchor('items/orderbyID/'.$order, 'Manufacturer') ?></th>
					<th><?php $order=14; echo anchor('items/orderbyID/'.$order, 'Quantity') ?></th>
					<th class="moreDetail"><?php $order=15; echo anchor('items/orderbyID/'.$order, 'Reorder Point') ?></th>
					
				</tr></thead>

				<tbody>
			<?php
			
			foreach ($items as $r) {
				echo '<tr>';
				$edit = $r->item_id;
				//echo $edit;
				echo '<td>'.anchor('items/delete_item/'.$edit,'Delete', array('onclick'=>"return confirm('Are you sure you want to delete this item?') ")).'</td>';
				//echo '<td>'.anchor('items/goto_editItemForm/'.$edit, 'Edit').'</td>';
				echo '<td>'.$r->item_id.'</td>';
				echo '<td name="bar_code" class="edit">'.$r->bar_code.'</td>';
				echo '<td name="item_code" class="edit">'.$r->item_code.'</td>';
				echo '<td name="desc1" class="edit">'.$r->desc1.'</td>';
				echo '<td name="desc2" class="edit moreDetail">'.$r->desc2.'</td>';
				echo '<td name="desc3" class="edit moreDetail">'.$r->desc3.'</td>';
				echo '<td name="desc4" class="edit moreDetail">'.$r->desc4.'</td>';
				echo '<td name="division" class="dd_edit">'.$r->division.'</td>';
				echo '<td name="group" class="edit">'.$r->group.'</td>';
				echo '<td name="class1" class="edit">'.$r->class1.'</td>';
				echo '<td  name="class2" class="edit moreDetail">'.$r->class2.'</td>';
				echo '<td  name="cost" class="edit">'.$r->cost.'</td>';
				echo '<td  name="retail_price" class="edit">'.$r->retail_price.'</td>';
				echo '<td  name="model_quantity" class="edit moreDetail">'.$r->model_quantity.'</td>';
				echo '<td  name="supplier_code" class="dd_edit moreDetail">'.$r->supplier_code.'</td>';
				echo '<td  name="manufacturer" class="edit moreDetail">'.$r->manufacturer.'</td>';
				echo '<td  name="quantity" class="edit">'.$r->quantity.'</td>';
				echo '<td  name="reorder_point" class="edit moreDetail">'.$r->reorder_point.'</td>';
				echo '</tr></tbody>';
				
				
			}
			echo '</table></div>';
		}
	
?>
