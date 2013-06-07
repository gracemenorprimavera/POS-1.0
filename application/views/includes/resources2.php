

<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css"/>
<script src="<?php echo base_url();?>js/jquery-1.10.0.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>

<script language="javascript" type="text/javascript">

 $(document).ready(function() {
 
 /*
	Add new row to delivery table on button click
 */
   $("#addDeliveryRow").click(function () {
			var newRow = '<tr><td><select name="invoiceItem[]" class="invoiceItem" autocomplete="off" required><option value="" selected="selected">Select one</option></select></td><td><input type="number" name="invoiceQty[]" value="" id="" class="invoiceQty" maxlength="" size="" style="" autocomplete="off" required /></td><td><input type="text" name="invoicePrice[]" value="" id="" class="invoicePrice" maxlength="" size="" style="" autocomplete="off" required /></td><td><input type="text" name="invoiceAmt[]" value="" id="" class="invoiceAmt" maxlength="" size="" style="" autocomplete="off" readonly="readonly" required /></td><td><input type="button" value="Delete Row" onclick="DeleteRowFunction(this)" /></td></tr>';
			$('table#deliveryTable').append(newRow);
			$.ajax({
					url: '<?php echo base_url().'index.php/admin/goto_view_items_supplier';?>',
					data: {supplier_name: $('#outgoing').val()},
					type: "post",
					success: function(data){

					$('table#deliveryTable tr:last select.invoiceItem').html(data);
					},
					error: function (xhr, ajaxOptions, thrownError) {

					}
			});
   });
   
  /*
	Add new row to outgoing table on button click
 */
   $("#addOutgoingRow").click(function () {
			var newRow = '<tr><td><input name="outgoingItem[]" id="tags" class="tags outgoingItem" autocomplete="off" required/></td><td><input type="number" name="outgoingQty[]" value="" id="" class="outgoingQty" maxlength="" size="" style="" required="required" autocomplete="off"  /></td><td><input type="text" name="outgoingPrice[]" value="" id="" class="outgoingPrice" maxlength="" size="" style="" autocomplete="off" required="required" readonly="readonly"  />		</td><td><input type="text" name="outgoingAmt[]" value="" id="" class="outgoingAmt" maxlength="" size="" style="" autocomplete="off" required="required" readonly="readonly"  />		</td><td><input type="button" value="Delete Row" onclick="DeleteRowFunction2(this)" /></td></tr>';
			$('table#outgoingTable').append(newRow);
   });
   
 /*
	change dropdown of items when suppliers change
 */  
   $("#outgoing").change(function(){
    $.ajax({
        url: '<?php echo base_url().'index.php/admin/goto_view_items_supplier';?>',
        data: {supplier_name: $(this).val()},
        type: "post",
        success: function(data){
        	
			$('.invoiceItem').html(data);
			$('input.invoicePrice').val('');
			$('input.invoiceQty').val('');
			$('input.invoiceAmt').val('');
		},
		error: function (xhr, ajaxOptions, thrownError) {

      }
	});
  });

/*
	change price field when item value changes
*/
  $(document).on('change','.invoiceItem',function(){
		var row = $(this).parent().parent();
		$(this).parent().parent().find(":input[type='text'],:input[type='number']").val('');
		$.ajax({
        url: '<?php echo base_url().'index.php/admin/goto_view_items_byCode';?>',
        data: {item_code: $(this).val()},
        type: "post",
        success: function(data){
		var temp = JSON.parse(data);
		$("td:nth-child(3) input.invoicePrice", row).val(temp['cost']);
		},
		error: function (xhr, ajaxOptions, thrownError) {

      }
	});
  });
  
 
/*
	udpate amount value when quantity changes, also update the total
*/ 
   $(document).on('keyup mouseup','.invoiceQty',function(){
		var row = $(this).parent().parent();
		var price = $("td:nth-child(3) input.invoicePrice", row).val();
		var qty = $(this).val();
		var total = 0;
		if(!isNaN(price) && price!="" && !isNaN(qty) && qty!=""){
			$("td:nth-child(4) input.invoiceAmt", row).val(qty * price);
			$('table#deliveryTable tr').each(function(){
				var s = $(this).find('input.invoiceAmt').val();
				if(!isNaN(s) && s!="") total = total + parseFloat(s);
			});
		}
		else $("td:nth-child(4) input.invoiceAmt", row).val('');
		$('#totalPrice').val(total);
  });
  
/*
	udpate amount value and total when price changes
*/ 
   $(document).on('keyup mouseup','.invoicePrice',function(){
		var row = $(this).parent().parent();
		var qty = $("td:nth-child(2) input.invoiceQty", row).val();
		var price = $(this).val();
		var total = 0;
		if(!isNaN(qty) && qty!="" && !isNaN(price) && price!=""){
			$("td:nth-child(4) input.invoiceAmt", row).val(price * qty);
			$('table#deliveryTable tr').each(function(){
			var s = $(this).find('input.invoiceAmt').val();
			if(!isNaN(s) && s!="") total = total + parseFloat(s);
			});
		}
		else $("td:nth-child(4) input.invoiceAmt", row).val('');
		$('#totalPrice').val(total);
  });
 

/*
	update total amount when quantity changes
*/ 
  $(document).on('keyup mouseup','.outgoingQty',function(){
		var row = $(this).parent().parent();
		var price = $("td:nth-child(3) input.outgoingPrice", row).val();
		var total = 0;
		if(!isNaN(price) && price!=""){
			$("td:nth-child(4) input.outgoingAmt", row).val($(this).val() * price);
			$('table#outgoingTable tr').each(function(){
			var s = $(this).find('input.outgoingAmt').val();
			if(!isNaN(s) && s!="") total = total + parseFloat(s);
			});
		}
		else $("td:nth-child(4) input.outgoingAmt", row).val('');
		$('#outTotalPrice').val(total);
  });


/*
	add customer name field when credit button is clicked upon purchase
*/  
	/*$(document).on('click', '#cashButton', function(){
		var div = "<input type='button' id='purchase_button' name='Purchase'><div id='customerInfo'><input type='hidden' id='hCustomerName' />Customer Name: <input type='text' name='customerName' id='customerName' class='tags2' autocomplete='off' required/></div>";
		//$(this).after(div);
		$("#customerInfo").hide();
	});*/

	$(document).on('click', '#creditButton', function(){
		var div = "<div id='customerInfo'><input type='hidden' id='hCustomerName' />Customer Name: <input type='text' name='customerName' id='customerName' class='tags2' autocomplete='off' /></div>";
		$(this).after(div);
		$("button").hide();
	});

	


  //end of document ready
});  

	//automatic computation of opening and closing bills
	$('#openingBills input[type=number], #closingBills input[type=number]').keyup(function(){
	
	var total = 0;
	var val = '';
	var par = $(this).parent().attr('id');
			//loop through the form and add the sum
			$('#' + par + ' input[type=number]').each(function(){
				val = $(this).val();
				if(!isNaN(val) && val != '') total = total + (val*$(this).attr('name'));
			});
			
			$('#' + par + ' input.totalBills').val(total);
	});
	
  //end of document ready
});  


	function alertChange()
	{
	var cash = $('#customerCash').val();
	var purchase = $('#totalPurchase').html().substring(1);
	var change = cash - purchase;
	if(!isNaN(change) && change >= 0 ) alert("CHANGE:\n" + change + " php");
	else alert("Invalid change.");
	}

	//delete a table row
	function DeleteRowFunction(o) {
	
	var count = $('#deliveryTable tr').length;
		if(count>2){
			 var p=o.parentNode.parentNode;
			 p.parentNode.removeChild(p);
		}
	}
	
	function DeleteRowFunction2(o) {
	
	var count = $('#outgoingTable tr').length;
		if(count>2){
			 var p=o.parentNode.parentNode;
			 p.parentNode.removeChild(p);
		}
	}
