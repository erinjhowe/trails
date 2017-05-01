<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1><?php echo $heading ?></h1>

<?php if(($results)): ?> <!-- //php mixin, if statement -->

	<?php foreach($results as $row): ?>
		<h3><?php echo $row->letter; ?></h3>
		<?php echo $this->typography->auto_typography($row->description); ?>
		<a class=" btn btn-warning" href="<?php echo base_url(); ?>crud/edit/<?php echo $row->id; ?>">Edit</a>
		<a class=" btn btn-danger confirm" href="<?php echo base_url(); ?>crud/delete/<?php echo $row->id; ?>">Delete</a>
	<?php endforeach; ?> <!-- /foreach $results as $row-->

<?php endif; ?><!-- /if $results -->