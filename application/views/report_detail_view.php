<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
<h1><?php echo $heading ?></h1>

<?php if(($results)): ?> <!-- //php mixin, if statement -->


	<?php foreach($results as $row): ?>
		<div class="row">
			<div class="col-xs-12">
				<h3><?php echo $row->report_name; ?></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h4>For: <?php echo $row->trail_name; ?></h4> 
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<?php echo $this->typography->auto_typography($row->report); ?>
				<p class="text-right"><em><?php echo $row->username; ?></em></p>
				<p class="text-right"><small><?php echo date("m/d/y",strtotime($row->time_date)); ?></small></p>
			</div>
		</div>

		

		<div class="row">
			<div class="col-xs-12">
			<a class=" btn btn-primary" href="<?php echo base_url(); ?>reports/read/<?php echo $row->report_id; ?>">Back</a>
			<?php if($this->tank_auth->is_logged_in() && ($this->tank_auth->get_admin() == 1)): ?>
				<a class=" btn btn-warning" href="<?php echo base_url(); ?>reports/edit/<?php echo $row->report_id; ?>">Edit</a>
				<a class=" btn btn-danger confirm" href="<?php echo base_url(); ?>reports/delete/<?php echo $row->report_id; ?>">Delete</a>
			<?php endif; ?>
			</div>
		</div>
		
	<?php endforeach; ?> <!-- /foreach $results as $row-->


<?php endif; ?><!-- /if $results -->
</div>