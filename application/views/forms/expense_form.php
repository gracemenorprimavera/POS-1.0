<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; 
$user = $this->session->userdata('role'); 
?>
<div id="expense_form" class="forms">
	<span><?php echo $msg; ?></span>
	<?php 
		echo form_open('expenses/add_expense', array('onsubmit'=>"return confirm('Finalize Record?') "));
		$options = array(
				'' => 'Please Select',
				'expense' => "Expenses",
				
			);
		
		$cashout = $this->pos_model->getAll_cashout_cat();
		$options = array();
		$options[''] = 'Select one';
		if(isset($cashout)){
			foreach($cashout as $row){
				$options[$row->cashout_id] = $row->cashout;
			}
		}
		$options['add'] = "Add expense...";

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
		echo '<table  cellpadding="10px" border="0px solid black">';
		echo '<tr><th>Cash Out <br>'.form_dropdown('expenses_dropdown', $options,'','id="expense" autocomplete="off" required').'</th>';
		echo '<th>Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'exp_desc')).'</th>';

		echo '<th><label for="expenseDate">Date </label><br>';	//delivery date
		echo form_input($data1).'</th></tr>';

		$data = array('name'=>'expense_amount', 'required'=>'required');
		echo '<tr><td></td><th >Amount<br>'.form_input($data).'</th>';
			
		echo '<th><br>';
		echo form_submit(array('class'=>'button','name'=>'expense_submit'),'Record');
		echo form_close();
		echo '</th></tr></table>';
	?>
</div>
