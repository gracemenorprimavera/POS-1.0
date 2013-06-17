<div id="item_success">
<?php 
	
		echo '<h3> Item Updated!</h3>';
	
			$myitem = $this->pos_model->get_edit_item($edit);

	foreach ($myitem as $r) {
		$id = $r->item_id;
		//echo $id;
?>

		
			Bar Code: <i><b><?php echo $r->bar_code; ?></b></i><br>
			Item Code: <i><b><?php echo $r->item_code; ?></b></i><br>
		
			Description 1 (brandm sub-brand) : <i><b><?php echo $r->desc1; ?></b></i><br>
			Description 2 (product_name): <i><b><?php echo $r->desc2; ?></b></i><br>
		
			Description 3 (variant, flavor): <i><b><?php echo $r->desc3; ?></b></i><br>
			Description 4 (size, packaging): <i><b><?php echo $r->desc4; ?></b></i><br>
		
			Group: <i><b><?php echo $r->group; ?></b></i><br>
			Division: <i><b><?php echo $r->division; ?></b></i><br>
		
			Classification 1: <i><b><?php echo $r->class1; ?></b></i><br>
			Classification 2: <i><b><?php echo $r->class2; ?></b></i><br>
		
			Cost: <i><b><?php echo $r->cost; ?></b></i><br>
			Retail Price: <i><b><?php echo $r->retail_price; ?></b></i><br>
		
			Model Quantity: <i><b><?php echo $r->model_quantity; ?></b></i><br>
			Supplier Code: <i><b><?php echo $r->supplier_code; ?></b></i><br>
		
			Manufacturer: <i><b><?php echo $r->manufacturer; ?></b></i><br>
			Quantity:  <i><b><?php echo $r->quantity; ?></b></i><br>
		
			Reorder Point: <i><b><?php echo $r->reorder_point; ?></b></i><br><br>
		

<?php
	}
	echo anchor('items/goto_editItemForm/'.$id, 'Edit Item').'<br>';
	echo anchor('items/view_items', 'View Items');

?>
</div>