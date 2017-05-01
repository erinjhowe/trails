<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
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
			<div class="input-group">
				<?php echo form_label($login_label, $login['id']); ?>		
			</div>
			<div class="input-group">
				<?php echo form_input($login); ?>
			</div>
			<div class="input-group">
				<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
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
				<?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
			</div>

		</div>
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4 "></div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<div class="input-group">
				<?php echo form_checkbox($remember); ?>
				<?php echo form_label('Remember me', $remember['id']); ?>
			</div>
			<div class="input-group">
				<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
			</div>
			<div class="input-group">
				<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
			</div>
				<?php echo form_submit('submit', 'Let me in'); ?>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
	</div>
</div>


<?php echo form_close(); ?>