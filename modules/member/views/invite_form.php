<?php $this->load->helper('url') ?>
<?php $this->load->helper('asset') ?>


<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<?echo common_css_asset('bootstrap/css/bootstrap-responsive.min.css')?>
<?echo common_css_asset('bootstrap/css/bootstrap.min.css')?>
<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<style>

input {
	height:30px;
}
</style>
<body style="background:#000;">
    <div class="container">
        <div class="hero-unit">
            <h1>회원초대 <small>새글닷컴의 멤버를 초대해 주세요.</small></h1> 
            <hr/>
            
<?php 
echo form_open($this->uri->uri_string()); ?>
<div>
	<div class="row">
	<?php if ($use_username) { ?>
	
	
		<div class="span2" style="float:left;"><?php echo form_label('Username', $username['id']); ?></div>
		<div class="span3"><?php echo form_input($username); ?></div>
		<div class="span5" style="color:red;font-size:10px;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></div>
	
	
	<?php } ?>
	</div>
	<div class="row">
		<div class="span2" style="float:left;"><?php echo form_label('Email Address', $email['id']); ?></div>
		<div class="span3"><?php echo form_input($email); ?></div>
		<div class="span5" style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></div>
	</div>
	<div class="row">
		<div class="span2" style="float:left;"><?php echo form_label('Password', $password['id']); ?></div>
		<div class="span3"><?php echo form_password($password); ?></div>
		<div class="span5"style="color: red;"><?php echo form_error($password['name']); ?></div>
	</div>
	<div class="row">
		<div class="span2" style="float:left;"><?php echo form_label('Confirm Password', $confirm_password['id']); ?></div>
		<div class="span3"><?php echo form_password($confirm_password); ?></div>
		<div class="span5"style="color: red;"><?php echo form_error($confirm_password['name']); ?></div>
	</div>

			<input class='btn btn-success' type='submit' value='초대하기'> 

</div>
</div>
</div>
</body>
<?php // echo form_submit('register', 'Register'); ?>
<?php //echo form_close(); ?>