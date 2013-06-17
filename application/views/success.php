<h4> Cashier is now close !</h4>
<?php 
	$user = $this->session->userdata('role');
	echo anchor('cashier/reports', 'View Report');
?>