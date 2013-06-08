
<div id="left_con">
	<table cellpadding="30" text-align="center" border="1px solid black">
		<tr>
			<td> <?php echo anchor('admin/goto_add_item', ' Add Item '); ?> </td>
			<td> <?php echo anchor('admin/goto_view_items', ' View Items '); ?> </td>
			<td> <?php echo anchor('admin/reports', ' Reports '); ?> </td>
		</tr>
		<tr>
			<td> <?php echo anchor('admin/inventory', ' Inventory '); ?> </td>
			<td> <?php echo anchor('admin/customers', ' Customers '); ?> </td>
			<td> <?php echo anchor('pos/do_logout', ' Log out '); ?> </td>
		</tr>
		<tr>
			<td> <?php echo anchor('admin/goto_add_customers', ' Add Customers'); ?></td>
			<td> <?php echo anchor('admin/password', ' Password '); ?></td>
			<td> <?php echo anchor('admin/importExcel', ' Import Excel '); ?></td>
		</tr>	
		<tr>
			<td> <?php echo anchor('admin/view_incoming', 'Delivery Record'); ?> </td>
			<td> <?php echo anchor('admin/view_outgoing', 'Pull-outs Record'); ?> </td>
			<td> <?php echo anchor('admin/view_expenses', 'Expenses Record'); ?> </td>
		</tr>
	</table>
</div>
