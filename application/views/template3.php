<!DOCTYPE html>
<html>
<head>
	<title> POS </title>
	<?php $this->load->view('includes/resources'); ?>

</head>	

<body>

<div id="dialog-form" title="Search">
<form>
<fieldset>
<label for="name" id="searchLabel">Search</label>
<input type="hidden" id="hsearchDialog"/>
<input type="search" name="searchDialog" id="searchDialog" class="text ui-widget-content ui-corner-all" />
</fieldset>
<table border = solid 1px black>
</table>
</form>
</div>

<div id="dialog-form2" title="New Form">
<!--<input type="hidden" id="hsearchDialog2"/>-->
</div>


<div id="main">
<div id="navmenu">
<?php
$user = $this->session->userdata('role');
if($flag==1){
echo '<div class="navbox">
	<ul id="nav">';
		echo '<li>'.anchor('admin', 'Home ').'</li>';
		echo '<li>'.anchor('admin/password', ' Password ').'</li>';
		//echo '<li>'.anchor('items/goto_itemPage', 'Items ').'</li>';
		//echo '<li>'.anchor('credits/goto_customerPage', 'Credits').'</li>';
		//echo '<li>'.anchor('expenses/goto_expensesPage', 'Expenses ').'</li>';
		//echo '<li>'.anchor('incoming/goto_incomingPage', 'Deliveries').'</li>';
		//echo '<li>'.anchor('outgoing/goto_outgoingPage', 'Pull-outs').'</li>';
		//echo '<li>'.anchor('admin/sales', 'Transactions').'</li>';
		//echo '<li>'.anchor('admin/load', 'E-Load').'</li>';
		//echo '<li>'.anchor('admin/goto_amountPage', 'Opening & Closing Amounts').'</li>';
		echo '<li>'.anchor('admin/goto_formsPage', 'Forms');
		echo '<li>'.anchor('admin/goto_recordsPage', 'Records');
		
		echo '<li>'.anchor('admin/reports', ' Reports ').'</li>';
		echo '<li>'.anchor('admin/inventory', ' Inventory ').'</li>';
		echo '<li>'.anchor('items/view_exportPage', 'Export Database').'<li>';
		echo '<li>'.anchor('pos/do_logout', ' Logout').'</li>';
	echo'</ul>
</div>';
}
else if($flag==0 || $flag==0){
?>	
	
<?php
echo'<div class="navbox">
	<ul id="nav">';
		echo '<li>'.anchor('cashier', 'Home').'</li>';
		echo '<li>'.anchor('sales', 'Sales','target="a_blank"').'</li>';
		echo '<li>'.anchor('credits/index', ' Credits ').'</li>';
		echo '<li>'.anchor('expenses/goto_expensesForm', ' Expenses ').'</li>';
		echo '<li>'.anchor('cashier/reports', 'Reports').'</li>';
		echo '<li>'.anchor('cashier/inventory', 'Inventory').'</li>';
		echo '<li>'.anchor('cashier/load', 'Load').'</li>';
		echo '<li>'.anchor('cashier/open_amount', 'Opening Amount').'</li>';
		echo '<li>'.anchor('cashier/close_amount', 'Closing Amount').'</li>';
		//echo '<li>'.anchor('cashier/close_amount', 'Close Store').'</li>';
		echo '<li>'.anchor('pos/do_logout', ' Logout').'</li>';
		
	
	echo'</ul>
</div>';
}else if($flag==3){
echo'<div class="navbox">
	<ul id="nav">';
		echo '<li>'.anchor('manager', ' Home').'</li>';
		echo '<li>'.anchor('incoming/goto_incomingForm', 'Incoming').'</li>';
		echo '<li>'.anchor('outgoing/goto_outgoingForm', 'Outgoing').'</li>';
		echo '<li>'.anchor('manager/inventory', 'Inventory').'</li>';
		echo '<li>'.anchor('pos/do_logout', ' Logout').'</li>';
	
	echo'</ul>
</div>';
}
else if($flag==2 || $flag==4){
	echo'<div class="cashbox">
		<ul id="nav">';
		echo '<li>'.anchor('#', 'Item Search','class="dialogThis" id="itemDSearch"').'</li>';
		echo '<li>'.anchor('#', 'Price Search','class="dialogThis" id="priceDSearch"').'</li>';
		echo '<li>'.anchor('#', 'Customer Payment Search','class="dialogThis" id="custDSearch"').'</li>';
		echo '<li>'.anchor('sales/cancel_trans', 'New Transaction', array('onclick' => "return confirm ('Current transaction will be cancelled. Continue?')")).'</li>';
		echo '<li>'.anchor('sales/cancel_trans', 'Cancel Transaction', array('onclick' => "return confirm ('Are you sure want to cancel this transaction?')")).'</li>';
		echo '<li>'.anchor('#', 'E-Load','class="dialogThis2" id="loadDialog"');
		echo '<li>'.anchor('#', 'Incoming Load','class="dialogThis2" id="incomingloadDialog"');
		echo '<li>'.anchor('#', 'Start Day','class="dialogThis2" id="startDialog"').'</li>';
		echo '<li>'.anchor('#', 'End Day','class="dialogThis2" id="endDialog"').'</li>';
		echo '<li>'.anchor('#', 'Employee Time-in/out','class="dialogThis2" id="dtrDialog"').'</li>';
		echo '<li>'.anchor('#', 'Cash Out', 'class="dialogThis2" id="expenseDialog"').'</li>';
		echo '<li>'.anchor('#', 'Returns', 'class="dialogThis2" id="returnDialog"').'</li>';
		echo '<li>'.anchor('cashier/reports', 'Generate Daily Report').'</li>';
		echo '<li>'.anchor('pos/do_logout', 'Log out').'</li>';
	
	echo'</ul>
	</div>';	
} 

