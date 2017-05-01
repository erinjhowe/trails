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
<?php echo form_open($this->uri->uri_string()); ?>

<div class="container upload-form">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
		<div class="col-xs-12 col-sm-4 col-md-4">
		<?php if ($use_username) { ?>
			<div class="input-group">
				<?php echo form_label('Username', $username['id']); ?>
			</div>
			<div class="input-group">
				<?php echo form_input($username); ?>
			</div>
			<div class="input-group">
				<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
			</div>
		<?php } ?>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4"></div>		
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<div class="input-group">
				<?php echo form_label('Email Address', $email['id']); ?>
			</div>
			<div class="input-group">
				<?php echo form_input($email); ?>
			</div>
			<div class="input-group">
				<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
			</div>

		</div>
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<div class="input-group">
				<?php echo form_label('Password', $password['id']); ?>
			</div>
			<div class="input-group">
				<?php echo form_password($password); ?>
			</div>
			<div class="input-group">
				<?php echo form_error($password['name']); ?>
			</div>

		</div>
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<div class="input-group">
				<?php echo form_label('Confirm Password', $confirm_password['id']); ?>
			</div>
			<div class="input-group">
				<?php echo form_password($confirm_password); ?>
			</div>
			<div class="input-group">
				<?php echo form_error($confirm_password['name']); ?>
			</div>

		</div>
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<div class="input-group upload-form">
				<?php echo form_submit('register', 'Register'); ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
	</div>


<?php echo form_close(); ?>