<?php
$user = $this->session->userdata('role');
		echo validation_errors();
		echo form_open('outgoing/add_outgoing/'.$user);	//Controller -> Delivery, Action -> Create	

	if($user=='manager') {	//delivery date
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
	} 
	else {
		$data = array(
              'name'        => 'outgoingDate',
              'id'          => '',
              'type'		=> 'date',
              'value'       => date('m/d/Y'),
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
			  //'required'	=> 'required',
			  //'readonly'	=> 'readonly'
		);
	}
		
		$options = array(
				'' => 'Please Select',
				'transfer' => 'Transfer',
				'return' => 'Return Product' ,
				'bad_order' => 'Bad Order' ,
				'other' => 'Others'
		);

		echo '<table  cellpadding="10px"><tr>';
		echo '<th>Outgoing<br>'.form_dropdown('outgoing', $options, '', 'autocomplete="off" required').'</th>';
		echo '<th>Description <br>'.form_textarea(array('rows' => '3', 'cols'=>'20', 'name' => 'out_desc')).'</th>';
		echo '<th><label for="outgoingDate">Date </label><br>';
		echo form_input($data).'<th/>';
		echo '</tr></table>';
?>
<table id="outgoingTable">
	<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Amount</th><th>Action</th></tr>
	<tr>
		<td>											
	<?php
		echo '<input name="outgoingItem[]" id="outgoingItem" class="tags outgoingItem" autocomplete="off" required/>';
			
	?>
		</td>
		<td>
		<?php											//quantity
			$data = array(
				  'name'        => 'outgoingQty[]',
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
				  'name'        => 'outgoingPrice[]',
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
				  'name'        => 'outgoingAmt[]',
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
			<input class="button" style="margin-bottom:23px;" type="button" value="Delete Row" onclick="DeleteRowFunction2(this)" />
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
	<br/><br/>
	<label for="totalPrice">Total: </label><input type="input" name="outTotalPrice" id='outTotalPrice' autocomplete="off" readonly/> 
	<input class="button" type="submit" name="submit" value="Submit" />	
	
</form>
<?php echo anchor($user, 'Cancel Outgoing', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>