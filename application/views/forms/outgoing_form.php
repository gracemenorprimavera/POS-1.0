<?php 
	if($this->session->userdata('role')=='admin') 
	echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; 
	$user = $this->session->userdata('role');
	echo validation_errors();
	
	echo '<span>'.$msg.'</span>';
	echo form_open('outgoing/add_outgoing', array('onsubmit'=>"return confirm('Finalize Record?') "));	//Controller -> Delivery, Action -> Create	

	if($user=='manager') {	//delivery date
		$data = array(
              'name'        => 'outgoingDate',
              'id'          => '',
              'value'       => date('y-m-d'),
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
              'maxlength'   => '',
              'size'        => '',
              'style'       => '',
			  'required'	=> 'required',
		);
	}
		
	$outgoing = $this->pos_model->getAll_outgoing_cat();
	$options = array();
	$options[''] = 'Select one';
		if(isset($outgoing)){
			foreach($outgoing as $row){
				$options[$row->outgoing] = $row->outgoing;
			}
		}
	$options['add'] = "Add outgoing...";
?>

	<table  cellpadding="10px">
		<tr>
			<th>Outgoing<br>
				<?php echo form_dropdown('outgoing', $options, '', 'id="outgoingDd" autocomplete="off" required'); ?>
			</th>
			<th>Description <br>
				<?php echo form_textarea(array('rows' => '3', 'cols'=>'20', 'name' => 'out_desc')); ?>
			</th>
			<th>
				<label for="outgoingDate">Date </label><br>
				<?php echo form_input($data); ?>
			<th/>
		</tr>
	</table>

<table id="outgoingTable">
	<tr>
		<th>Item</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Amount</th>
		<th>Action</th>
	</tr>
	<tr>
		<td>											
			<?php 
				// ITEM
				echo '<input type="hidden" name="houtgoingItem[]" class="houtgoingItem" />
				<input name="outgoingItem[]" id="outgoingItem" class="tags outgoingItem" autocomplete="off" required/>'; 
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
				// QUANTITY
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
				// PRICE
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
				// AMOUNT
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
	<label for="totalPrice">Total: </label>
	<input type="input" name="outTotalPrice" id='outTotalPrice' autocomplete="off" readonly/> 
	<input class="button" type="submit" name="submit" value="Submit" />	
</form>
<?php echo anchor($user, 'Cancel Outgoing', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>