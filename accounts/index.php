<?php
// This is the accounts controller


// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';

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
    case 'login':
        include '../view/login.php';
      
      break;

      case 'register':
        include '../view/register.php';
      
      break;

      case 'register2':
       // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
          $message = '<p>Please provide information for all empty form fields.</p>';
          include '../view/register.php';
          exit; 
         }


         // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
         // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        
        // Check and report the result
        if($regOutcome === 1){
          $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
          include '../view/login.php';
          exit;
         } else {
          $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
          include '../view/registration.php';
          exit;
         }
          break;

        
        case 'login2':
            // Filter and store the data
        $uname = trim(filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_EMAIL));
        $psw = trim(filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_STRING));
        
        $uname = checkEmail($uname);
        $psw = checkPassword($psw);

                // Check for missing data
        if (empty($uname) || empty($psw)) {
          $message = '<p>Please provide information for all empty form fields.</p>';
          include '../view/login.php';
          exit; 
         }

                 // Check and report the result
        if($regOutcome === 1){
          $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
          include '../view/login.php';
          exit;
         } else {
          $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
          include '../view/login.php';
          exit;
         }
          break;
        break;
     
     default:
      include '../view/home.php';

}

?>

      


