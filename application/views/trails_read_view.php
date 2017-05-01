<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
<h1><?php echo $heading ?></h1>

<?php if(($results)): ?> <!-- //php mixin, if statement -->
	
		<div class="row">
			
			<div class="col-xs-12 col-sm-4 ">
				<h2>Valemount</h2>
				<?php foreach($results as $row): ?>
					<?php if(($row->area) === 'Valemount'): ?>
					<h3><a href="<?php echo base_url() ?>/trails/detail/<?php echo $row->trail_id; ?>" ><?php echo $row->trail_name; ?></a></h3>
					<?php endif; ?>
					
				<!-- in the url, first segment after base url - controller, second - function, third (and possibly fourth) - function perameter -->
				<?php endforeach; ?> <!-- /foreach $results as $row-->
			</div>
			<div class="col-xs-12 col-sm-4 ">
				<h2>McBride</h2>
				<?php foreach($results as $row): ?>
					<?php if(($row->area) === 'McBride'): ?>
					<h3><a href="<?php echo base_url() ?>/trails/detail/<?php echo $row->trail_id; ?>" ><?php echo $row->trail_name; ?></a></h3>
					<?php endif; ?>
					
				<!-- in the url, first segment after base url - controller, second - function, third (and possibly fourth) - function perameter -->
				<?php endforeach; ?> <!-- /foreach $results as $row-->
			</div>
			<div class="col-xs-12 col-sm-4 ">
				<h2>Dunster</h2>
				<?php foreach($results as $row): ?>
					<?php if(($row->area) === 'Dunster'): ?>
					<h3><a href="<?php echo base_url() ?>/trails/detail/<?php echo $row->trail_id; ?>" ><?php echo $row->trail_name; ?></a></h3>
					<?php endif; ?>
					
				<!-- in the url, first segment after base url - controller, second - function, third (and possibly fourth) - function perameter -->
				<?php endforeach; ?> <!-- /foreach $results as $row-->
				<h2>Mt Robson</h2>
				<?php foreach($results as $row): ?>
					<?php if(($row->area) === 'MtRobson'): ?>
					<h3><a href="<?php echo base_url() ?>/trails/detail/<?php echo $row->trail_id; ?>" ><?php echo $row->trail_name; ?></a></h3>
					<?php endif; ?>
					
				<!-- in the url, first segment after base url - controller, second - function, third (and possibly fourth) - function perameter -->
				<?php endforeach; ?> <!-- /foreach $results as $row-->
			</div>
		</div>
	</div>
<?php endif; ?><!-- /if $results -->