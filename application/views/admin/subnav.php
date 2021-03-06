<?php $user = $this->session->userdata('role'); 
  //echo $user;
?>
<?php echo '<ul id="otherlinks"><li>'.anchor('admin', 'Back').'</li></ul>'; ?>

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

<?php if($subnav==8) { ?>
  <ul class="listview">
    <div class="left_list">

 <li><div class="data">
      <h4><?php echo anchor('expenses/view_cashout', 'Cash Out'); ?></h4>
      <p>View record of all Cash Out</p>
    </div></li>  

 <li><div class="data">
      <h4><?php echo anchor('admin/view_credits', 'Credits'); ?></h4>
      <p>View credits recorded</p>
    </div></li>

    <li><div class="data">
      <h4><?php echo anchor('admin/view_customers', 'Customers'); ?></h4>
      <p>View record of customers with credits</p>
    </div></li>

     <li><div class="data">
      <h4><?php echo anchor('incoming/view_incoming', 'Deliveries'); ?></h4>
      <p>View record of deliveries </p>
    </div></li>
     
<li><div class="data">
      <h4><?php echo anchor('admin/view_eload', 'E-Load Transactions'); ?></h4>
      <p>View record of e-load transactions</p>
    </div></li>

     <li><div class="data">
      <h4><?php echo anchor('admin/view_emp', 'Employee'); ?></h4>
      <p>View record of all employees</p>
    </div></li> 

   
  </div>
  <div class="right_list">
     <li><div class="data">
      <h4><?php echo anchor('expenses/view_expenses', 'Expenses'); ?></h4>
      <p>View record of all expenses</p>
    </div></li>

       <li><div class="data">
      <h4><?php echo anchor('items/view_items', 'Items'); ?></h4>
      <p>
        View record of items in the stock <br>
      </p>
    </div></li>
    

    <li><div class="data">
      <h4><?php echo anchor('outgoing/view_outgoing', 'Outgoing'); ?></h4>
      <p>View record of incoming products</p>
    </div></li>
    <li><div class="data">
      <h4><?php echo anchor('admin/view_amounts', 'Registered Amounts'); ?></h4>
      <p>View record of opening and closing amounts</p>
    </div></li>
     <li><div class="data">
      <h4><?php echo anchor('admin/view_sales', 'Sales'); ?></h4>
      <p>View record of transactions</p>
    </div></li>
   
     
    
    </div>
  </ul>
<?php } ?>

<?php if($subnav==9) { ?>
  <ul class="listview">
    <div class="left_list">

    <li><div class="data">
      <h4><?php echo anchor('credits/goto_customerForm', 'Add New Customer'); ?></h4>
      <p>Form to add new customer</p>
     </div></li>

    <li><div class="data">
      <h4><?php echo anchor('admin/goto_employeeForm', 'Add New Employee'); ?></h4>
      <p>Form to add new employee</p>
     </div></li>

     <li><div class="data">
      <h4><?php echo anchor('items/goto_itemForm', 'Add New Item'); ?></h4>
      <p>Form to add new item in the stock</p>
     </div></li>

    <li><div class="data">
      <h4><?php echo anchor('incoming/goto_supplierForm', 'Add New Supplier'); ?></h4>
      <p>Form to add new supplier</p>
     </div></li>


    <li><div class="data"><h4><?php echo anchor('admin/goto_amountForm', 'Amounts'); ?></h4>
      <p>Form to record opening and closing amount</p>
     </div>
   </li>
  <!-- <li><div class="data"><h4><?php //echo anchor('admin/sales', 'Credit Form'); ?></h4>
      <p><span>Add Sales not recorded in the cashier</span></p>
    </div>
  </li> -->

    <li><div class="data">
      <h4><?php echo anchor('expenses/goto_cashoutForm', 'Cash Out'); ?></h4>
      <p>Form to record cash out</p>
     </div></li>


   </div><div class="right_list">

     <li><div class="data">
      <h4><?php echo anchor('incoming/goto_incomingForm', 'Delivery'); ?></h4>
      <p>Form to record incoming products</p>
     </div></li>

     <li><div class="data">
      <h4><?php echo anchor('admin/goto_eloadForm', 'E-load'); ?></h4>
      <p>Form to add new employee</p>
     </div></li>

      <li><div class="data">
      <h4><?php echo anchor('expenses/goto_expensesForm', 'Expenses'); ?></h4>
      <p>Form to record expenses</p>
     </div></li>

     <li><div class="data">
      <h4><?php echo anchor('items/importExcel', 'Import Excel'); ?></h4>
      <p>Import excel file to add item in the stock</p>
     </div></li>
    
<li><div class="data">
      <h4><?php echo anchor('outgoing/goto_outGoingForm', 'Outgoing'); ?></h4>
      <p>Form to record pull-out products</p>
     </div></li>
     <!--
      <li><div class="data">
      <h4><?php //echo anchor('admin/sales', 'Sales Form'); ?></h4>
      <p><span>Add Sales not recorded in the cashier.</span></p>
    </div></li>-->

     
     
     
    </div>
  </ul>
<?php } ?>


