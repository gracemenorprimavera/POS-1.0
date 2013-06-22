<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>

<?php echo form_open('admin/add_employee', array('onsubmit'=>"return confirm('Finalize add employee?') ")); ?>
<table>
	
	<tr>
		<th>Name: </th>
		<td><input type="text" name="name" required></td>
	</tr>
	<tr>
		<th>Address: </th>
		<td><textarea name="address" ></textarea></td>
	</tr>
	<tr>
		<th>Contact #: <br> (09*********)
		</th>
		<td><input type="text" name="num" pattern="[0-9]{11}" required></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:right">
			<?php echo form_submit(array('name'=>'addEmp_submit', 'class'=>'button'), 'Add Employee'); ?>
		</td>
	</tr>
</table>
<?php echo form_close(); ?>
