
<div id="left_con">
	<ul>
	<?php
		echo '<li>'.anchor('manager/incoming', ' Incoming ').'</li>';
		echo '<li>'.anchor('manager/outgoing', ' Outgoing ').'</li>';
		echo '<li>'.anchor('#', ' Log out ').'</li>';
	?>
	</ul>
</div>

<div id="right_con">
	<?php $this->load->view($subpage); ?>
</div>