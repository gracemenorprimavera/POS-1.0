<div id="expense_form" class="forms">
	<?php 
		echo form_open('cashier/createExpense');
		$options = array(
				'' => 'Please Select',
				'salary' => "Employee's Salary",
				'remittance' => "Remitted Cash",
				'operationals' => "Operationals",
				'other' => 'Others'
			);

		$data1 = array(
              'name'        => 'expenseDate',
              'id'          => '',
              'value'       => date('m/d/Y'),
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
			  'required'	=> 'required',
			  'readonly'	=> 'readonly'
    	);
		echo '<table  cellpadding="10px">';
		echo '<tr><th>Expense <br>'.form_dropdown('expenses_dropdown', $options,'','id="expense" autocomplete="off" required').'</th>';
		echo '<th>Expense Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'exp_desc')).'</th>';

		echo '<th><label for="invoiceDate">Delivery date </label><br>';	//delivery date
		echo form_input($data1).'</th></tr>';

		echo '<tr><th>Amount<br>'.form_input('expense_amount', '').'</th>';
			
		echo '<th><br>';
		echo form_submit(array('class'=>'button','name'=>'expense_submit'),'Record');
		echo form_close();
		echo '</th></tr></table>';
	?>
</div>
<?php echo anchor('pos/cashier_home', 'Home', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>