?>

</div>

	<div id="mainpage">

	<?php //$this->load->view('includes/header'); ?>
	
	<div id="main_con">
		<?php /*$class = $this->uri->segment(1); 
		 $fxn = $this->uri->segment(2); 
		 $page1 = ($this->uri->segment(3))? $this->uri->segment(3): 0; 
		 if($page1==0)
		 	//echo '<ul id="otherlinks"><li>'.anchor($user.'/'.$fxn, 'Back').'</li></ul>';
		 	echo $class.$fxn.$page1; 
		 else 
		 	echo $class.$fxn.$page1; */
		 ?>

		<?php $this->load->view($page); ?>

	<div class="overlay-container" style="overflow:scroll;">
		<div class="window-container zoomin">
			<?php

		if($results==false){

					echo '<br /><br /><hr /><center>No items Found <br/> Kindly re-check the Columns you selected</center>';
				//echo $results;
		}
		else {
		echo '<h3> VIEW ITEMS </h3>';
		
			echo '<div id="view_item" class="view">';

				echo '<table border="1px solid brown">
				<tr>
					<th> brand name</th>
					<th> product name </th>
					<th> variant/flavor </th>
					<th> size/packaging </th>
					<th> Cost </th>
					<th> Retail Price </th>
					<th> Manufacturer </th>
					<th> Quantity </th>
				</tr>';
			
			
			foreach ($results as $r) {
				echo '<tr>';
				echo '<td>'.$r->desc1.'</td>';
				echo '<td>'.$r->desc2.'</td>';
				echo '<td>'.$r->desc3.'</td>';
				echo '<td>'.$r->desc4.'</td>';
				echo '<td>'.$r->cost.'</td>';
				echo '<td><b>'.$r->retail_price.'</b></td>';
				echo '<td>'.$r->manufacturer.'</td>';
				echo '<td>'.$r->quantity.'</td>';
				echo '</tr>';
			}
			echo '</table></div>';
		}
	//} 
?>
<br/>
			<span class="close">Close Me</span>
		</div>
	</div>

<script>!window.jQuery && document.write(unescape('%3Cscript src="jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
	<script type="text/javascript" src="<?php echo base_url();?>js/demo.js"></script>
	
	
	</div> 

	<?php //$this->load->view('includes/footer'); ?>

	<?php //$this->load->view('includes/about'); ?> 
	</div>
</div>
</body>
</html>