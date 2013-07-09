<div>
<?php

//for CREDIT payment	
	$customer = $this->pos_model->getAll_customers();
	$data = array();
	$data[''] = 'Select Customer';
	if(isset($customer)){
		foreach($customer as $row){
			$data[$row->customer_id] = $row->customer_name;
		}
	}
	echo form_open('credits/pay_credit', array('onsubmit'=>"return confirm('Finalize payment?') "));
?>
	<table style="text-align:right">
		<tr>
			<td>
				<?php echo 'Customer:'.form_dropdown('customerName', $data,'','id="customerName" autocomplete="off" required'); ?>
			</td>
		</tr>
		<tr>
			<td>
				Amount: <input type='text' name='customerCash' style='height:50px;width:170px;font-size:45px;' />
			</td>
		</tr>
		<tr>
			<td>
				<input type='submit' value='Pay' class='button' required/>
			</td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</div>
