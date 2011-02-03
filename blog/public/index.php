<?php
/* site configuration */
$sitename = 'blog';
$config = 'blog/config/';
$docroot=$_SERVER['DOCUMENT_ROOT'] . implode('/',array_slice(explode('/',$_SERVER['PHP_SELF']),0,-3)) . '/';
$siteroot='http://' . $_SERVER['HTTP_HOST'] . implode('/',array_slice(explode('/',$_SERVER['PHP_SELF']),0,-3)) . '/';

/* initialize autoloader */
include($docroot.'library/autoload/Autoloader.php');
autoload_AutoLoader::init(array('blog/custom/', 'application/', 'library/', 'library/datatypes/'));

/* start the application */
$app = new models_Main($docroot, $siteroot, $sitename, $config);

/* print the output to the screen */
print $app->output;

/* debug mode */
if($app->cfg->get('debug')=='on'){
	print "\n<pre>\n";
	print_r($app);
	print "\n</pre>";
}