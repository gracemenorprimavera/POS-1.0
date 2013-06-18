<div id="item_form" class="forms">
	<?php echo form_open('items/edit_item', array('onsubmit'=>"return confirm('Finalize Edit Item?') "));
	
	$myitem = $this->pos_model->get_edit_item($edit);

	foreach ($myitem as $r) {
		echo form_hidden('item_id', $r->item_id);
		//echo $r->item_id;
	?>

		<table>
		<tr>
			<td>Bar Code: <input type="text" name="barcode" value="<?php echo $r->bar_code; ?>"></td>
			<td>Item Code: <input type="text" name="itemcode" value="<?php echo $r->item_code; ?>"></td>
		</tr><tr>
			<td>Description 1 (brandm sub-brand) : <input type="text" name="desc1" value="<?php echo $r->desc1; ?>" required></td>
			<td>Description 2 (product_name): <input type="text" name="desc2" value="<?php echo $r->desc2; ?>" required></td>
		</tr><tr>
			<td>Description 3 (variant, flavor): <input type="text" value="<?php echo $r->desc3; ?>" name="desc3"></td>
			<td>Description 4 (size, packaging): <input type="text" value="<?php echo $r->desc4; ?>" name="desc4"></td>
		</tr><tr>
			<td>Group: <input type="text" name="group" value="<?php echo $r->group; ?>" required></td>
			<td>Division: <?php echo form_dropdown('division', array('' => 'Select Division','grocery'=>'Grocery', 'poultry'=> 'Poultry', 'pet'=>'Pet Supply'), $r->division, 'required') ?></td>
		</tr><tr>
			<td>Classification 1: <input type="text" name="class1" value="<?php echo $r->class1; ?>" required></td>
			<td>Classification 2: <input type="text" name="class2" value="<?php echo $r->class2; ?>"></td>
		</tr><tr>
			<td>Cost: <input type="text" name="cost" value="<?php echo $r->cost; ?>" required></td>
			<td>Retail Price: <input type="text" name="price" value="<?php echo $r->retail_price; ?>" required></td>
		</tr><tr>
			<td>Model Quantity: <input type="text" value="<?php echo $r->model_quantity; ?>" name="m_quantity"></td>
			<td>Supplier Code: <input type="text" value="<?php echo $r->supplier_code; ?>" name="supplier_code" required></td>
		</tr><tr>
			<td>Manufacturer: <input type="text" value="<?php echo $r->manufacturer; ?>" name="manufacturer" required></td>
			<td>Quantity:  <input type="number" value="<?php echo $r->quantity; ?>" name="quantity" min="0" required></td>
		</tr><tr>
			<td>Reorder Point: <input type="number" value="<?php echo $r->reorder_point; ?>" name="reorder_point" min="0" required></td>
		</tr>
	</table>


<?php
	echo form_submit(array('class'=>'button', 'name'=>'edit_submit'), 'Edit Item');
	echo anchor('items/goto_itemPage', ' Cancel', array('onclick'=>"return confirm('Cancel Edit Item?')"));
	}
?>


	<?php echo form_close(); ?>
</div>