DISCOUNT <br>

<span> ask the user for what kind of discount. 
if fix amount, input the amount to be lessen to the total price, then compute and show the discounted price
else ask for the percentage, then compute and show the discounted price</span>

<?php echo form_open('sales/enter_discount') ?>
<?php echo form_radio('amount', 'amount'); ?>
Amount <br>
P<input type="text" name="discAmount"> <br>
<span> for example ang total ay P180 tapos nag-input ng 10 so print P 170</span>


<?php echo form_radio('percent', 'percent'); ?>
Percent <br>
%<input type="text">
<span> do the honor na rin na magcompute based on the total rin</span>
<?php echo form_submit(array('name'=>'cash_button', 'class'=>'button','style'=>'width:190px;'), 'Continue'); ?>

<span>after ma-click ung continue, mat-trigger niya ung function na sales/enter_discount, tapos ipapasa nun
sa sales_form ung variable na $discount. iyon sana iyong magiging hidden input sa cash form para pag
na-click ung save transaction, ma-popost ko din ung discount papunts sa db. sana nagets mo</span>