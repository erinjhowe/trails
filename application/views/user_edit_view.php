<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//retrive DB results and set vars
if($results){

	foreach($results as $row){
		$username = $row->username;
		$admin = $row->admin;
		$super_admin = $row->super_admin;
		$banned = $row->banned;
		$last_login = $row->last_login;
		$last_ip = $row->last_ip;
		$id = $row->id;

		//echo "$letter, $description, $id";
	}


}// if results
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1>Edit User</h1>
			<?php echo form_open_multipart("auth/edit/$id"); ?>

				<h2><?php echo $username; ?></h2>
				<ul>
					<li>Last Login: <?php echo $last_login ?></li>
					<li>Last IP Address: <?php echo $last_ip ?></li>
				</ul>
				


				<div class="form-group">
					<label for="admin">Admin Privileges</label>
					<input type="checkbox" name="admin" value="1" <?php if($admin == '1') echo "checked"; ?>>
					<?php echo form_error('admin'); ?>
					<label for="super_admin">Super Admin Privileges</label>
					<input type="checkbox" name="super_admin"  value="1" <?php if($super_admin == '1') echo "checked"; ?>>	
				</div> <!-- /form-goup -->

				<!-- <div class="form-group">
					<label for="admin">Super Admin Privileges</label>
					<input type="text" name="super_admin"  class="form-control form-width" value="<?php //echo set_value('super_admin', $super_admin); ?>">
					<?php //echo form_error('super_admin'); ?>	
				</div> --> <!-- /form-goup -->

				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Edit User Privileges">
				</div> <!-- /form-goup -->
		</div>
	</div>
</div>