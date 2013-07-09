
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

				echo '<table border="1px solid brown" style="text-align:left">
				<tr style="text-align:center">
					<th> Item Code</th>
					<th> Bar Code </th>
					<th> Description 1 </th>
					<th> Cost </th>
					<th> Retail Price </th>
					<th> Quantity </th>
				</tr>';
			
			
			foreach ($items as $r) {
				if($r->item_code == null)
					echo '<td>N/A</td>';
				else
					echo '<td>'.$r->item_code.'</td>';
				if($r->bar_code == null)
					echo '<td>N/A</td>';
				else
					echo '<td>'.$r->bar_code.'</td>';
				echo "<td>$r->desc1 $r->desc2 $r->desc3 $r->desc4</td>";
				echo '<td>'.$r->cost.'</td>';
				echo '<td>'.$r->retail_price.'</td>';
				echo '<td>'.$r->quantity.'</td>';
				echo '</tr>';
			}
			echo '</table></div>';
		}
	
?>

