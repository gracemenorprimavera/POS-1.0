<?php 
	if($this->session->userdata('role')=='admin') 
	echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; 
	$user = $this->session->userdata('role'); 
?>
<div id="cashout_form" class="forms">
	<span><?php echo $msg; ?></span>
	<?php 
		echo form_open('expenses/add_cashout', array('onsubmit'=>"return confirm('Finalize Record?') "));
		
		$cashout = $this->pos_model->getAll_cashout_cat();
		$options = array();
		$options[''] = 'Select one';
		if(isset($cashout)){
			foreach($cashout as $row){
				$options[$row->cashout] = $row->cashout;
			}
		}
		if($this->session->userdata('role')=='admin')
			$options['add'] = "Add Cash Out...";

		if($user=='admin') {
			$data1 = array(
	              'name'        => 'cashoutDate',
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
	              'name'        => 'cashoutDate',
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
		echo '<tr><th>Cash Out <br>'.form_dropdown('cashout_dropdown', $options,'','id="cashout" autocomplete="off" required').'</th>';
		echo '<th>Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'cashout_desc')).'</th>';

		echo '<th><label for="cashoutDate">Date </label><br>';	//delivery date
		echo form_input($data1).'</th></tr>';

		$data = array('name'=>'cashout_amount', 'required'=>'required');
		echo '<tr><td></td><th >Amount<br>'.form_input($data).'</th>';
			
		echo '<th><br>';
		echo form_submit(array('class'=>'button','name'=>'cashout_submit'),'Record');
		echo form_close();
		echo '</th></tr></table>';
	?>
</div>
