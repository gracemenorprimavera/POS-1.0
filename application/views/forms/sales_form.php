
<div id="cashier">
<div id="sales">

<?php 
	echo form_open('sales/add_item'); 
	$this->load->helper('string');
?>
	<input type='hidden' class='hItemPurchase' name='hItemPurchase' />	
	<select name='searchMode'><option value="Barcode" <?php if($searchMode == 'Barcode') echo 'selected'; ?> >Barcode</option><option value="Itemcode" <?php if($searchMode == 'Itemcode') echo 'selected'; ?>>
		Item code</option></select>	<input type="text" name="search_item" id="search_item" class="tags" tabindex="1" style="height:20px;width:150px;" autofocus />
	<label> Quantity </label> <input type="number" name="quantity" value="1" min="1" tabindex="2" style="height:20px;width:50px;" >
	<input class="button" type="submit" name="submit" value="Add Item" />
<?php 
	echo form_close(); 
?>

<!--<?php echo form_open('sales/add_item') ?>	
	<label> Bar Code </label> <input type="text" name="search_item" id="search_item" class="tags" tabindex="1" autofocus>
	<label> Quantity </label> <input type="number" name="quantity" value="1" min="1" tabindex="2">
	<input class="button" type="submit" name="submit" value="Submit" />
<?php echo form_close(); ?>
-->
<?php echo form_open('sales/do_purchase', array('onsubmit'=>"return confirm('Save Transaction?') ")) ?>
	<table cellpadding="6" cellspacing="1" style="width:100%;" border="1px solid black">
		<thead >
		<tr>
		  <th>QTY</th>
		  <th>Item </th>
		  <th style="text-align:right">Item Price</th>
		  <th style="text-align:right">Sub-Total</th>
		  <th>Action</th>
		</tr>
		</thead>
	</table>
	
	<div id="list">
	<table cellpadding="6" cellspacing="1" style="width:100%;text-align:left;" border="1px solid black">
		<tbody >
			<?php $i = 1; ?>
			<?php foreach ($this->cart->contents() as $items): ?>
			<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
			<tr>
	  			<td>
	  				<?php echo $items['qty']//echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
	  			</td>
	 			<td>
					<?php echo $items['name']; ?>
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
<table cellpadding="10" style="border:0px solid white;width:100%;">
	<tr>
	<?php if($this->cart->total_items() > 0) { ?>
	<td><?php echo $items['qty'].' '; ?></td>
	<td><?php echo $items['name'].' '; ?><td>
	<td><?php echo $items['price'].' '; ?><td>
	<td><?php echo $items['subtotal'].' '; }?><td>
	</tr>
</table>
</div> <!-- end div id=sales -->

<div class="error" style="font-size: 18px;height: 19px;padding-bottom: 5px;">
	<b><?php echo $message; ?></b>
</div>

</div> <!-- end div id=currentItem -->


<div id="purchase" style="text-align:right">

<div id="inside" >
	<?php //echo date('F d, Y'); ?>	
	<?php echo '<b>'.date("D M d, Y G:i a").'</b>'; ?> <br>
	<?php echo '<b>Transaction No: </b>' ?>
	<?php echo $this->pos_model->get_transID()+1; ?> <br>
	<?php echo '<b>Personnel: </b>'.$this->session->userdata('name'); ?> 
	<?php 
		$data = array();
		$data[''] = 'Walk-in';
		if($customer){
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
			$name = 'Walk-In';
			$data = array(
					'name'=>'customerName',
					'value'=>'Walk-In',
					'readonly'	=> 'readonly'
				);
			echo '<div id="hcustomerName"><b>Customer: </b>'.form_input($data)."</div>";
			} 
	?>

	<br><br>
</div> <!-- end div id=inside -->

<div class="label" style="text-align:left">
	Amount Due:
	<div class="total" style="text-align:right" >
		<?php 
			if($this->cart->format_number($this->cart->total()))
				echo 'P '.$this->cart->format_number($this->cart->total());
			else { $totalAmt = 0; echo 'P 0.00'; } 
		?>
	</div>
	<button style="height:40px; width:90px;" class="dialogThis2 button" id="discountDialog"> Discount </button><br>
	Discount:
	<div class="total" style="text-align:right" >
		<?php 
			if(isset($discount))
				echo 'P '.$this->cart->format_number($discount);
			else { $discount = 0; echo 'P 0.00'; } 
		?>
	</div>
	Total:
	<div class="total" style="text-align:right" >
		<?php 
			if($discount > 0) {
				echo 'P '.$this->cart->format_number(($this->cart->total()-$discount));
				$totalAmt = $this->cart->total()-$discount;
			}
			else if(!$this->cart->format_number($this->cart->total()))
				 echo 'P 0.00';
			else {
				echo $this->cart->format_number($this->cart->total()); 
				$totalAmt = $this->cart->total();
			}
		?>
	</div>
	
	<?php echo form_hidden('discount', $discount); ?>
	<?php echo form_hidden('totalAmt', $totalAmt); ?>

<br>
	<?php if(isset($cash) && $cash>0) { ?>
		Tendered: <div class="total" style="text-align:right" >
		<?php echo $this->cart->format_number($cash); ?></div>
		<?php $change = $cash-$this->cart->format_number($this->cart->total()); ?>
		Change: <div class="total" style="text-align:right" >
		<?php echo $this->cart->format_number($change) ?></div>
	<?php } else { ?>
		Tendered: <div class="total" style="text-align:right" >P 0.00</div>	
		Change: <div class="total" style="text-align:right" >P 0.00</div> 
	<?php } ?>
		<?php //echo form_submit(array('name'=>'purchase_submit', 'class'=>'button', 'style'=>"height:50px; width:200px"),'Save'); ?>
		<button style="height:50px; width:200px" class="dialogThis2 button" id="cashDialog"> Enter Cash </button>
</div>
	<?php if(isset($cash) && $cash>0) { 
		// if cash
		
		// if credit

		// if check
	}
	?>
<?php echo form_close(); ?>	

</div> <!-- end div id=purchase -->
</div> <!-- end div id=cashier -->



	



 