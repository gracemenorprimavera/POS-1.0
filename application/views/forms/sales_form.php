<!--
<div style="text-align:left">

	<button style="height:70px; width:100px" class="button"> Discount </button>
	<button style="height:70px; width:100px" class="button"> Submit/Save </button>
	<button style="height:70px; width:100px" class="button"> Print </button>
	<button style="height:70px; width:100px" class="button"> Reprint </button>
	

</div>
-->


<div id="cashier">
<div id="sales">
	<?php echo form_open('sales/add_item'); 
		$this->load->helper('string');
		?>
	<input type='hidden' class='hItemPurchase' name='hItemPurchase' />
	
	<select name='searchMode'><option value="Barcode" <?php if($searchMode == 'Barcode') echo 'selected'; ?> >Barcode</option><option value="Itemcode" <?php if($searchMode == 'Itemcode') echo 'selected'; ?>>Item code</option></select>
	<input type="text" name="search_item" id="search_item" class="tags" tabindex="1" style="height:20px;width:150px;" autofocus />
	<label> Quantity </label> <input type="number" name="quantity" value="1" min="1" tabindex="2" style="height:20px;width:50px;" >
	<input class="button" type="submit" name="submit" value="Add Item" />
	<?php echo form_close(); ?>



<?php echo form_open('sales/do_purchase') ?>
<table cellpadding="6" cellspacing="1" style="width:100%;" border="1px solid black">
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
<table cellpadding="6" cellspacing="1" style="width:100%;" border="1px solid black">
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
<div id="currentItem">
	<?php if($this->cart->total_items() > 0) { ?>
	<?php echo $items['qty'].' '; ?>
	<?php echo $items['name'].' '; ?>
	<?php echo $items['price'].' '; ?>
	<?php echo $items['subtotal'].' '; }?>
</div>
<div class="error" style="font-size: 18px;height: 19px;padding-bottom: 5px;"><b><?php echo $message; ?></b></div>

</div>


<div id="purchase" style="text-align:right">

<div id="inside" style="text-align:right">
<div class="info" style="text-align:right">

</div>

<div class="who" style="text-align:left">
	<?php //echo date('F d, Y'); ?>	
	<?php echo date("D M d, Y G:i a"); ?> <br>
	<?php echo 'Transaction No:' ?>
	<?php echo $this->pos_model->get_transID()+1; ?> <br>
	<?php 
		$data = array();
		$data[''] = 'Walk-in';
		if(isset($customer)){
			foreach($customer as $row){
				$data[$row->customer_id] = $row->customer_name;
			}
		}
		if(isset($cust) && $cust!="") {
			$name = $this->pos_model->get_customerName($cust);
			$data = array(
					'name'=>'customerName',
					'value'=>$name
				);
			echo '<div id="hcustomerName">Customer:'.form_input($data).'<br>';
			echo 'Balance: '.$this->pos_model->get_customerBalance($cust)."</div>";
		} 
		else {
			$data = array(
					'name'=>'customerName',
					'value'=>'Walk-In',
					'readonly'	=> 'readonly'
				);
			echo '<div id="hcustomerName">Customer: '.form_input($data)."</div>";
			} 
	?> <br><br>
</div>
</div>
<br>
<br>
<br>
<div class="label" style="text-align:right">
	Amount Due:
	<div id="total" style="text-align:right" >
		
		P
		<?php 
			if($this->cart->format_number($this->cart->total()))
				echo $this->cart->format_number($this->cart->total());
			else echo '0.00'; 
		?>
	
	
	</div>
	<br>
	<button style="height:50px; width:70px" class="dialogThis2 button" id=""> Discount </button>
	<button style="height:50px; width:70px" class="dialogThis2 button" id=""> Print </button>
	<button style="height:50px; width:70px" class="dialogThis2 button" id="cashDialog"> Enter Cash </button>
</div><br>
<div id="tc" style="text-align:right">
	<?php if(isset($cash) && $cash>0) { ?>
		[Tendered: <?php echo $this->cart->format_number($cash); ?>]	<br> 
		[Change: <?php echo $this->cart->format_number(($cash-$this->cart->format_number($this->cart->total()))) ?>] 
	<?php } else { ?>
		[Tendered: 0.00]	<br> 
		[Change: 0.00] <br><br>
	<?php } ?>
		<button style="height:50px; width:200px" class="dialogThis2 button" id=""> Save </button>

	</div>
<div id="cart" >
<?php
	/*if($this->cart->total_items() > 0) {
		
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
	}*/
echo form_close();

//echo form_open('cashier/cancel_trans');
 	

//echo form_close();
 ?>	
</div>
</div>
</div>



	



 