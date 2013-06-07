
<?php

if(){
echo '<div id="left_con" class="navbox">
	<ul id="nav">';
	
		echo '<li>'.anchor('cashier/purchase', ' Purchase ').'</li>';
		echo '<li>'.anchor('cashier/credit', ' Credit ').'</li>';
		echo '<li>'.anchor('cashier/outgoing', ' Outgoing ').'</li>';
		echo '<li>'.anchor('cashier/incoming', ' Incoming ').'</li>';
		echo '<li>'.anchor('cashier/expenses', ' Expenses ').'</li>';
		echo '<li>'.anchor('cashier/search', ' Search ').'</li>';
		echo '<li>'.anchor('cashier/inventory', ' Inventory ').'</li>';
		echo '<li>'.anchor('', 'Reports').'</li>';
		echo '<li>'.anchor('cashier/close', ' Close Store ').'</li>';
		echo '<li>'.anchor('cashier/logout', ' Log out ').'</li>';
	
	echo'</ul>
</div>';
}

if(){
echo'<div id="left_con" class="navbox">
	<ul id="nav">';
	
		echo '<li>'.anchor('admin/password', ' Password ').'</li>';
		echo '<li>'.anchor('admin/goto_items', 'Items ').'</li>';
		echo '<li>'.anchor('admin/reports', ' Reports ').'</li>';
		echo '<li>'.anchor('admin/inventory', ' Inventory ').'</li>';
		echo '<li>'.anchor('admin/customers', ' Customers ').'</li>';
		echo '<li>'.anchor('admin/delivery', ' Delivery ').'</li>';
		echo '<li>'.anchor('admin/logout', ' Log out ').'</li>';
	
	echo'</ul>
</div>';} ?>