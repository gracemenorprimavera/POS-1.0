<div id="receipt" >
	<h1 style="text-align:center;">RECEIPT</h1>
	<br>
	<span style="margin-left:15px;">
		-------------------------------------------------------------------------------------</span>
	<br>
<div style="margin-left:20px;">	
	<?php //echo date('F d, Y'); ?>	
	<?php echo 'Transaction No: &nbsp;&nbsp;' ?> 
	<?php echo $this->pos_model->get_transID(); ?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo date("D M d, Y G:i a"); ?>
	<?php echo 'Personnel: &nbsp;&nbsp;'.$this->session->userdata('name').'<br>'; ?> 
	<?php echo 'Customer: &nbsp;&nbsp;'.$name; ?>

	<br>
	
</div> <!-- end div id=who -->
<span style="margin-left:15px;">
		-------------------------------------------------------------------------------------</span>
	<table cellpadding="5" cellspacing="1" style="width:85%;margin:auto;" border="0px solid black">
		<tr>
		  <th>QTY</th>
		  <th>Item</th>
		  <th style="text-align:right">Item Price</th>
		  <th style="text-align:right">Sub-Total</th>
		</tr>
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
	<br><span style="margin-left:15px;">
		===========================================</span>		

<div style="text-align:left;bordermargin:auto;">
	<table cellpadding="5" cellspacing="1" style="width:90%;margin:auto;" border="0px solid black">
	<?php $total = $this->cart->format_number($this->cart->total()); ?>
	<tr><td>Subtotal:	</td><td style="text-align:right;"><?php echo 'P '.$this->cart->format_number($total); ?> </td></tr>
	<tr><td>Discount:	</td><td style="text-align:right;"><?php echo 'P '.$this->cart->format_number($discount); ?> </td></tr>
	<tr><td><b>Total:	</b></td><td style="text-align:right;"><b><?php echo 'P '.$this->cart->format_number($totalAmt); ?></b> </td></tr>

	<?php 
		if($mode=='cash') { 
			echo '<tr><td>Tendered: </td><td style="text-align:right;">P '.$this->cart->format_number($cash).'</td></tr>';	 
		 	echo '<tr><td>Change: </td><td style="text-align:right;">P '.$this->cart->format_number($total-$cash).'</td></tr>';
		 	$change = $total-$cash;
		} // end of mode=cash 
		else if($mode=='credit') { 
			echo '<tr><td>Credit Customer: </td><td style="text-align:right;">'.$name.'</td>';
			$change = 0;
			$cash = 0;
 		} // end of mode=credit 	
		else if($mode=='check') { 
			echo '<tr><td>Check #: </td><td style="text-align:right;">'.$check_num.'</td>';
			echo '<tr><td>Check Date: </td><td style="text-align:right;">'.date('F d, Y', strtoTime($check_date)).'</td></tr>';
			echo '<tr><td>Check Amount: </td><td style="text-align:right;">P '.$this->cart->format_number($check_amount).'</td></tr>';
			$change = 0;
			$cash = 0;
		} // end of mode=check ?>		
	</table>
</div>
	<span style="margin-left:15px;">
		===========================================</span>
<h3  style="text-align:center;font-weight:lighter;">Thank you and come again!</h3>

</div>
<div style="text-align:center;float:left;margin:50px;">
	<div class="label" style="text-align:left">
	Amount Due:
	<div class="total" style="text-align:right" >
		<?php 
			if($this->cart->format_number($this->cart->total()))
				echo 'P '.$this->cart->format_number($this->cart->total());
			else { $totalAmt = 0; echo 'P 0.00'; } 
		?>
	</div>
	
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

<br>
	<?php if(isset($cash) && $cash>0) { ?>
		Tendered: <div class="total" style="text-align:right" >
		<?php echo $this->cart->format_number($cash); ?></div>
		<?php $change = $cash-$this->cart->format_number($this->cart->total()); ?>
		Change: <div class="total" style="text-align:right" >
		<?php echo $this->cart->format_number($change) ?></div>
	<?php } else { ?>
		Tendered: <div class="total" style="text-align:right" >P <?php echo $this->cart->format_number($cash); ?></div>	
		Change: <div class="total" style="text-align:right" >P <?php echo $this->cart->format_number($change); ?></div> 
	<?php } ?>
		<?php //echo form_submit(array('name'=>'purchase_submit', 'class'=>'button', 'style'=>"height:50px; width:200px"),'Save'); ?>
		
</div>
	<br><br><br><br><br><br><br>
	<b><?php echo $message; ?></b><br>
	<button style="height:50px; width:200px" class="button" id=""> Print </button>
</div>





	



 