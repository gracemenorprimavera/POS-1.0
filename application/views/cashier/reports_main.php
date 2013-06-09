<div id="reports_form">
	<table border="0px solid black" >
	<tr> <th colspan="2"> Daily Sales Summary </th></tr>

	<tr><td>Starting Bills and Coins: <input type="text"></td>
	<td>Ending Bills and Coints: <input type="text"></td></tr>
	<tr><td>Cash Box Sales: <input type="text"></td>
	<td>POS Sales: <input type="text"></td></tr>
	<tr><td>Discrepancy: <input type="text"></td>
	<td>Expenses: <input type="text"></td></tr>
	<tr><td>Incoming Stocks Amount:<input type="text"></td>
	<td>Outgoing Stocks Amount: <input type="text"></td></tr>
	<tr><td>Sales on Credit: <input type="text"></td></tr>
	<tr><td>Load Balance: <input type="text"></td>
	<td>Load Incoming Stocks:<input type="text"></td></tr>

	<tr><th colspan="2">Sales by Division</th></tr>
	<tr><td>Grocery:<input type="text"></td>
	<td>Poultry Supply:<input type="text"></td></tr>
	<tr><td>Pet Supply:<input type="text"></td>
	<td>Load:<input type="text"></td></tr>

	</table>
</div>
<?php echo anchor('pos/cashier_home', 'Home', array('onclick'=>"return confirm('Are you sure you want to cancel?') ")); ?>