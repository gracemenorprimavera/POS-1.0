
<div id="delivery_form" class="forms">
<h3> DELIVERY FORM </h3>	
	
	Supplier: 
		<?php 
			$options = array(
				'empty' => 'To be generated from the db',
				'one' => 'Supplier 2'
			);
			echo form_dropdown('supplier_dropdown', $options); 
		?><br>
	Items: <input type="text" name="delivered_item"><br>

</div>