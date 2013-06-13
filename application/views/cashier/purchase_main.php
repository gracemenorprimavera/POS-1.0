
<?php echo $message; ?>
<?php echo form_open('sales/add_item') ?>
	<input type='hidden' class='hItemPurchase' name='hItemPurchase' />
	<label> Item </label><select name='searchMode'><option value="Barcode">Barcode</option><option value="Itemcode">Item code</option></select>
	 <input type="search" name="search_item" id="search_item" class="tags">
	<label> Quantity </label> <input type="number" name="quantity" value="1" min="1" >
	<?php echo form_submit(array('name'=>'enterItem_submit','class'=>'button' ),'Enter'); ?>
<?php echo form_close(); ?>

<?php $this->load->view('cashier/purchase_list'); ?>






	



