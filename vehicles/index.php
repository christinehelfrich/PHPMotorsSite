<?php
// This is the main controller

// Create or access a Session
session_start();


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
       $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
       $Make = trim(filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING));
       $Model = trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING));
       $Description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
       $ImagePath = trim(filter_input(INPUT_POST, 'imagePath', FILTER_SANITIZE_STRING));
       $Thumbnail = trim(filter_input(INPUT_POST, 'thumbnail', FILTER_SANITIZE_STRING));
       $Price = trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING));
       $Stock = trim(filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING));
       $Color = trim(filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING));
      

               // Check for missing data
       if (empty($classificationId) ||empty($Make) || empty($Model) || empty($Description) || empty($ImagePath) || empty($Thumbnail) || empty($Price) || empty($Stock) ||empty($Color)) {
         $message = '<p>Please provide information for all empty form fields.</p>';
         include '../view/add-vehicle.php';
         exit; 
        }
       $vehicleOutcome = addVehicle($classificationId, $Make, $Model, $Description, $ImagePath, $Thumbnail, $Price, $Stock, $Color);
 
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

        /* * ********************************** 
         * Get vehicles by classificationId 
         * Used for starting Update & Delete process 
         * ********************************** */ 
    case 'getInventoryItems': 
            // Get the classificationId 
            $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
            // Fetch the vehicles by classificationId from the DB 
            $inventoryArray = getInventoryByClassification($classificationId); 
            // Convert the array to a JSON object and send it back 
            echo json_encode($inventoryArray); 
            break;
    case 'mod':
      $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
      $invInfo = getInvItemInfo($invId);
      if(count($invInfo)<1){
       $message = 'Sorry, no vehicle information could be found.';
      }
      include '../view/vehicle-update.php';
      exit;         
      break;

    case 'updateVehicle':
      $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
      $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
      $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
      $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
      $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
      $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
      $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
      $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
      $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
      $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
      
      if (empty($classificationId) || empty($invMake) || empty($invModel) 
       || empty($invDescription) || empty($invImage) || empty($invThumbnail)
       || empty($invPrice) || empty($invStock) || empty($invColor)) {
     $message = '<p>Please complete all information for the item! Double check the classification of the item.</p>';
       include '../view/vehicle-update.php';
    exit;
   }
   
   $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
   if ($updateResult) {
    $message = "<p class='notice'>Congratulations, the $invMake $invModel was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
   } else {
      $message = "<p class='notice'>Error. the $invMake $invModel was not updated.</p>";
       include '../view/vehicle-update.php';
       exit;
      }
   break;
         break;

   case 'del':
      $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
      $invInfo = getInvItemInfo($invId);
      if (count($invInfo) < 1) {
            $message = 'Sorry, no vehicle information could be found.';
         }
         include '../view/vehicle-delete.php';
         exit;
         break;

   case 'deleteVehicle':
      $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
$invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
$invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

$deleteResult = deleteVehicle($invId);
if ($deleteResult) {
	$message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
	$_SESSION['message'] = $message;
	header('location: /phpmotors/vehicles/');
	exit;
} else {
	$message = "<p class='notice'>Error: $invMake $invModel was not
deleted.</p>";
	$_SESSION['message'] = $message;
	header('location: /phpmotors/vehicles/');
	exit;
}
				
      break;
      
 default:

 $classificationList = buildClassificationList($classifications);
    include '../view/vehicle-management.php';
    break;
}






?>
