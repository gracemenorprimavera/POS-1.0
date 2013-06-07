Delivery

<?php $this->load->view('forms/delivery_form'); ?>
<?php $this->load->view('forms/supplier_form'); ?>

<?php 
echo $this->cart->format_number(245);
echo form_input(array('name' => 'f', 'value' => '', 'maxlength' => '3', 'size' => '5')); ?>