//autocomplete for item code
	$(function() {
	
		var availableTags = [];	

		 $.ajax({
			url: '<?php echo base_url().'index.php/admin/get_all_items';?>',
			type: "post",
			async: false,
			success: function(data){
			var temp = JSON.parse(data);
				for (var i = 0; i < temp.length; i++)
				availableTags.push(temp[i]);
			},
			error: function (xhr, ajaxOptions, thrownError) {
			}
		});

		$(document).on('keyup','.tags',function(){
		var row = $(this).parent().parent();
			$(this).autocomplete({
				source: availableTags, 
				select: function(event, ui){
				row.id = ui.item.item_code;	
			
			$.ajax({
				url: '<?php echo base_url().'index.php/admin/goto_view_items_byCode';?>',
				data: {item_code: row.id},
				type: "post",
				success: function(data){
				var temp = JSON.parse(data);
				$("td:nth-child(3) input.outgoingPrice", row).val(temp['retail_price']);
				},
				error: function (xhr, ajaxOptions, thrownError) {

				}
			});
				},
				minLength:3
			});		
		});
	});
	
 //autocomplete for customer name
	$(function() {
		var availableTags2 = [];	

		 $.ajax({
			url: '<?php echo base_url().'index.php/admin/customers2';?>',
			type: "post",
			async: false,
			success: function(data){
			var temp = JSON.parse(data);
				for (var i = 0; i < temp.length; i++)
				availableTags2.push(temp[i]);
			},
			error: function (xhr, ajaxOptions, thrownError) {
			}
		});

		$(document).on('keyup','.tags2',function(){
			
		var row = $(this).parent().parent();
			$(this).autocomplete({
				source: availableTags2, 
				select: function(event, ui){
				$('#hCustomerName').val(ui.item.customer_id);			
				},
				minLength:1
			});		
		});
	});
	
	
	
//autocomplete for bar code
	$(function() {
	
	var availableTags3 = [];	

		 $.ajax({
			url: '<?php echo base_url().'index.php/admin/get_all_items2';?>',
			type: "post",
			async: false,
			success: function(data){
			var temp = JSON.parse(data);
				for (var i = 0; i < temp.length; i++)
				availableTags3.push(temp[i]);
			},
			error: function (xhr, ajaxOptions, thrownError) {
			}
		});
		
		$(document).on('keyup','#search_item',function(){
		var row = $(this).parent().parent();
			$(this).autocomplete({
				source: availableTags3, 
				minLength:3
			});
		});
	});	
</script>
	