<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
<h1><?php echo $heading ?></h1>

<?php if(($results)): ?> <!-- //php mixin, if statement -->
	
		<div class="row">
			<?php foreach($results as $row): ?>
				<div class="col-xs-12 col-sm-4 ">
				<h3><?php echo $row->username; ?></h3>
				<ul>
					<li><p>Account Created on: <?php echo $row->created; ?></p></li>
					<li><p>Admin Privileges: <?php if($row->admin !== "0"){
						echo "True";
					} else {
						echo "False";
					}
					 ?></p></li>
					<li><p>Super Admin Privileges: <?php if($row->super_admin !== "0"){
						echo "True";
					} else {
						echo "False";
					}
					 ?></p></li>
					<li><p>Last Login: <?php echo $row->last_login; ?></p></li>
					<li><p>Last IP Address: <?php echo $row->last_ip; ?></p></li>

					<li><a href="<?php echo base_url() ?>/auth/edit/<?php echo $row->id; ?>" class="btn btn-warning">Edit User</a></li>

				</ul>
					<!--  -->
				</div>	
				<!-- in the url, first segment after base url - controller, second - function, third (and possibly fourth) - function perameter -->
			<?php endforeach; ?> <!-- /foreach $results as $row-->
		</div>
	</div>
<?php endif; ?><!-- /if $results -->