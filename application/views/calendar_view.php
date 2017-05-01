<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
	table{
		width:100%;
		background-color:#eaeaea;
	}
	td{
		padding:5px;
		border: 1px solid black;
		width:14%;
		vertical-align: top;
		height:100px;
		font-weight:bold;
		
		text-align:center;
	}
	td a{
		font-weight:normal;
		color:#f00;
		text-decoration:none;
	}
	.highlight{
		color:#f00;
	}


</style>
<h1><?php echo $heading ?></h1>
<!-- would be smart to do error handling for third and fourth param, ie. in not numeric... -->
<?php echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4)/*, $dates*/); ?>
