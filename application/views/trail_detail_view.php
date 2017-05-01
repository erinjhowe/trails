<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

			
<div class="container">
<?php if(($results)): ?> <!-- //php mixin, if statement -->

	<div class="row">
		<div class="col-xs-12 col-sm-6">
	<?php foreach($results as $row): ?>
		<h2><?php echo $row->trail_name; ?></h2>
		<ul>
			<li>Area: <?php echo $row->area; ?></li>
			<li>Length: <?php echo $row->trail_length; ?>KM</li>
			<li>Elevation Gain: <?php echo $row->elevation_gain; ?>M</li>
			<li>Shelter: <?php echo $row->shelter; ?></li>
		</ul>
		<h3>Trail Description</h3>
		<?php echo $this->typography->auto_typography($row->trail_description); ?>
		<h3>Trail Access</h3>
		<?php echo $this->typography->auto_typography($row->trail_access); ?>

		<a class=" btn btn-primary" href="<?php echo base_url(); ?>trails/read">Back</a>
	<?php endforeach; ?> <!-- /foreach $results as $row-->
		 <?php if($this->tank_auth->is_logged_in() && ($this->tank_auth->get_admin() == 1)): ?>
		
			<a class=" btn btn-warning" href="<?php echo base_url(); ?>trails/edit/<?php echo $row->trail_id; ?>">Edit</a>
			<a class=" btn btn-danger confirm" href="<?php echo base_url(); ?>trails/delete/<?php echo $row->trail_id; ?>">Delete</a>

		<?php endif; ?>
			</div>
		<div class="col-xs-12 col-sm-6">
		<h3>Trail Map</h3>
		<img class="img-responsive" alt="trail map" src="<?php echo base_url(); ?>/maps/<?php echo $row->trail_map;  ?>">
			
		</div>
	</div>

	</div>
	

<?php endif; ?><!-- /if $results -->