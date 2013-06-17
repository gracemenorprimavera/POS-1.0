<?php $user = $this->session->userdata('role'); 
  //echo $user;
?>
<?php if($subnav==1) { ?>
  <ul class="listview">
    <li><div class="data">
      <h4><?php echo anchor('items/view_items', 'View Items'); ?></h4>
      <p>
        Record of items in the stock <br>
      </p>
    </div></li>
    <li><div class="data">
      <h4><?php echo anchor('items/goto_itemForm', 'Item Form'); ?></h4>
      <p>Form to add new item in the stock</p>
     </div></li>
    <li><div class="data">
      <h4><?php echo anchor('items/view_items', 'Edit Item'); ?></h4>
      <p>Edit an Item</p>
     </div></li>
     <li><div class="data">
      <h4><?php echo anchor('items/importExcel', 'Import Excel'); ?></h4>
      <p><span>Import excel file to add item in the stock</span></p>
     </div></li>
  </ul>
<?php } ?>

<?php if($subnav==2) { ?>
  <ul class="listview">
    <li><div class="data">
      <h4><?php echo anchor('credits/index', 'View Customers'); ?></h4>
      <p>Record of customers with credits</p>
    </div></li>
    <li><div class="data">
      <h4><?php echo anchor('credits/goto_customerForm', 'New Customer Form'); ?></h4>
      <p>Form to add customer</p>
     </div></li>
  </ul>
<?php } ?>

<?php if($subnav==3) { ?>
  <ul class="listview">
    <li><div class="data">
      <h4><?php echo anchor('expenses/view_expenses', 'View Expenses'); ?></h4>
      <p>Record of all expenses</p>
    </div></li>
    <li><div class="data">
      <h4><?php echo anchor('expenses/goto_expensesForm/1', 'Expenses Form'); ?></h4>
      <p>Form to record</p>
     </div></li>
  </ul>
<?php } ?>

<?php if($subnav==4) { ?>
  <ul class="listview">
    <li><div class="data">
      <h4><?php echo anchor('incoming/view_incoming', 'View Deliveries'); ?></h4>
      <p>Record of deliveries </p>
    </div></li>
    <li><div class="data">
      <h4><?php echo anchor('incoming/goto_incomingForm', 'Delivery Form'); ?></h4>
      <p>Form to record incoming products</p>
     </div></li>
     <li><div class="data">
      <h4><?php echo anchor('incoming/goto_supplierForm', 'Supplier Form'); ?></h4>
      <p>Form to add supplier</p>
     </div></li>
  </ul>
<?php } ?>

<?php if($subnav==5) { ?>
  <ul class="listview">
    <li><div class="data">
      <h4><?php echo anchor('outgoing/view_outgoing', 'View Pull-outs'); ?></h4>
      <p>Record of pull-out products</p>
    </div></li>
    <li><div class="data">
      <h4><?php echo anchor('outgoing/goto_outGoingForm', 'Outgoing Form'); ?></h4>
      <p>Form to record pull-out products</p>
     </div></li>
  </ul>
<?php } ?>

<?php if($subnav==6) { ?>
  <ul class="listview">
    <li><div class="data">
      <h4><?php echo anchor('admin/view_amounts', 'View Registered Amounts'); ?></h4>
      <p>Records of opening and closing amounts</p>
    </div></li>
    <li><div class="data">
      <h4><?php echo anchor('admin/goto_amountForm', 'Amounts Form'); ?></h4>
      <p><span>Form to record opening and closing amount</span></p>
     </div></li>
  </ul>
<?php } ?>

<?php if($subnav==7) { ?>
  <ul class="listview">
    <li><div class="data">
      <h4><?php echo anchor('admin/view_sales', 'View Sales'); ?></h4>
      <p>View all transactions recorded</p>
    </div></li>
     <li><div class="data">
      <h4><?php echo anchor('admin/sales', 'Sales Form'); ?></h4>
      <p><span>Add Sales not recorded in the cashier.</span></p>
    </div></li>
    <li><div class="data">
      <h4><?php echo anchor('admin/view_credits', 'View Credits'); ?></h4>
      <p>View credits recoreded</p>
    </div></li>
    <li><div class="data">
      <h4><?php echo anchor('admin/sales', 'Credit Form'); ?></h4>
      <p><span>Add Sales not recorded in the cashier</span></p>
    </div></li>
    
  </ul>
<?php } ?>


