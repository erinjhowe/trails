<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>New Letter</h1>
<?php echo form_open_multipart('crud/create'); ?>

	<div class="form-group">
		<label for="letter">Letter</label>
		<input type="text" name="letter"  class="form-control form-width" value="<?php echo set_value('letter'); ?>">
		<?php echo form_error('letter'); ?>	
	</div> <!-- /form-goup -->

	<div class="form-group">
		<label for="description">Description</label>
		<textarea name="description"  class="form-control form-width"><?php echo set_value('description'); ?></textarea>
		<?php echo form_error('description'); ?>	
	</div> <!-- /form-goup -->

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary" value="Submit Letter">
	</div> <!-- /form-goup -->

</form>