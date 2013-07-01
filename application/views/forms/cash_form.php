<?php echo form_open('sales/enter_cash'); ?>


<?php
		$data = array(
			'name'        => 'paymentChoice',
			'id'          => 'cashChoice',
			'value'       => 'cash',
			'checked'     => TRUE,
			'autocomplete' => 'off',
			'type'			=> 'radio'
		);

		echo form_checkbox($data);
		echo '<span>Cash</span>';
		echo "<div style='display:inline-box' id='hcustomerCash'><input style='height:50px;width:170px;font-size:45px;' type='number' name='cash' value='0.00' required /></div>";
?>

<span>Other mode of payment</span><br>

<?php
//Other payment choice

		$data = array(
			'name'        => 'paymentChoice',
			'id'          => 'checkChoice',
			'value'       => 'check',
			'checked'     => FALSE,
			'autocomplete' => 'off',
			'type'			=> 'radio'
		);

		echo form_checkbox($data);
		echo '<span>Check</span>';
		
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
?>

	
<?php
echo '<br>';
//invisible divs for other mode of payments

//for CHECK payment
echo "<div style='display:none' id='hcustomerCheck'><table style='text-align:right;'><tr><td>Check # <input type='text' required /></td></tr><tr><td>Date <input type='date' required /></td></tr><tr><td>Amount <input type='text' required /></td></tr></table></div>";

//for CREDIT payment	
	$customer = $this->pos_model->getAll_customers();
	$data = array();
	$data[''] = 'Walk-in';
	if(isset($customer)){
		foreach($customer as $row){
			$data[$row->customer_id] = $row->customer_name;
		}
	}
echo '<div style="display:none" id="hcustomerName">Customer:'.form_dropdown('customerName', $data,'','id="customerName" autocomplete="off" required')."</div>";
echo '<br>';
?>

<?php echo form_submit(array('name'=>'cash_button', 'class'=>'button'), 'Continue'); ?>
<?php echo form_close(); ?>