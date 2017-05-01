This is a basic build of CI version 3 

Certain things have been added and deleted for our DMIT lessons:


 - User Guide has been deleted (it's online http://www.codeigniter.com/userguide3/)

 - Some folders have been deleted since we won't use them.

 - Bootstrap files have been added so we can build in a responsive layout as we go.
 - jQuery also added.
 - In the root, we have added "/css/" and "/js/" folder for bootstrap, jQuery. A "/pictures/" folder also added for some lessons files. These will all be pathed from the root for simplicity.
 - In views, we have an "includes" folder with both a "header.php" and "footer.php" we will use for design.



Configuration - "application/config" folder:
--------------------------------------------
--------------------------------------------

config.php
----------
$config['base_url'] = '' ; // copy/paste the URL of the root install (including trailing slash / ); this is a MUST to figure out paths for us!

$config['encryption_key'] = '';// set to use encryption later if we want


 

autoload.php
------------
We will set these to any libraries/helpers we will use a lot so they are loaded globally.

$autoload['libraries'] = array('session','database');

$autoload['helper'] = array('url','form');

routes.php
----------
$route['default_controller'] = 'home';// set this to whichever controller (once we have built it); this will be the "home page".

database.php
------------
Figure it out, but I'm going to suggest you create a new DB for this first (username_ci) as we will have several tables.

'hostname' => 'localhost',
'username' => '',
'password' => '',
'database' => '',



