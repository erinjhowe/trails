<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//retrive DB results and set vars
//if($results){

	//foreach($results as $row){
		//$file_name = $row->file_name;
		//$author_id = $row->author_id;
		//$file_title = $row->file_title;
		//$approved = $row->approved;
		//$file_id = $row->file_id;

		//echo "$letter, $description, $id";
	//}


//}// if results
?>


<div class="container">
<h1>Approve User Uploads</h1>
<?php if(($results)): ?>

<div class="row">

	<?php foreach($results as $row): ?>
		<?php $file_id = $row->file_id; ?>
		<?php $file_title = $row->file_title; ?>	
	<div class="col-xs-6 col-md-3">
		<h3><?php echo $file_title; ?></h3>
		<a href="#" class="thumbnail"><img  src="<?php echo base_url(); ?>/uploads/<?php echo $row->file_name;?>"></a>
		<a class=" btn btn-warning" href="<?php echo base_url(); ?>upload/edit/<?php echo $file_id; ?>">Publish</a>
</div>
	<?php endforeach; ?>
</div>		

<?php endif; ?>
</div>	
	

