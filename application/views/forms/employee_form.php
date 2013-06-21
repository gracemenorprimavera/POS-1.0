<?php 
if($this->session->userdata('role')=='admin') 
echo '<ul id="otherlinks"><li>'.anchor('admin/goto_formsPAge', 'Back').'</li></ul>'; ?>
<?php echo form_open('admin/add_employee', array('onsubmit'=>"return confirm('Finalize add employee?') ")); ?>
Name: <input type="text" name="name" required><br>

<?php
	echo form_submit(array('name'=>'addEmp_submit', 'class'=>'button'), 'Add Employee');
	echo form_close();
?>
