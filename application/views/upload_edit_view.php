<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//retrive DB results and set vars
if($results){

	foreach($results as $row){
		$file_name = $row->file_name;
		$author_id = $row->author_id;
		$file_title = $row->file_title;
		$approved = $row->approved;
		$id = $row->file_id;

		//echo "$letter, $description, $id";
	}


}// if results
?>


<div class="container">
<h1>Publish Upload</h1>
	<?php echo form_open_multipart("upload/edit/$id"); ?>

<div class="row">
<form>	
	<div class="col-xs-6 col-md-3">

			<div class="form-group">
			<label for="file_title">Photo Title</label>
			<input type="text" name="file_title"  class="form-control form-width" value="<?php echo set_value('file_title', $file_title); ?>">
		<?php echo form_error('file_title'); ?>	
		</div> <!-- /form-goup -->
		<a href="#" class="thumbnail"><img  src="<?php echo base_url(); ?>/uploads/<?php echo $row->file_name;?>"></a>

		<div class="form-group">
			<input type="radio" name="approved" value="0"> Reject
			<input type="radio" name="approved" value="1"> Approve
		</div> <!-- /form-goup -->

	</div>
</div>		
<div class="form-group">
		<input type="submit" name="submit" class="btn btn-primary" value="Publish Images">
	</div> <!-- /form-goup -->
</form>
</div>	
	

