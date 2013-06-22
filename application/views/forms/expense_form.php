<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>
<?php 
	$user = $this->session->userdata('role'); 
?>
<div id="expense_form" class="forms">
	<?php 
		echo form_open('expenses/add_expense/'.$user, array('onsubmit'=>"return confirm('Finalize Record?') "));
		$options = array(
				'' => 'Please Select',
				'DELIVERY' => "Delivery Payment",
				'SUPPLIES' => "Supplies",
				'SALARY' => "Salary",
				'RENT'=>"Rent",
				'EMPLOYEE_ALLOWANCE'=>"Employee Fare Allowance",
				'COMMUNICATION_ALLOWANCE'=>"Store Communication Allowance",
				'FOOD_ALLOWANCE'=>"Store Food Allowance",
				'MAINTENANCE'=>"Store Maintenance/Repairs",
				'other' => 'Others'
			);
		if($user=='admin') {
			$data1 = array(
	              'name'        => 'expenseDate',
	              'id'          => '',
	              'type'		=> 'date',
	              //'value'       => date('m/d/Y'),
	              'maxlength'   => '',
	              'size'        => '',
	              'style'       => '',
				  'required'	=> 'required'
	    	);
	    }
	    else {
	    	$data1 = array(
	              'name'        => 'expenseDate',
	              'id'          => '',
	              'value'       => date('y-m-d'),
	              'maxlength'   => '',
	              'size'        => '',
	              'style'       => '',
				  'required'	=> 'required',
				  'readonly'	=> 'readonly'
	    	);
	    }
		echo '<table  cellpadding="10px">';
		echo '<tr><th>Cash Out <br>'.form_dropdown('expenses_dropdown', $options,'','id="expense" autocomplete="off" required').'</th>';
		echo '<th>Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'exp_desc')).'</th>';

		echo '<th><label for="expenseDate">Date </label><br>';	//delivery date
		echo form_input($data1).'</th></tr>';

		$data = array('name'=>'expense_amount', 'required'=>'required');
		echo '<tr><th>Amount<br>'.form_input($data).'</th>';
			
		echo '<th><br>';
		echo form_submit(array('class'=>'button','name'=>'expense_submit'),'Record');
		echo form_close();
		echo '</th></tr></table>';
	?>
</div>
