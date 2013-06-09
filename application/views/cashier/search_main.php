

<?php echo anchor('pos/cashier_home', 'Home', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>

<?php 
		if($results==false){

					echo '<br /><br /><hr /><center>No items Found <br/> Kindly re-check the Columns you selected</center>';
				//echo $results;
		}
		else {
		echo '<h3> VIEW ITEMS </h3>';
		
			echo '<div id="view_item" class="view">';

				echo '<table border="1px solid brown">
				<tr>
					<th> brand name</th>
					<th> product name </th>
					<th> variant/flavor </th>
					<th> size/packaging </th>
					<th> Cost </th>
					<th> Retail Price </th>
					<th> Manufacturer </th>
					<th> Quantity </th>
				</tr>';
			
			
			foreach ($results as $r) {
				echo '<tr>';
				echo '<td>'.$r->desc1.'</td>';
				echo '<td>'.$r->desc2.'</td>';
				echo '<td>'.$r->desc3.'</td>';
				echo '<td>'.$r->desc4.'</td>';
				echo '<td>'.$r->cost.'</td>';
				echo '<td><b>'.$r->retail_price.'</b></td>';
				echo '<td>'.$r->manufacturer.'</td>';
				echo '<td>'.$r->quantity.'</td>';
				echo '</tr>';
			}
			echo '</table></div>';
		}
	//}
?>

