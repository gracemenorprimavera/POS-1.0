
<div class="error" style="font-size: 18px;height: 19px;padding-bottom: 5px;"><b><?php echo $message; ?></b></div>
<?php echo form_open('sales/add_item'); 
$this->load->helper('string');
?>

<div id="cashier">
<div id="sales">
	<input type='hidden' class='hItemPurchase' name='hItemPurchase' />
	<label> Item </label>
	<select name='searchMode'><option value="Barcode">Barcode</option><option value="Itemcode">Item code</option></select>
	<input type="text" name="search_item" id="search_item" class="tags" tabindex="1" autofocus />
	<label> Quantity </label> <input type="number" name="quantity" value="1" min="1" tabindex="2">
	<input class="button" type="submit" name="submit" value="Submit" />
<?php echo form_close(); ?>



<?php echo form_open('sales/do_purchase') ?>
<table cellpadding="6" cellspacing="1" style="width:100%;">
<thead >
<tr>
  <th>QTY</th>
  <th>Item Description</th>
  <th style="text-align:right">Item Price</th>
  <th style="text-align:right">Sub-Total</th>
  <th>Action</th>
</tr>
</thead>
</table>
<div id="list">
<table cellpadding="6" cellspacing="1" style="width:100%;">
<tbody >
<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

	<tr>
	  <td>
	  	<?php echo $items['qty']//echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:right">P<?php echo $this->cart->format_number($items['subtotal']); ?></td>
	  <td> <?php echo anchor('sales/remove_item/'.$items['rowid'], 'Cancel',array('onclick' => "return confirm ('Are you sure want to cancel this item?')")); ?> </td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>

<!--<tr>
  <td colspan="2"></td>
  <td class="right"><strong>Total</strong></td>
  <td class="right" id="totalPurchase">P<?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>-->
</tbody>
</table>
</div>
</div>


<div id="purchase">

<div id="inside" >
<div class="info">[Date: XXXXX]	[Time: XXXXX] <br>
[Transaction No.: XXXXX]</div>
<div class="who">[Customer: XXXXX]</div>
</div>
<br>
<div id="currentItem">[insert current ITEM PRICE QTY? here]</div>
<div class="label" >Amount Due:
	<div id="total" >P<?php echo $this->cart->format_number($this->cart->total()); ?></div>
</div><br>
<div id="tc">[Tendered: XXXXX]	<br> [Change: XXXXX] </div>

<div id="cart" >
<?php
	if($this->cart->total_items() > 0) {
		
		$data = array(
			'name'        => 'paymentChoice',
			'id'          => 'cashChoice',
			'value'       => 'cash',
			'checked'     => FALSE,
			'autocomplete' => 'off',
			'type'			=> 'radio'
		);

		echo form_checkbox($data);
		echo '<span>Cash</span>';
		
		$data = array(
			'name'        => 'paymentChoice',
			'id'          => 'creditChoice',
			'value'       => 'credit',
			'checked'     => FALSE,
			'autocomplete' => 'off',
			'type'			=> 'radio'
		);

		echo form_checkbox($data);
		echo '<span>Credit</span>';
		
		echo '<br>';
		echo "<div style='display:none' id='hcustomerCash'>Customer Cash: <input type='text' name='customerCash' id='customerCash' /><button onclick='alertChange();'>PAY</button></div>";
			
		//print_r($customer);
		$data = array();
		$data[''] = 'Please Select';
		
		if(isset($customer)){
			foreach($customer as $row){
				$data[$row->customer_id] = $row->customer_name;
			}
		}

		echo '<div style="display:none" id="hcustomerName">Customer name:'.form_dropdown('customerName', $data,'','id="customerName" autocomplete="off" ')."<button >RECORD</button></div>"; 		//incoming from
		echo '<br><br>';
	}
echo form_close();

//echo form_open('cashier/cancel_trans');
 	
	echo '<b>'.anchor('sales/cancel_trans',' Cancel Transaction','class="error"',array('onclick' => "return confirm ('Are you sure want to cancel this transaction?')")).'</b>'; 
	
//echo form_close();
 ?>	
</div>
</div>
</div>



	



