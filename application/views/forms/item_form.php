<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; 
?>

<div id="item_form" class="forms">
	
	<?php echo form_open('items/add_item', array('onsubmit'=>"return confirm('Finalize Add Item?') ")); ?>
	<table>
		<tr>
			<td>Bar Code: <input type="text" name="barcode" id="barcode_itemform" ></td>
			<td>Item Code: <input type="text" name="itemcode" ></td>
		</tr><tr>
			<td>Description 1 (brandm sub-brand) : <input type="text" name="desc1" required></td>
			<td>Description 2 (product_name): <input type="text" name="desc2" required></td>
		</tr><tr>
			<td>Description 3 (variant, flavor): <input type="text" name="desc3"></td>
			<td>Description 4 (size, packaging): <input type="text" name="desc4"></td>
		</tr><tr>
			<td>Group: <input type="text" name="desc4"></td>
			<td>Division:
				<?php 
				$division = $this->pos_model->getAll_division_cat();
				$options = array();
				$options[''] = 'Select one';
				if(isset($division)){
					foreach($division as $row){
						$options[$row->div_id] = $row->division;
					}
				}
				$options['add'] = "Add division...";
			echo form_dropdown('division', $options, '', 'id="addDivision" required')
			?>
			</td>
		</tr><tr>
			<td>Classification 1: <input type="text" name="class1" required></td>
			<td>Classification 2: <input type="text" name="class2"></td>
		</tr><tr>
			<td>Cost: <input type="text" name="cost" required></td>
			<td>Retail Price: <input type="text" name="price" required></td>
		</tr><tr>
			<td>Model Quantity: <input type="text" name="m_quantity"></td>
			<?php 
			$data = array();
			$data[''] = 'Please Select';
			if(isset($supplier)){
				foreach($supplier as $row){
					$data[$row->supplier_name] = $row->supplier_name;
				}
			}	
			echo '<td>Supplier: '.form_dropdown('supplierItem', $data,'','id="supplierItem" autocomplete="off" required');
			//echo '<input type="text" id="addSupplier_input" placeholder="New supplier" /><input class="button" type="button" id="addSupplier" class="addCategory" value="Add" onclick="return false;"/></td>';
			?>
		</tr><tr>
			<td>Manufacturer: <input type="text" name="manufacturer" required></td>
			<td>Quantity:  <input type="number" name="quantity" min="0" required></td>
		</tr><tr>
			<td>Reorder Point: <input type="number" name="reorder_point" min="0" required></td>
		</tr>
	</table>
	<?php echo form_submit(array('class'=>'button', 'name'=>'add_submit'), 'Add Item'); ?>
	<?php echo form_close(); ?>
</div>