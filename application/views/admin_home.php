
<?php echo '<ul id="otherlinks"><li>'.anchor('cashier/logout', ' Log out ').'</li></ul>'; ?>
	<ul class="listview">
	<div class="left_list">
	<li>
   <div class="data"><h4>
   	<?php echo anchor('admin/goto_add_item', ' Add Item '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
	<li>
   <div class="data">
    <h4><?php echo anchor('admin/goto_view_items', ' View Items '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
	 <li>
   <div class="data">
    <h4><?php echo anchor('admin/reports', ' Reports '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
  </div>
  <div class="right_list">	
   <li>
   <div class="data">
    <h4><?php echo anchor('admin/inventory', ' Inventory '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>			
	<li>
   <div class="data">
    <h4><?php echo anchor('admin/customers', ' Customers '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
	<li>
   <div class="data">
    <h4><?php echo anchor('admin/password', ' Password '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
</div>
	
</ul>
