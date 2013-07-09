<?php 
	if($this->session->userdata('role')=='admin') 
	echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; 

	$user = $this->session->userdata('role');
	echo validation_errors();
	echo '<span>'.$msg.'</span>';
	echo form_open('incoming/add_incoming', array('onsubmit'=>"return confirm('Finalize Record?') "));	

	if($user=='manager') {
		$data1 = array('name'=>'invoiceDate',
	              'id'=> '',          
	              'value'=> date('y-m-d'),
	              'maxlength'=> '',
	              'size'=> '',
	              'style'=> '',
				  'required'=> 'required',
				  'readonly'=> 'readonly',
				  'min'=>'0'
	    );
	}
	else {
		$data1 = array('name'=> 'invoiceDate',
	              'id'=> '',
	              'type'=> 'date',
	              'maxlength'=> '',
	              'size'=> '',
	              'style'=> '',
				  'required'=> 'required',
				  'min'=>'0'
	    );
	}

	$data = array();
	$data[''] = 'Please Select';
	$this->load->model('pos_model');
	$supplier = $this->pos_model->getAll_supplier();
	if(isset($supplier)){
		foreach($supplier as $row){
			$data[$row->supplier_name] = $row->supplier_name;
		}
	}
	$data['add'] = 'Add supplier';
?>	
	<table  cellpadding="10px">
		<tr>
		<th>
			Incoming from <br>
			(Supplier) <br>
			<?php echo form_dropdown('outgoing', $data,'','id="outgoing" autocomplete="off" required'); ?>
		</th>
		<th>
			Incoming Description <br>
			<?php echo form_textarea(array('rows' => '3', 'cols'=>'20', 'name' => 'in_desc', 'autocomplete' => 'off')); ?>
		</th>
		<th><label for="invoiceDate">Delivery date </label><br>	
			<?php echo form_input($data1); ?>
		</th>
		</tr>
	</table>		

	<table id="deliveryTable">
		<tr>
			<th>Item</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Amount</th>
			<th>Action</th>
		</tr>
		<tr>
			<td>											
				<?php											//item
					$options = array('' => 'Select one');		
					// ITEMS
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
						  'min'			=> 0,
						  'required'	=> 'required',
						  'autocomplete' => 'off'
					);
					// QUANTITY
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
					//PRICE
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
					// AMOUNT
					echo form_input($data);
				?>
			</td>
			<td>
				<input type="button" class='button' value="Delete Row" onclick="DeleteRowFunction(this)" />
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
	<label for="totalPrice">Total: </label>
	<input type="input" name="totalPrice" id='totalPrice' autocomplete="off" readonly/>
	<input class="button" type="submit" name="submit" value="Submit" />
</form>

<?php echo anchor($user, 'Cancel Delivery', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>