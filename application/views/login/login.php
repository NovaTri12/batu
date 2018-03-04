<html>
<head>
<title>Aplikasi Penggunaan Batu</title>
	<meta charset="UTF-8" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bower_components/assets/css/login/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bower_components/assets/css/login/login.css">

</head>

<body>
	<?php 
	$attributes = array ('class'=> 'box login');
	$attributes1 = array ('class'=> 'boxBody');
	$btnLogin = array ('class'=> 'btnLogin', 'id'=> 'btnLogin');

//	echo form_open('auth/processlogin',$attributes,'class=form-horizontal');?>
	<form class="box login form-horizontal" >
	<?php echo form_fieldset('',$attributes1);?>
	<?php echo "<label>username</label>"; echo form_input('username',$username,'placeholder=username id=UserName');?>
	<?php echo "<label>Password</label>"; echo form_password('password',$password,'placeholder=password id=Passwd');?></br>
	<?php echo form_fieldset_close();?>
	<footer>
		<?php //echo form_submit($btnLogin,'Login');?>
		<btn class="btnLogin" id="btnLogin" attr-submit="<?php echo base_url();?>index.php/auth/processlogin" attr-dashboard="<?php echo base_url();?>index.php/app">Login</btn>
		<?php echo "<label>"; echo  form_checkbox('alwayslogin', 'accept', FALSE,'tabindex=3'); echo "Tetap Masuk </label>"; ?>
	</footer>
	</form>
	<div id="pesan"></div>
	<?php //echo form_close();?>

	<footer id="main">
		PT. Surya Selindo
	</footer>
</body>
<script type="text/javascript" src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>bower_components/notifyjs/dist/notify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>bower_components/assets/js/app.js"></script>
</html>
