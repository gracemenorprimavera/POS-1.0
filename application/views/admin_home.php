
<?php //echo '<ul id="otherlinks"><li>'.anchor('pos/do_logout', ' Log out ','style="right: 170px;"').'</li></ul>'; ?>
  <ul class="listview" >
  <div class="left_list">
 <li>
   <div class="data"><h4>
    <?php echo anchor('admin/password', ' Password '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>

  <li>
   <div class="data"><h4>
    <?php echo anchor('items/goto_itemPage', 'Items '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>

  <li>
   <div class="data">
    <h4><?php echo anchor('credits/goto_customerPage', 'Credits '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
   <li>
   <div class="data">
    <h4><?php echo anchor('expenses/goto_expensesPage', 'Expenses '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
  <li>
   <div class="data">
    <h4><?php echo anchor('incoming/goto_incomingPage', 'Deliveries'); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>  
  <li>
   <div class="data">
    <h4><?php echo anchor('admin/load', 'E-load'); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>   
  
  </div>

  
  <div class="right_list">  
  
   <li>
   <div class="data">
    <h4><?php echo anchor('outgoing/goto_outgoingPage', 'Pull-outs'); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
  <li>
   <div class="data">
    <h4><?php echo anchor('admin/sales', 'Transactions'); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
  <li>
   <div class="data">
    <h4><?php echo anchor('admin/inventory', ' Inventory '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>     
  <li>
   <div class="data">
    <h4><?php echo anchor('admin/reports', ' Reports '); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>

  <li>
   <div class="data">
    <h4><?php echo anchor('admin/goto_amountPage', 'Opening & Closing Amounts'); ?></h4>
    <p>*edit desc*</p>
   </div>
  </li>
  <li>
   <div class="data">
    <h4><?php echo anchor('items/exportExcel', 'Export Excel'); ?></h4>
    <p>Export database to Excel CSV format</p>
   </div>
  </li>
</div>
  
</ul>
