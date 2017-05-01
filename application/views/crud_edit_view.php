<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//retrive DB results and set vars
if($results){

	foreach($results as $row){
		$letter = $row->letter;
		$description = $row->description;
		$id = $row->id;

		//echo "$letter, $description, $id";
	}


}// if resutls
?>

<h1>Edit Letter</h1>
<?php echo form_open_multipart("crud/edit/$id"); ?>

	<div class="form-group">
		<label for="letter">Letter</label>
		<input type="text" name="letter"  class="form-control form-width" value="<?php echo set_value('letter', $letter); ?>">
		<?php echo form_error('letter'); ?>	
	</div> <!-- /form-goup -->

	<div class="form-group">
		<label for="description">Description</label>
		<textarea name="description"  class="form-control form-width"> <?php echo set_value('description', $description); ?></textarea>
		<?php echo form_error('description'); ?>	
	</div> <!-- /form-goup -->

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary" value="Edit Letter">
	</div> <!-- /form-goup -->

</form>