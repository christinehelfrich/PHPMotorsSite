<?php
// This is the main controller


// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model for use as needed
require_once '../model/vehicle-model.php';
// Get the functions library
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();
$vehicleInfo = getVehicles();



// Build a navigation bar using the $classifications array



// Build a classifications list using the $classifications array
$classificationList = '<select>';
$classificationList .= "<option id='selectclass' value='select'>Select a Classification</option>";
foreach ($classifications as $classification) {
    $classificationList .= "<option value=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</option>";
}
$classificationList .= '</select>';






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
        $Classification = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING));
    
        //Header('Location: /phpmotors/vehicles/');

                // Check for missing data
        if (empty($Classification)) {
          $message = '<p>Please provide information for all empty form fields.</p>';
          include '../view/add-classification.php';
          exit; 
         }

         $classOutcome = addClassification($Classification);

         if($classOutcome === 1) {
            $message = "<p>Your new classification was added successfully</p>";
            include '../view/vehicle-management.php';
            exit;
         } else {
            $message = "<p>Sorry, your classification was not added.</p>";
            include '../view/vehicle-management.php';
            exit;
         }

            break;



    case "addvehicle":
        $Make = trim(filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING));
        $Model = trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING));
        $Description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
        $ImagePath = trim(filter_input(INPUT_POST, 'imagePath', FILTER_SANITIZE_STRING));
        $Thumbnail = trim(filter_input(INPUT_POST, 'thumbnail', FILTER_SANITIZE_STRING));
        $Price = trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING));
        $Color = trim(filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING));
    
                // Check for missing data
        if (empty($Make) || empty($Model) || empty($Description) || empty($ImagePath) || empty($Thumbnail) || empty($Price) || empty($Color)) {
          $message = '<p>Please provide information for all empty form fields.</p>';
          include '../view/add-vehicle.php';
          exit; 
         }
        $vehicleOutcome = addVehicle($Make, $Model, $Description, $ImagePath, $Thumbnail, $Price, $Color);

        if($vehicleOutcome === 1) {
            $message = "<p>Your new vehicle was added successfully</p>";
            include '../view/add-vehicle.php';
            exit;
         } else {
            $message = "<p>Sorry, your vehicle was not added.</p>";
            include '../view/add-vehicle.php';
            exit;
         }

            break;
        //Header('Location: /phpmotors/vehicles/');

      
 default:
    include '../view/vehicle-management.php';
}






?>
