<html>
<head>
<title>Sistem Informasi Akademik</title>
<meta charset="UTF-8" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bower_components/assets/css/login/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bower_components/assets/css/login/login.css">

</head>

<body>
<?php 
$attributes = array ('class'=> 'box login');
$attributes1 = array ('class'=> 'boxBody');
$btnLogin = array ('class'=> 'btnLogin');

echo form_open('app/logincheck',$attributes,'class=form-horizontal');?>
<?php echo form_fieldset('',$attributes1);?>
<?php echo "<label>username</label>"; echo form_input('username',$username,'placeholder=username');?>
<?php echo "<label>Password</label>"; echo form_password('password',$password,'placeholder=password');?></br>
<?php echo form_fieldset_close();?>
<footer>
<?php echo form_submit($btnLogin,'Login');?>
<?php echo "<label>"; echo  form_checkbox('alwayslogin', 'accept', FALSE,'tabindex=3'); echo "Tetap Masuk </label>"; ?>
</footer>
<?php echo form_close();?>

<footer id="main">
  PT. Surya Selindo
</footer>
</body>
</html>
