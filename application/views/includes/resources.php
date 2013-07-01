


<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css"/>
<script src="<?php echo base_url();?>js/jquery-1.10.0.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>

<!--for modal-->
<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui.css" />
<!--for modal-->

<script language="javascript" type="text/javascript">

 $(document).ready(function() {
  	
  	$("#search_item").keydown(function(e){
        if(e.which==17 || e.which==74){
            e.preventDefault();
        }else{
            console.log(e.which);
        }
    });

    $("#searchDialog").keydown(function(e){
        if(e.which==17 || e.which==74){
            e.preventDefault();
        }else{
            console.log(e.which);
        }
    })

 /*	Add new row to delivery table on button click */
   $("#addDeliveryRow").click(function () {
			var newRow = '<tr><td><select name="invoiceItem[]" class="invoiceItem" autocomplete="off" required><option value="" selected="selected">Select one</option></select></td><td><input type="number" name="invoiceQty[]" value="" id="" class="invoiceQty" maxlength="" size="" style="" autocomplete="off" required /></td><td><input type="text" name="invoicePrice[]" value="" id="" class="invoicePrice" maxlength="" size="" style="" autocomplete="off" required /></td><td><input type="text" name="invoiceAmt[]" value="" id="" class="invoiceAmt" maxlength="" size="" style="" autocomplete="off" readonly="readonly" required /></td><td><input class="button" style="margin-bottom:23px;" type="button" value="Delete Row" onclick="DeleteRowFunction(this)" /></td></tr>';
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
   
   /*Add supplier NOTE: if expense and outgoing are fetch from database, this code can be reused*/
   $(".addCategory").click(function(){
		var id = $(this).attr('id');
		
		var name = $('#' + id + '_input').val();
		if(name != ''){
			if(id=='addSupplier'){
				$.ajax({
							url: '<?php echo base_url().'index.php/admin/goto_add_category';?>',
							data: {cat_name: name,mode:id},
							type: "post",
							success: function(data){
							if(data){
								alert('New Category added.');
								if(id=='addSupplier')
									$("#supplierItem").append('<option value="' + name + '">' + name + '</option>');
							}
							else alert('New category not inserted. Try again');
							},
							error: function (xhr, ajaxOptions, thrownError) {

							}
				});
			}
		}
   });
   
   $('#expense option[value=other]').click(function(){
		var opt = '';
		while(opt == '' || opt== 'Others') opt=prompt("Please specify","Others");
			if(opt == null) return;
			$("#expense option:first-child").after('<option value="' + opt + '" >' + opt + '</option>');
			$("#expense").prop("selectedIndex", '1');
   });
   
   $('#outgoingDd option[value=other]').click(function(){
		var opt = '';
		while(opt == ''|| opt== 'Others') opt=prompt("Please specify","Others");
			if(opt == null) return;
			$("#outgoingDd option:first-child").after('<option value="' + opt + '" >' + opt + '</option>');
			$("#outgoingDd").prop("selectedIndex", '1');
   });
   
  /*
	Add new row to outgoing table on button click
 */
   $("#addOutgoingRow").click(function () {
			var newRow = '<tr><td><input name="outgoingItem[]" id="outgoingItem" class="tags outgoingItem" autocomplete="off" required/></td><td><input type="number" name="outgoingQty[]" value="" id="" class="outgoingQty" maxlength="" size="" style="" required="required" autocomplete="off"  /></td><td><input type="text" name="outgoingPrice[]" value="" id="" class="outgoingPrice" maxlength="" size="" style="" autocomplete="off" required="required" readonly="readonly"  />		</td><td><input type="text" name="outgoingAmt[]" value="" id="" class="outgoingAmt" maxlength="" size="" style="" autocomplete="off" required="required" readonly="readonly"  />		</td><td><input class="button" type="button" style="margin-bottom:23px;" value="Delete Row" onclick="DeleteRowFunction2(this)" /></td></tr>';
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
        url: '<?php echo base_url().'index.php/admin/goto_view_items_byId';?>',
        data: {item_id: $(this).val()},
        type: "post",
        success: function(data){
		var temp = JSON.parse(data);
		$("td:nth-child(3) input.invoicePrice", row).val(temp['retail_price']);
		},
		error: function (xhr, ajaxOptions, thrownError) {

      }
	});
  });

//automatic computation of opening and closing bills
  $('#openingBills input[type=number],#closingBills input[type=number] ').on('keyup mouseup',function(){
				 
				var total = 0, billsTotal = 0, coinsTotal = 0;
				var val = '';
				var par = $(this).parent().parent().parent().parent().parent().attr('id');
						//loop through the form and add the sum
						$('#' + par + ' input[type=number]').each(function(){
							val = $(this).val();
							if(!isNaN(val) && val != ''){
								//total = total + (val*$(this).attr('name'));
								if($(this).attr('class') == 'bills')
									billsTotal = billsTotal + (val*$(this).attr('name'));
								else if($(this).attr('class') == 'coins')
									coinsTotal = coinsTotal + (val*$(this).attr('name'));
							}
						});
						
						$('#' + par + ' input[name=billsTotal]').val(billsTotal);
						$('#' + par + ' input[name=coinsTotal]').val(coinsTotal);
						$('#' + par + ' input.totalBills').val(billsTotal + coinsTotal);
						//alert(par);
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

	$(document).on('click', '#creditButton', function(){
		var div = "<div id='customerInfo'><input type='hidden' id='hCustomerName' />Customer Name: <input type='text' name='customerName' id='customerName' class='tags' autocomplete='off' required/></div>";
		$(this).after(div);
	});
*/

	/*$('#purchase_list input[type=radio]').click(function(){
		if($(this).attr('id') == 'cashChoice'){
			var div = "Customer Cash: <input type='text' name='customerCash' id='customerCash' required /><button onclick='alertChange(); '>PAY</button>";
			$('#paymentDetails').html(div);
		}
		else if($(this).attr('id') == 'creditChoice'){
			var div = "<input type='hidden' id='hCustomerName' />Customer Name: <input type='text' name='customerName' id='customerName' class='tags' autocomplete='off' required /><button>RECORD</button>";
			$('#paymentDetails').html(div);
		}
	});*/
	
	$('#purchase_list input[type=radio]').click(function(){

		if($(this).attr('id') == 'cashChoice'){
			$('#customerName').removeAttr("required");
			$('#customerCash')[0].setAttribute("required", true);
			$('div#hcustomerName').css('display','none');
			$('div#hcustomerCash').css('display','inline-block');
		}
		else if($(this).attr('id') == 'creditChoice'){
			$('#customerName')[0].setAttribute("required", true);
			$('#customerCash').removeAttr("required");
			$('div#hcustomerCash').css('display','none');
			$('div#hcustomerName').css('display','inline-block');
			
		}
	});

	$('#pay_credit').click(function(){		
		$('div#hcustomerName').css('display','none');
		$('div#hcustomerCash').css('display','inline-block');		
	});
	
	
	$(document).on('keyup', '.tags', function(){
		var url = '';
		var source_id = $(this).attr('id');
		if(source_id == 'outgoingItem') url =  "<?php echo base_url().'index.php/pos/get_all_items';?>";
		else if(source_id == 'customerName') url = "<?php echo base_url().'index.php/pos/customers2';?>";
		else if(source_id == 'search_item'){
			var mode = document.getElementsByName("searchMode")[0].value;
			url = "<?php echo base_url().'index.php/pos/get_all_items2/';?>"+mode;
		}
		
		var availableTags = [];	
//fetch data in array
		 $.ajax({
			url: url,
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

		//alert(data);
//use autocomplete
			var row = $(this).parent().parent();
			$(this).autocomplete({
				source: availableTags, 
				select: function(event, ui){
				//if outgoing, update the price input field
					if(source_id == 'outgoingItem'){
						row.id = ui.item.item_id;
						$.ajax({
							url: '<?php echo base_url().'index.php/pos/goto_view_items_byId';?>',
							data: {item_id: row.id},
							type: "post",
							success: function(data){
								var temp = JSON.parse(data);
								$("td:nth-child(3) input.outgoingPrice", row).val(temp['retail_price']);
							},
							error: function (xhr, ajaxOptions, thrownError) {
							}
						});
					}
				//else if customer name, update the hidden field and put the customer id
					else if(source_id == 'customerName'){
						$('#hCustomerName').val(ui.item.customer_id);	
					}
				//else if search item, do nothing
					else if(source_id == 'search_item'){
							$('.hItemPurchase').val(ui.item.item_id);
					}
			},
				minLength:0
			});
		
	});


	 $( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 700,
			width: 1000,
			modal: true,
			buttons: {
			"Search": function() {
				$("#dialog-form table").html("");
				var mode = $("#hsearchDialog").val();
				var tag = $('#searchDialog').val();
				if(tag=="" || tag==null) return;
				//ajax
				$.ajax({
					url: '<?php echo base_url().'index.php/cashier/search2/';?>' + mode,
					data: {tag: tag},
					type: "post",
					success: function(data){
						//check if data is null
						if(data == null || data == ''){
							$("#dialog-form table").html("<tr><td>No items found.</td></tr>");
							return;
						}
						else{
							var temp = JSON.parse(data);
							var output = '';
							for (var i = 0; i < temp.length; i++){
								output = output + "<tr>";
								$.each(temp[i], function(key, value) {
	    							output = output + '<td>' + value + '</td>';
								});
								output = output + "</tr>";
							}
							$("#dialog-form table").html(output);
							//alert(output);
						}
					},
					error: function (xhr, ajaxOptions, thrownError) {
					}
				});
				//end of ajax
				//$( this ).dialog( "close" );
			},
			Close: function() {
			$( this ).dialog( "close" );
			}
			},
			open: function() {
    			$(this).keypress(function(e) {
      				if (e.keyCode == $.ui.keyCode.ENTER) {
        			//$(this).parent().find("button:eq(0)").trigger("click");
      				$(this).parent('.ui-dialog').find('.ui-dialog-buttonset button:first').click();
      				e.preventDefault();  
    				return false;
      				}
    			});
  			},
			close: function() {
			$("#dialog-form input").val("");
			}
	});

	 $( "#dialog-form2" ).dialog({
			autoOpen: false,
			height: 700,
			width: 1000,
			modal: true,
			buttons: {
			Close: function() {
				$( this ).dialog( "Search" );
			}
			},
			open: function(){
					//automatic computation of opening and closing bills
	  				$('#openingBills input[type=number],#closingBills input[type=number] ').on('keyup mouseup',function(){
					 
					var total = 0, billsTotal = 0, coinsTotal = 0;
					var val = '';
					var par = $(this).parent().parent().parent().parent().parent().attr('id');
							//loop through the form and add the sum
							$('#' + par + ' input[type=number]').each(function(){
								val = $(this).val();
								if(!isNaN(val) && val != ''){
									//total = total + (val*$(this).attr('name'));
									if($(this).attr('class') == 'bills')
										billsTotal = billsTotal + (val*$(this).attr('name'));
									else if($(this).attr('class') == 'coins')
										coinsTotal = coinsTotal + (val*$(this).attr('name'));
								}
							});
							
							$('#' + par + ' input[name=billsTotal]').val(billsTotal);
							$('#' + par + ' input[name=coinsTotal]').val(coinsTotal);
							$('#' + par + ' input.totalBills').val(billsTotal + coinsTotal);
							//alert(par);
					});

					$("#addOutgoingRow").click(function () {
					var newRow = '<tr><td><input name="outgoingItem[]" id="outgoingItem" class="tags outgoingItem" autocomplete="off" required/></td><td><input type="number" name="outgoingQty[]" value="" id="" class="outgoingQty" maxlength="" size="" style="" required="required" autocomplete="off"  /></td><td><input type="text" name="outgoingPrice[]" value="" id="" class="outgoingPrice" maxlength="" size="" style="" autocomplete="off" required="required" readonly="readonly"  />		</td><td><input type="text" name="outgoingAmt[]" value="" id="" class="outgoingAmt" maxlength="" size="" style="" autocomplete="off" required="required" readonly="readonly"  />		</td><td><input class="button" type="button" style="margin-bottom:23px;" value="Delete Row" onclick="DeleteRowFunction2(this)" /></td></tr>';
					$('table#outgoingTable').append(newRow);
   					}); 

   					//on employee login (DTR)
					$(document).on('click','#loginEmp',function() {
						var username = $("#empuName").val();
						var password = $("#empPwd").val();


						$.ajax({
							url: '<?php echo base_url().'index.php/cashier/employee_time/';?>',
							data: {username:username,password:password},
							type: "post",
							success: function(data){
									$("#dialog-form2").html(data);
							},
							error: function (xhr, ajaxOptions, thrownError) {
							}
						});
					});

					//on employee login (DTR)
					$(document).on('click','#logoutEmp',function() {
					
						$.ajax({
							url: '<?php echo base_url().'index.php/cashier/employee_logout/';?>',
							success: function(data){
									$('#dialog-form2').dialog( "close" );
							},
							error: function (xhr, ajaxOptions, thrownError) {
							}
						});
					});
				
			},
			close: function() {
			 	
			}
	});


/*$('#dialog-form').keypress(function(e) {
    if (e.which == 13) {
    $( '#dialog-form button').click( "Search" );
    }
    e.preventDefault();  
    return false;
     
})*/

	$( ".dialogThis" ).click(function() {
		var id = $(this).attr('id');
		$("#dialog-form table").html("");
		if(id == 'itemDSearch') $('#searchLabel').html('Item Search');
		else if(id == 'priceDSearch')  $('#searchLabel').html('Price Search');
		else if(id == 'custDSearch')  $('#searchLabel').html('Customer Search');
		else name.innerHTML = 'Search';
		$("#hsearchDialog").val(id);
		$( "#dialog-form" ).dialog( "open" );
		return false;
	});
	
	$( ".dialogThis2" ).click(function() {
		//$("#hsearchDialog2").val($(this).attr('id'));
		$("#dialog-form2").html("");
		var mode = $(this).attr('id');

		$.ajax({
			url: '<?php echo base_url().'index.php/cashier/dialog_show/';?>'+mode,
			type: "post",
			dataType: "html",
			success: function(data){
				$("#dialog-form2").html(data);
				$( "#dialog-form2" ).dialog( "open" );
			},
			error: function (xhr, ajaxOptions, thrownError) {
			}
		});
		return false;
		
	});
 
});  //end of document ready


	function alertChange()
	{
	var cash = $('#customerCash').val();
	var purchase = $('#totalPurchase').html().substring(1);
	var change = cash - purchase;
	if(cash=='')
		return;
	else {
		if(!isNaN(change) && change >= 0 ) alert("CHANGE:\n" + change + " php");
		else alert("Invalid change.");
	}
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
	
	$(function(){
		
	});
	
/*	
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
	
*/
</script>
	