
<?php 	// inventory
	$user = $this->session->userdata('role');
		echo '<b>Overall Cost</b>';
		echo ': P '.$cost;
		echo '<br><b>Overall Price</b>';
		echo ': P '.$price;
?>
<br />
<?php 	// items list
		
		

		if($message) {
			echo $message;
		}
		else {
			
			echo '<div id="view_item" class="view">';

				echo '<table border="1px solid brown">
				<tr>
					<th> Description 1 </th>
					<th> Cost </th>
					<th> Retail Price </th>
					<th> Quantity </th>
				</tr>';
			
			
			foreach ($items as $r) {
				echo '<td>'.$r->desc1.'</td>';
				echo '<td>'.$r->cost.'</td>';
				echo '<td>'.$r->retail_price.'</td>';
				echo '<td>'.$r->quantity.'</td>';
				echo '</tr>';
			}
			echo '</table></div>';
		}
	
?>

