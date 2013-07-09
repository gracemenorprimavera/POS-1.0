
<?php
	$user = $this->session->userdata('role');
?>

<p style="text-align:left"><span>Record returned sold item or returned bottle. Indicate in the ITEM the name of the item or the bottle.</span></p>

<?php
		echo validation_errors();
		echo form_open('cashier/add_return', array('onsubmit'=>"return confirm('Finalize Record?') "));	//Controller -> Delivery, Action -> Create	

	
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
			
		echo '<table  cellpadding="0px">';
		echo '<tr><th style="text-align:right"><label for="outgoingDate">Date </label></th>';
		echo '<td>'.form_input($data).'<td/></tr>';
		echo '<tr><th><label for="out_desc">Description</label></th>';
		echo '<td>'.form_textarea(array('rows' => '3', 'cols'=>'20', 'name' => 'out_desc', 'style'=>"text-align:right")).'</td></tr>';
		
		echo '</tr></table>';
?>
<table id="outgoingTable" border="0px solid black">
	<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Amount</th><th>Action</th></tr>
	<tr>
		<td>											
	<?php
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
				  'required'	=> 'required'
				 // 'readonly'	=> 'readonly'
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

	<table>
		<tr>
		<td colspan="2" style="text-align:left"> 
		<?php
			$data = array(
			'name' => 'addOutgoingRow',
			'id' => 'addOutgoingRow',
			'value' => '',
			'type' => 'button',
			'class' => 'button',
			'content' => 'Add Row'
		);

			echo form_button($data);
	
		?>
		</td></tr>
		<tr >
		<td style="text-align:right;"> 
			<br><label for="totalPrice">Total: </label><input type="input" name="outTotalPrice" id='outTotalPrice' autocomplete="off" readonly/> 
		</td>
		<td><input class="button" type="submit" name="submit" value="Submit" />	</td>
		</tr>
	</table>	
	
</form>
