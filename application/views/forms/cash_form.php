<?php echo form_open('sales/enter_cash'); ?>
<?php 
	$customer = $this->pos_model->getAll_customers();
		$data = array();
		$data[''] = 'Walk-in';
		if(isset($customer)){
			foreach($customer as $row){
				$data[$row->customer_id] = $row->customer_name;
			}
		}
		echo '<div id="hcustomerName">Customer:'.form_dropdown('customerName', $data,'','id="customerName" autocomplete="off" ')."</div>"; 
	?> 

CASH <input type="text" name="cash" value="0.00"><br>
<span>Other mode of payment</span><br>
<?php echo form_checkbox('check', 'Check', FALSE); ?>Check<br>

<?php echo form_submit(array('name'=>'cash_button', 'class'=>'button'), 'Continue'); ?>
<?php echo form_close(); ?>