<div id="expense_form" class="forms">
	<?php 
		echo form_open('cashier')
		$options = array(
				'empty' => ' ',
				'salary' => "Employee's Salary",
				'remittance' => "Remitted Cash",
				'operationals' => "Operationals",
				'other' => 'Others'
			);

		echo 'Expense: '.form_dropdown('expenses_dropdown', $options).'<br>';
		echo 'Amount: '.form_input('expense_amount', '').'<br>';
		echo 'Expense Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'exp_desc'));

		echo form_submit('expense_submit','Record Expense');
		echo form_close();
	?>
</div>