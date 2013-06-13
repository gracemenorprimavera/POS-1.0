<?php if(isset($message)) echo $message; ?>
<?php echo form_open_multipart('item/import_excel') ?>
	<table border="1" width="40%" align="center">
		<tr>
			<td colspan="2" align="center"><strong>Import CSV/Excel file</strong></td>
		</tr>

		<tr>
			<td align="center">CSV/Excel File:</td><td><input type="file" name="file" id="file"></td>
		</tr>
		<tr >
			<td colspan="2" align="center"><input type="submit" name="Import" value="Import"></td>
		</tr>
	</table>
<?php echo form_close(); ?>
