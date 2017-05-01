<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1><?php echo $heading ?></h1>

<?php if(($results)): ?> <!-- //php mixin, if statement -->

	<?php foreach($results as $row): ?>
		<h3><?php echo $row->letter; ?></h3>
		<a href="<?php echo base_url() ?>/crud/detail/<?php echo $row->id; ?>" class="btn btn-primary">Details</a>	
		<!-- in the url, first segment after base url - controller, second - function, third (and possibly fourth) - function perameter -->
	<?php endforeach; ?> <!-- /foreach $results as $row-->

<?php endif; ?><!-- /if $results -->