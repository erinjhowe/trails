<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo $error;?>
<?php 
	$author_id = $this->tank_auth->get_user_id();
	$approved = "0";

	$hidden = array('author_id' => $author_id, 'approved' => $approved);
 ?>

<?php echo form_open_multipart('upload/do_upload/', '', $hidden);?>
<div class="container">
<div class="row">
	<div class="col-xs-12 col-sm-6">
	<h1>Add an Image to our Gallery</h1>
		<div class="upload-form">

			<form>
				<div class="form-group">
					<?php if(($results)): ?>
					<label for="trail">Trail</label>
					<select name="trail">
						<?php foreach($results as $row): ?>
						<option value="<?php echo $row->trail_id; ?>"><?php echo $row->trail_name; ?></option>
						<?php endforeach; ?>
					</select>

					<?php echo form_error('trail_name'); ?>	
					<?php endif; ?>
				</div> <!-- /form-goup -->

				<div class="form-group">
					<label for="file_title">Photo Title</label>
					<input type="text" name="file_title"  class="form-control form-width" value="<?php echo set_value('file_title'); ?>">
					<?php echo form_error('trail_name'); ?>	
				</div> <!-- /form-goup -->
				<div class="form-group">
					<input type="file" name="userfile" size="20" />
				</div> <!-- /form-goup -->

			<!-- <input type="submit" value="upload" /> -->
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Upload Image">
				</div> <!-- /form-goup -->
			</form>
		</div>
	</div>
</div>
</div>