<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
<h1>New Trail Report</h1>
<?php echo form_open_multipart('reports/create'); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<form>
				<div class="form-group">
					<label for="report_name">Report Title</label>
					<input type="text" name="report_name"  class="form-control form-width" value="<?php echo set_value('report_name'); ?>">
					<?php echo form_error('report_name'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="trail_name">Trail</label>
					<input type="text" name="trail_name"  class="form-control form-width" value="<?php echo set_value('trail_name'); ?>">
					<?php echo form_error('trail_name'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="report">Trail Report</label>
					<textarea name="report"  class="form-control form-width"><?php echo set_value('report'); ?></textarea>
					<?php echo form_error('report'); ?>	
				</div> <!-- /form-goup -->


				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit Report">
				</div> <!-- /form-goup -->

			</form>
		</div>
	</div>
</div>

