<?php
// This is the main controller


// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
// Get the functions library
require_once 'library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

//var_dump($classifications);
//	exit;

// Build a navigation bar using the $classifications array


//echo $navList;
//exit;


$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 switch ($action){
 case 'register':
    include 'view/register.php';
  
  break;

  case 'login':
    include 'view/login.php';
  
  break;

  case 'vehicle-management':
    include 'vehicles/index.php';
  
  break;
 
 default:
  include 'view/home.php';
}




?>

      


