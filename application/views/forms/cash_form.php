<?php echo form_open('sales/enter_cash'); ?>

CASH 
	<br><input style="height:50px;width:170px;font-size:45px;" type="text" name="cash" value="0.00"><br>

<span>Other mode of payment</span><br>

<?php echo form_radio('check', 'check', FALSE); ?>Check
<?php echo form_radio('credit', 'credit', FALSE); ?>Credit<br>

	<table style="text-align:right;">
		<tr><td><span> Show this table if check is selected ^_^</span></td></tr>
		<tr><td>Check # <input type="text"></td></tr>
		<tr><td>Date <input type="date"></td></tr>
		<tr><td>Amount <input type="text"></td></tr>
	</table>



	<?php 
		$customer = $this->pos_model->getAll_customers();
			$data = array();
			$data[''] = 'Walk-in';
			if(isset($customer)){
				foreach($customer as $row){
					$data[$row->customer_id] = $row->customer_name;
				}
			}
			echo '<span> Show this table if credit is selected ^_^</span>';
			echo '<div id="hcustomerName">Customer:'.form_dropdown('customerName', $data,'','id="customerName" autocomplete="off" ')."</div>"; 
		?> 
<?php echo form_submit(array('name'=>'cash_button', 'class'=>'button'), 'Continue'); ?>
<?php echo form_close(); ?>