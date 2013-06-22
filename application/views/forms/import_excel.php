<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>

<?php if(isset($message)) echo $message; ?>
<?php echo form_open_multipart('items/import_excel') ?>
<p><span>Include instructions for importing excel here! </span></p>
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
