<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
<h1><?php echo $heading ?></h1>

<?php if(($results)): ?> <!-- //php mixin, if statement -->
	
		<div class="row">
			<?php foreach($results as $row): ?>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="report">
					<h3><?php echo $row->report_name; ?></h3>
					<p><?php echo $row->report; ?></p>
					<a href="<?php echo base_url() ?>/reports/detail/<?php echo $row->report_id; ?>" class="btn btn-primary">Details</a>
					</div>
				</div>	
				<!-- in the url, first segment after base url - controller, second - function, third (and possibly fourth) - function perameter -->
			<?php endforeach; ?> <!-- /foreach $results as $row-->
		</div>
<?php endif; ?><!-- /if $results -->	
</div>