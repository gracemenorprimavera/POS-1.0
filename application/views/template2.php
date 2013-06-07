<!DOCTYPE html>
<html>

<head>

	<title> POS </title>
	<?php $this->load->view('includes/resources'); ?>

</head>	

<body>
<div id="main">
<div id="navmenu"><?php

if($flag==1){
echo '<div class="navbox">
	<ul id="nav">';

		echo '<li>'.anchor('admin/password', ' Password ').'</li>';
		echo '<li>'.anchor('admin/goto_items', 'Items ').'</li>';
		echo '<li>'.anchor('admin/reports', ' Reports ').'</li>';
		echo '<li>'.anchor('admin/inventory', ' Inventory ').'</li>';
		echo '<li>'.anchor('admin/customers', ' Customers ').'</li>';
		echo '<li>'.anchor('admin/delivery', ' Delivery ').'</li>';
	
	echo'</ul>
</div>';
}
else if($flag==2){
echo'<div class="navbox">
	<ul id="nav">';
	
		echo '<li>'.anchor('cashier/purchase', ' Purchase ').'</li>';
		echo '<li>'.anchor('cashier/credit', ' Credit ').'</li>';
		echo '<li>'.anchor('cashier/expenses', ' Expenses ').'</li>';
		echo '<li>'.anchor('cashier/search', ' Search ').'</li>';
		echo '<li>'.anchor('cashier/inventory', ' Inventory ').'</li>';
		echo '<li>'.anchor('', 'Reports').'</li>';
		echo '<li>'.anchor('cashier/close', ' Close Store ').'</li>';
	
	echo'</ul>
</div>';
}else{
echo'<div class="navbox">
	<ul id="nav">';
	
		echo '<li>'.anchor('cashier/outgoing', ' Outgoing ').'</li>';
		echo '<li>'.anchor('cashier/incoming', ' Incoming ').'</li>';
	
	echo'</ul>
</div>';
} ?></div>

	<div id="mainpage">

	<?php $this->load->view('includes/header'); ?>
	
	<div id="main_con">	
		<?php if($flag==1)echo anchor('admin/logout', ' Log out ');
				else if($flag==2) echo anchor('cashier/logout', ' Log out ');
				else echo anchor('manager/logout', ' Log out ');?> 
		<?php $this->load->view($page); ?>
	</div> 

	<?php $this->load->view('includes/footer'); ?>

	<?php //$this->load->view('includes/about'); ?> 
	</div>
</div>
</body>
</html>