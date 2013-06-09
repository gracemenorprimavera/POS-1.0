<?php 	// inventory
		$result=$this->pos_model->get_inventory();
		if($result==false) echo 'false';
		else echo $result;
?>oi