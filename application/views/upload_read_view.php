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

<section   data-featherlight-gallery data-featherlight-filter="a"> 
<div class="container">
<h1>Trail Gallery</h1>
<?php if(($results)): ?>

<div class="row">

	<?php foreach($results as $row): ?>
		<?php $approved = $row->approved; ?>
		<?php $file_id = $row->file_id; ?>
		<?php $file_title = $row->file_title; ?>
		<?php $time = $row->timestamp;  ?>
		<?php $format = 'DATE_COOKIE' ?>
	
	<div class="col-xs-6 col-md-3">
		<div class="gallery-item">
			<h4><?php echo $file_title;?></h4>
			<a href="<?php echo base_url(); ?>/uploads/<?php echo $row->file_name;?>" data-featherlight="image"  class="thumbnail"><img title="Taken on the <?php echo $row->trail_name; ?> trail. Uploaded by: <?php echo $row->username;?> on <?php echo date("m/d/y",strtotime($time)); /*unix_to_human($time);*/ ?>"  src="<?php echo base_url(); ?>/uploads/<?php echo $row->file_name;?>"></a>
			<p>Taken on the <?php echo $row->trail_name; ?> trail.<br>Uploaded by: <?php echo $row->username;?> on <?php echo date("m/d/y",strtotime($time));?></p>
			
		</div>
	</div>
	<?php endforeach; ?>
</div>		
<?php endif; ?>
</div>	
</section>
	

