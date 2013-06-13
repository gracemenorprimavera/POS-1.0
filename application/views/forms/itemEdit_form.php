<div id="item_form" class="forms">
	<?php echo form_open('items/edit_item');
	
	echo '<h3>EDIT ITEM</h3>
		 Fill in required fields marked with *<br><br>';
	$myitem = $this->pos_model->get_edit_item($edit);

	foreach ($myitem as $r) {

  echo 'Bar Code: <input type="text" name="barcode" value="'.$r->bar_code.'" required><br>
		Item Code: <input type="text" name="itemcode" value="'.$r->item_code.'" required><br>
		Description 1 (brandm sub-brand): <input type="text" name="desc1" value="'.$r->desc1.'" required><br>
		Description 2 (product_name): <input type="text" name="desc2" value="'.$r->desc2.'" required><br>
		Description 3 (variant, flavor): <input type="text" name="desc3" value="'.$r->desc3.'"><br>
		Description 4 (size, packaging): <input type="text" name="desc4" value="'.$r->desc4.'"><br>
		Group: <input type="text" name="group" value="'.$r->group.'" required><br>
		Classification 1: <input type="text" name="class1" value="'.$r->class1.'" required><br>
		Classification 2: <input type="text" name="class2" value="'.$r->class2.'"><br>
		Cost: <input type="text" name="cost" value="'.$r->cost.'" required><br>
		Retail Price: <input type="text" name="price"value="'.$r->retail_price.'" required><br>
		Model Quantity: <input type="text" name="m_quantity" value="'.$r->model_quantity.'"><br>
		Supplier Code: <input type="text" name="supplier_code" value="'.$r->supplier_code.'"required><br>
		Manufacturer: <input type="text" name="manufacturer" value="'.$r->manufacturer.'" required><br>
		Quantity:  <input type="number" name="quantity" value="'.$r->quantity.'" min="0" required><br>
		Reorder Point: <input type="number" name="reorder_point" value="'.$r->reorder_point.'" min="0" required><br>';


	echo form_submit(array('class'=>'button', 'name'=>'edit_submit'), 'Edit Item');
	echo anchor('admin/goto_view_items', ' Cancel ');
}?>


	<?php echo form_close(); ?>
</div>