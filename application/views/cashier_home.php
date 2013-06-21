<!--
<?php //echo '<ul id="otherlinks"><li>'.anchor('cashier/logout', ' Log out ').'</li></ul>'; ?>

	<ul class="listview">
    <div class="left_list">
       <li>
   <div class="data">
    <h4><?php echo anchor('cashier', 'Home'); ?></h4>
    <p>Home page of Cashier</p>
   </div>
  </li>
		<li>
   <div class="data">
    <h4><?php echo anchor('sales', 'Sales'); ?></h4>
    <p>Record items as sales</p>
   </div>
  </li>
		<li>
   <div class="data">
    <h4><?php echo anchor('credits/index', 'Credits'); ?></h4>
    <p>Record items as credit</p>
   </div>
  </li>
  <li>
   <div class="data">
    <h4><?php echo anchor('expenses/goto_expensesForm', 'Expenses'); ?></h4>
    <p>Record expenses</p>
   </div>
  </li>
</div>
		<div class="right_list">	
		 <li>
   <div class="data">
    <h4><?php echo anchor('cashier/reports', 'Reports'); ?></h4>
    <p>View daily reports</p>
   </div>
  </li>			
		<li>
   <div class="data">
    <h4><?php echo anchor('cashier/inventory', 'Inventory'); ?></h4>
    <p>View inventory of the stocks</p>
   </div>
  </li>
			<li>
   <div class="data">
    <h4><?php echo anchor('cashier/load', 'Load'); ?></h4>
    <p><span>Record of e-load transactions</span></p>
   </div>
  </li>
  <li>
   <div class="data">
    <h4><?php
      if($this->session->userdata('open')) 
        echo anchor('cashier/close_amount', 'Record Closing Amount'); 
      else
        echo anchor('cashier/open_amount', 'Record Opening Amount'); 
      ?></h4>
    <p>Register opening and closing amount</p>
   </div>
  </li>
		
  </div>

</ul>
-->

<?php
/* if($this->session->userdata('open')) 
    echo '<h2>Cashier is open!</h2>'; 
  else {
    echo '<h2>Cashier is still close! </h2>';
    
  }
*/
?>

 
	


