
	<?php //echo '<ul id="otherlinks"><li>'.anchor('#', ' Log out ').'</li></ul>'; ?>
	<ul class="listview">
    <li>
   <div class="data"><h4>
    <?php echo anchor('manager', 'Home'); ?></h4>
    <p>Return to Manager Home Page</p>
   </div>
  </li>
	<li>
   <div class="data"><h4>
   	<?php echo anchor('incoming/goto_incomingForm', 'Incoming '); ?></h4>
    <p>Record delivery slip</p>
   </div>
  </li>
	<li>
   <div class="data">
    <h4><?php echo anchor('outgoing/goto_outgoingForm', ' Outgoing '); ?></h4>
    <p>Record pull-out products</p>
   </div>
  </li>
</ul>