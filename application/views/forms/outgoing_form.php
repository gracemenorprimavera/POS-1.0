<?php

		echo validation_errors();
		echo form_open('cashier/createOutgoing');	//Controller -> Delivery, Action -> Create	

		echo '<label for="outgoingDate">Outgoing date: </label>';	//delivery date
		$data = array(
              'name'        => 'outgoingDate',
              'id'          => '',
              'value'       => date('m/d/Y'),
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
			  'required'	=> 'required',
			  'readonly'	=> 'readonly'
		);

		echo form_input($data).'<br/>';
		
		$options = array(
				'' => 'Please Select',
				'transfer' => 'Transfer',
				'return' => 'Return Product' ,
				'bad_order' => 'Bad Order' ,
				'snacks'=>'Employee Snack',
				'other' => 'Others'
		);

		echo 'Outgoing: '.form_dropdown('outgoing', $options, '', 'autocomplete="off" required').'<br>';
		echo 'Outgoing Description <br>'.form_textarea(array('rows' => '5', 'cols'=>'20', 'name' => 'out_desc'));
?>
<table id="outgoingTable">
	<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Amount</th><th>Action</th></tr>
	<tr>
		<td>											
	<?php
		echo '<input name="outgoingItem" id="tags" class="tags outgoingItem" autocomplete="off" required/>';
			
	?>
		</td>
		<td>
		<?php											//quantity
			$data = array(
				  'name'        => 'outgoingQty',
				  'type'		=> 'number',
				  'id'          => '',
				  'class'		=> 'outgoingQty',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
				  'required'	=> 'required',
				  'autocomplete' => 'off'
		);

		echo form_input($data);
		?>
		</td>
		<td>
		<?php
			$data = array(								//price
				  'name'        => 'outgoingPrice',
				  'id'          => '',
				  'class'		=> 'outgoingPrice',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
				  'autocomplete' => 'off',
				  'required'	=> 'required',
				  'readonly'	=> 'readonly'
		);

		echo form_input($data);
		?>
		</td>
		<td>
		<?php
			$data = array(								//amount = qty * price
				  'name'        => 'outgoingAmt',
				  'id'          => '',
				  'class'		=>	'outgoingAmt',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
				  'autocomplete' => 'off',
				  'required'	=> 'required',
				  'readonly'	=> 'readonly'
		);

		echo form_input($data);
		?>
		</td>
		<td>
			<input type="button" value="Delete Row" onclick="DeleteRowFunction2(this)" />
		</td>
	</tr>
	</table>
	<?php
			$data = array(
			'name' => 'addOutgoingRow',
			'id' => 'addOutgoingRow',
			'value' => '',
			'type' => 'button',
			'content' => 'Add Row'
		);

		echo form_button($data);
	
	?>
	<br/>
	<label for="totalPrice">Total: </label><input type="input" name="outTotalPrice" id='outTotalPrice' autocomplete="off" readonly/><br/>
	<input type="submit" name="submit" value="Submit" />	
	
</form>