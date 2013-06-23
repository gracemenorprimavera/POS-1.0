<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>

<?php if(isset($message)) echo $message; ?>
<?php echo form_open_multipart('items/import_excel') ?>
<p><span>Instruction for Import Excel: (Excel should be in the ff format:)</span></p>
<table border = 1 cellpadding =5>
<tr><th>Attribute</th><th>Barcode</th><th>Itemcode</th><th>Desc1</th><th>Desc2</th><th>Desc3</th><th>Units</th><th>Division</th><th>Group</th><th>Class1</th><th>Class2</th><th>Cost</th><th>Selling Price</th><th>Model Qty</th><th>Supplier code</th><th>Manufacturer</th><th>Qty</th><th>Reorder Pt</th></tr>
<tr><td>Can be Empty?</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>No</td><td>No</td><td></td><td></td><td></td><td>No</td><td></td></tr>
<tr><td>Type?</td><td>any</td><td>any</td><td>any</td><td>any</td><td>any</td><td>any</td><td>any</td><td>any</td><td>any</td><td>any</td><td>number</td><td>number</td><td>any</td><td>any</td><td>any</td><td>number</td><td>whole number</td></tr>
</table>
<p><span>*Barcode (Column A) should be formatted in excel (Format Cell)to number with no decimal places</span></p>
<p><span>*number ( eg. 1,500 , 1.55 , 24 )</span></p>
<p><span>*whole number ( eg. 1 , 125 , 32 )</span></p>
<br>
	<table border="1" width="40%" align="center">
		<tr>
			<td colspan="2" align="center"><strong>Import CSV/Excel file</strong></td>
		</tr>

		<tr>
			<td align="center">CSV/Excel File:</td>
			<td><input type="file" name="file" id="file"></td>
		</tr>
		<tr >
			<td colspan="2" align="center">
				<input class="button" type="submit" name="Import" value="Import"></td>
		</tr>
	</table>
<?php echo form_close(); ?>
<?php $user = $this->session->userdata('role');
//echo anchor($user, 'Home', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>
