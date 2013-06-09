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

 echo form_open('cashier/search'); 
	echo '<input type="search" id="search" name="search" placeholder="Search item">';

	$options = array(
				'ps' => 'Please Select',
				'item_code' => "Item code",
				'bar_code' => "Bar code",
				'desc1' => "brandm, sub-brand",
				'desc2' => "Product name",
				'desc3' => "variant, flavor",
				'desc4' => "size, packaging",
				'group' => "Group",
				'group' => "Division",
				'class1' => "Classification 1",
				'class2' => "Classification 2",
				'cost' => "Cost",
				'retail_price' => "Retail Price",
				'model_quantity' => "Model Quantity",
				'supplier_code' => "Supplier Code",
				'manufacturer' => "Manufacturer",
				'quantity' => "Quantity",
				'reorder_point' => "Reorder Point"
			);
	echo '<br />';
	echo form_dropdown('search_dropdown', $options,'','id="searching" autocomplete="on" style="width:auto;" ');
	$product_id = $this->uri->segment(3, 0);
	form_input('url', $product_id );
	
	echo form_submit(array('class'=>'button','id'=>'button','style'=>'width:25px;','name'=>'view_submit'),' ');
 echo form_close(); 
?>	
	<input type="button" value="Zoom In Modal Window" class="button" data-type="zoomin" />

	
<?php
echo'<div class="navbox">
	<ul id="nav">';
	
		echo '<li>'.anchor('cashier/purchase', ' Purchase ').'</li>';
		echo '<li>'.anchor('cashier/credit', ' Credit ').'</li>';
		echo '<li>'.anchor('cashier/expenses', ' Expenses ').'</li>';
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
		<?php if($flag==1)echo '<ul id="otherlinks"><li>'.anchor('admin/logout', ' Log out ').'</li></ul>';

				else if($flag==2) echo '<ul id="otherlinks"><li>'.anchor('cashier/logout', ' Log out ').'</li></ul>';
				else echo anchor('manager/logout', ' Log out ');?> 
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

	<?php $this->load->view('includes/footer'); ?>

	<?php //$this->load->view('includes/about'); ?> 
	</div>
</div>
</body>
</html>