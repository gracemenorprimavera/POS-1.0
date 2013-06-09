<?php

echo validation_errors();
echo form_open('cashier/createDelivery');	//Controller -> Delivery, Action -> Create	

	
	$data1 = array(
              'name'        => 'invoiceDate',
              'id'          => '',
              'value'       => date('m/d/Y'),
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
			  'required'	=> 'required',
			  'readonly'	=> 'readonly'
    );

	$data = array();
	$data[''] = 'Please Select';
	foreach($supplier as $row){
		$data[$row->supplier_name] = $row->supplier_name;
	}

	echo '<table  cellpadding="10px"><tr>';	
	echo '<th>Incoming from <br>(Supplier) <br>'.form_dropdown('outgoing', $data,'','id="outgoing" autocomplete="off" required').'</th>'; 		//incoming from
	echo '<th>Incoming Description <br>'.form_textarea(array('rows' => '3', 'cols'=>'20', 'name' => 'in_desc', 'autocomplete' => 'off')).'</th>';		//comments
	echo '<th><label for="invoiceDate">Delivery date </label><br>';	//delivery date
	echo form_input($data1).'</th>';
	echo '</tr></table>';		
?>
	<table id="deliveryTable">
	<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Amount</th><th>Action</th></tr>
	<tr>
		<td>											
		<?php											//item
		$options = array(
			'' => 'Select one'
        );		
		echo form_dropdown('invoiceItem[]',$options,'','class="invoiceItem" autocomplete="off" required');
		?>
		</td>
		<td>
		<?php											//quantity
			$data = array(
				  'name'        => 'invoiceQty[]',
				  'type'		=> 'number',
				  'id'          => '',
				  'class'		=> 'invoiceQty',
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
				  'name'        => 'invoicePrice[]',
				  'type'		=> 'text',
				  'id'          => '',
				  'class'		=> 'invoicePrice',
				  'value'       => '',
				  'maxlength'   => '',
				  'size'        => '',
				  'style'       => '',
				  'autocomplete' => 'off',
				  'required'	=> 'required',
		);

		echo form_input($data);
		?>
		</td>
		<td>
		<?php
			$data = array(								//amount = qty * price
				  'name'        => 'invoiceAmt[]',
				  'id'          => '',
				  'class'		=>	'invoiceAmt',
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
			<input class="button" style="margin-bottom:23px;" type="button" value="Delete Row" onclick="DeleteRowFunction(this)" />
		</td>
	</tr>
	</table>
	<?php
		$data = array(
			'name' => 'addDeliveryRow',
			'id' => 'addDeliveryRow',
			'value' => '',
			'type' => 'button',
			'content' => 'Add Row'
		);

		echo form_button($data);
	
	?>
	<br/><br/>
	<label for="totalPrice">Total: </label><input type="input" name="totalPrice" id='totalPrice' autocomplete="off" readonly/>
	<input class="button" type="submit" name="submit" value="Submit" />
</form>
<?php echo anchor('pos/cashier_home', 'Cancel Delivery', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>