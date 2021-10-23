<?php
// This is the main controller


// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model for use as needed
require_once '../model/vehicle-model.php';

// Get the array of classifications
$classifications = getClassifications();
$vehicleInfo = getVehicles();



// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';


// Build a classifications list using the $classifications array
$classificationList = '<select>';
$classificationList .= "<option id='selectclass' value='select'>Select a Classification</option>";
foreach ($classifications as $classification) {
    $classificationList .= "<option value=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</option>";
}
$classificationList .= '</select>';


//echo $classificationList;
//exit;



$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 switch ($action){
    case 'add-classification':
        include '../view/add-classification.php';

    break;

    case 'add-vehicle':
      include '../view/add-vehicle.php';
    
    break;

    case "addClassification":
        $addClassification = filter_input(INPUT_POST, 'classificationName');
        addClassification($addClassification);
        Header('Location: /phpmotors/vehicles/');

    case "addVehicle":
        $addMake = filter_input(INPUT_POST, 'make');
        $addModel = filter_input(INPUT_POST, 'model');
        $addDescription = filter_input(INPUT_POST, 'description');
        $addImagePath = filter_input(INPUT_POST, 'imagePath');
        $addThumbnail = filter_input(INPUT_POST, 'thumbnail');
        $addPrice = filter_input(INPUT_POST, 'price');
        $addColor = filter_input(INPUT_POST, 'color');
        addVehicle($addMake, $addModel, $addDescription, $addImagePath, $addThumbnail, $addPrice, $addColor);
        Header('Location: /phpmotors/vehicles/');

      
 default:
    include '../view/vehicle-management.php';
}






?>
