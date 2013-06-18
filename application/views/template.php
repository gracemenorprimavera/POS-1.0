<!DOCTYPE html>
<html>

<head>

	<title> POS </title>
	<?php $this->load->view('includes/resources'); ?>

</head>	

<body>

	<?php $this->load->view('includes/header'); ?>
	
	<!-- <div id="main_con">	
		<?php $this->load->view($page); ?>
	</div> -->
	<?php if($header=='P.O.S.') {
		echo '<div id="login_con">';
			 $this->load->view($page);
		echo '</div>';
	}else{
		echo '<div id="main_con">';
			$this->load->view($page);
		echo '</div>';
	} ?>

	<?php $this->load->view('includes/footer'); ?>

	<?php //$this->load->view('includes/about'); ?> 
	
</body>
</html>