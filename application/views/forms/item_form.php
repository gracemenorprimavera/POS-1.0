<div id="item_form" class="forms">
	
	Fill in required fields marked with *<br><br>
	<?php echo form_open('items/add_item'); ?>
		Bar Code: <input type="text" name="barcode" ><br>
		Item Code: <input type="text" name="itemcode" ><br>
		Description 1 (brandm sub-brand): <input type="text" name="desc1" required><br>
		Description 2 (product_name): <input type="text" name="desc2" required><br>
		Description 3 (variant, flavor): <input type="text" name="desc3"><br>
		Description 4 (size, packaging): <input type="text" name="desc4"><br>
		Group: <input type="text" name="group" required><br>
		Division: <input type="text" name="group" required><br>
		Classification 1: <input type="text" name="class1" required><br>
		Classification 2: <input type="text" name="class2"><br>
		Cost: <input type="text" name="cost" required><br>
		Retail Price: <input type="text" name="price" required><br>
		Model Quantity: <input type="text" name="m_quantity"><br>
		<!--Supplier Code: <input type="text" name="supplier_code" required><br>-->
		<?php 
		$data = array();
		$data[''] = 'Please Select';
		if(isset($supplier)){
			foreach($supplier as $row){
				$data[$row->supplier_name] = $row->supplier_name;
			}
		}	
		echo 'Supplier Code: '.form_dropdown('supplierItem', $data,'','id="supplierItem" autocomplete="off" required');
		echo '<input type="text" id="addSupplier_input" placeholder="New supplier" /><input type="button" id="addSupplier" class="addCategory" value="Add" onclick="return false;"/><br>';
		?>
		Manufacturer: <input type="text" name="manufacturer" required><br>
		Quantity:  <input type="number" name="quantity" min="0" required><br>
		Reorder Point: <input type="number" name="reorder_point" min="0" required><br>

	<?php echo form_submit(array('class'=>'button', 'name'=>'add_submit'), 'Add Item'); ?>
	<?php echo form_close(); ?>
</div>