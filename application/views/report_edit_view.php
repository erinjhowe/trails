<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//retrive DB results and set vars
if($results){

	foreach($results as $row){
		$report_name = $row->report_name;
		$report = $row->report;
		$trail_name = $row->trail_name;
		$id = $row->report_id;

		//echo "$letter, $description, $id";
	}


}// if resutls
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h1>Edit Trail Report</h1>
			<?php echo form_open_multipart("reports/edit/$id"); ?>
			<form>
				<div class="form-group">
					<label for="report_name">Report Title</label>
					<input type="text" name="report_name"  class="form-control form-width" value="<?php echo set_value('report_name', $report_name); ?>">
					<?php echo form_error('report_name'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="trail_name">Trail</label>
					<input type="text" name="trail_name"  class="form-control form-width" value="<?php echo set_value('trail_name', $trail_name); ?>">
					<?php echo form_error('trail_name'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="report">Trail Report</label>
					<textarea name="report"  class="form-control form-width"> <?php echo set_value('report', $report); ?></textarea>
					<?php echo form_error('report'); ?>	
				</div> <!-- /form-goup -->

				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Edit Trail">
				</div> <!-- /form-goup -->

			</form>		
		</div>
	</div>
</div>