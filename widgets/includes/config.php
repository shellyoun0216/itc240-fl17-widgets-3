<?php
/*config.php

stores configuration information for our web application


*/

// prevents header already sent errors 
ob_start();

define('DEBUG',TRUE); #we want to see all errors

//create config object
$config = new stdClass; 

// prevents date errors
date_default_timezone_set('America/Los_Angeles');

//add include file reference here:
include 'credentials.php';//database credential here
include 'common.php';//favorite function here


// find the current page url:

//echo basename($_SERVER['PHP_SELF']);
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF
$sub_folder = 'widgets';//change to 'widgets' or 'sprockets' etc.

//add subfolder, in this case 'fidgets' if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
$config->virtual_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;
$config->theme = 'BusinessCasual';//sub folder to themes

//END NEW THEME STUFF



//web page defaults
$config->title = THIS_PAGE;
$config->banner = 'Widget';

switch (THIS_PAGE) {
	case 'index.php':
		$config->title = "Home Page";
		$config->banner = "Widget";
		break;

	case 'customer.php':
		$config->title = "Customers Page";
		
		break;

	case 'appointment.php':
		$config->title = "Appointment Page";
		
		break;

	case 'contact.php':
		$config->title = "Contact Page";
		
		break;

	case 'daily.php':
		$config->title = "Daily Page";
		
		break;
}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . '/themes/' . $config->theme . '/';
//END NEW THEME STUFF


?>