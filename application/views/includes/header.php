<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Robson Valley Trails</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/featherlight.min.css">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-flatly.css">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
  
   	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url(); ?>js/jquery-2.1.3.js"></script>
    <script src="<?php echo base_url(); ?>js/bootbox.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
       //fade session message if exisits

       if($('#message').length){
          $('#message').delay(3000).fadeOut({}, 3000);
       }

       // show bootbox confirm on any link using .confirm class; if yes, will continue to href link
        $(".confirm").click(function(){
          var url = $(this).attr('href')
          bootbox.confirm("Are you sure?", function(result) {
            if(result == true){
              document.location = url;
            }else{
              location.reload();
            }
          }); 
          return false;

        }); // \ confirm click

      }); // \ doc ready

    </script>
   
  </head>

  <body class="metro">
<div class="nav-container">
  <div class="container">

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">Robson Valley Trails</a>

        </div>



        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url()?>trails/read">Trails</a></li>
            <li><a href="<?php echo base_url()?>upload/read">Gallery</a></li>
            <li><a href="<?php echo base_url()?>reports/read">Trail Reports</a></li>
          </ul>
              <!-- \ dropdown -->
              <ul class="nav navbar-nav navbar-right"> 
                

              <?php if($this->tank_auth->is_logged_in()): ?>
                <li><a href="">Welcome <?php echo $this->tank_auth->get_username(); ?></a></li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url()?>upload">Add to Gallery</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url()?>auth/change_password">Change Password</a></li>
                    <li><a href="<?php echo base_url()?>auth/change_email">Change Email</a></li>
                  </ul>
                </li>
                              <!-- \ dropdown -->
              <?php if($this->tank_auth->is_logged_in() && ($this->tank_auth->get_admin() == 1)): ?>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu"> 
                <li><a href="<?php echo base_url()?>trails/create">Add a Trail</a></li> 
                <li><a href="<?php echo base_url()?>reports/create">Add a Trail Report</a></li>
                <li><a href="<?php echo base_url()?>upload/approve">Publish User Uploads</a></li>
                <?php endif; ?>
               
                <?php if($this->tank_auth->is_logged_in() && ($this->tank_auth->get_super_admin() == 1)): ?> 
                  <li class="divider"></li>
                <li><a href="<?php echo base_url()?>auth/read">Edit Users</a></li>
              </ul>
                <?php endif; ?>
            
            </li>
                <li><a href="<?php echo base_url()?>auth/logout">Log Out</a></li>
              
              <?php else: ?>
                <li><a href="<?php echo base_url()?>auth/login">Log In</a></li>
            
            <?php endif; ?>  
            </ul>
        </div><!--/.nav-collapse -->

      </div>
    </nav>
  </div>
</div>
    <?php 
      $message = $this->session->flashdata('message');  //session library must be loaded globaly for this to work.

      if($message){
        echo "<h3 class=\"alert alert-info\" id=\"message\"><i class=\"fa fa-check\"></i>$message</h3>";
      }


     ?>

 

