<div id="recept" style="width:50%;border:3px solid brown;margin:auto;">
<div style="width:200px;text-align:left;border:0px solid black;margin:auto;">
	<br>
	<?php //echo date('F d, Y'); ?>	
	<?php echo date("D M d, Y G:i a"); ?> <br>
	<?php echo 'Transaction No:' ?>
	<?php echo $this->pos_model->get_transID(); ?> <br>
	<?php echo 'Personnel: '.$this->session->userdata('name').'<br>'; ?> 
	<?php echo 'Customer: '.$name; ?>

	<br><br>
</div> <!-- end div id=who -->
	<table cellpadding="6" cellspacing="1" style="width:70%;margin:auto;" border="0px solid black">
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
	<br><br><br>

<div style="width:200px;text-align:left;border:0px solid black;margin:auto;">
	<?php $total = $this->cart->format_number($this->cart->total()); ?>
	Total:	<?php echo 'P '.$this->cart->format_number($total); ?> <br>

	<?php 
		if($mode=='cash') { 
			echo 'Tendered: P '.$this->cart->format_number($cash).'<br>';	 
		 	echo 'Change: P '.$this->cart->format_number($total-$cash).'<br>';
		} // end of mode=cash 
		else if($mode=='credit') { 
			echo 'Customer: '.$name.'<br>';
 		} // end of mode=credit 	
		else if($mode=='check') { 
			echo 'Check #: '.$check_num.'<br>';
			echo 'Check Date: '.date('F d, Y', strtoTime($check_date)).'<br>';
			echo 'Check Amount: P '.$this->cart->format_number($check_amount).'<br>';
		} // end of mode=check ?>		
	
	
	<br>
</div>


</div>
<div style="text-align:center;">
	<br><br>
	<b><?php echo $message; ?></b><br>
	<button style="height:50px; width:200px" class="dialogThis2 button" id=""> Print </button>
</div>





	



 