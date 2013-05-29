<div id="item_form" class="forms">
	<?php echo form_open('admin/add_item'); ?>
		Bar Code: <input type="text" name="barcode" required><br>
		Item Code: <input type="text" name="itemcode" required><br>
		Description 1 (brandm sub-brand): <input type="text" name="desc1" required><br>
		Description 2 (product_name): <input type="text" name="desc2" required><br>
		Description 3 (variant, flavor): <input type="text" name="desc3"><br>
		Description 4 (size, packaging): <input type="text" name="desc4"><br>
		Group: <input type="text" name="group" required><br>
		Classification 1: <input type="text" name="class1" required><br>
		Classification 2: <input type="text" name="class2"><br>
		Cost: <input type="text" name="cost" required><br>
		Retail Price: <input type="text" name="price" required><br>
		Model Quantity: <input type="text" name="m_quantity"><br>
		Supplier Code: <input type="text" name="supplier_code" required><br>
		Manufacturer: <input type="text" name="manufacturer" required><br>
		Quantity:  <input type="number" name="quantity" required><br>
		Reorder Point: <input type="number" name="reorder_point" required><br>

	<?php echo form_submit('add_submit', 'Add Item'); ?>
	<?php echo form_close(); ?>
</div>