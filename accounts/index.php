<?php
// This is the accounts controller

// Create or access a Session
session_start();


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

        // Checking for an existing email

        $existingEmail = checkExistingEmail($clientEmail);

        if($existingEmail){
          $_SESSION['message'] = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
          include '../view/login.php';
          exit;
        
        }

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
          $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
          include '../view/register.php';
          exit; 
         }


         // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
         // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        
        // Check and report the result
        if($regOutcome === 1){
          setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
          //$message = "<p>Thanks for registering, $clientFirstname. Please use your email and password to login.</p>";
          $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
          //include '../view/login.php';
          header('Location: /phpmotors/accounts/?action=login');
          exit;
         } else {
          $_SESSION['message'] = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
          include '../view/registration.php';
          exit;
         }




          break;

        
        case 'login2':
          $clientEmail = filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_EMAIL);
          $clientEmail = checkEmail($clientEmail);
          $clientPassword = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_STRING);
          $passwordCheck = checkPassword($clientPassword);
          
          //echo "Client Email: $clientEmail";
          // Run basic checks, return if errors
          if (empty($clientEmail) || empty($clientPassword)) {
            $_SESSION['message'] = '<p>Please provide information for all empty form fields.</p>';
           include '../view/login.php';
           exit;
          }
            
          // A valid password exists, proceed with the login process
          // Query the client data based on the email address
          $clientData = getClient($clientEmail);
          // Compare the password just submitted against
          // the hashed password for the matching client
          $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
          // If the hashes don't match create an error
          // and return to the login view
          if(!$hashCheck) {
            $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
          }
          // A valid user exists, log them in
          $_SESSION['loggedin'] = TRUE;
          // Remove the password from the array
          // the array_pop function removes the last
          // element from an array
          array_pop($clientData);
          // Store the array into the session
          $_SESSION['clientData'] = $clientData;
          // Send them to the admin view
          include '../view/admin.php';
          exit;

        case 'adminpage':
          include '../view/admin.php';
          exit;

        case 'logout':
          unset($_SESSION['clientData']['clientFirstname']);
          session_destroy();
          header('Location: /phpmotors/');
          exit;

        case 'vehicles':
          header('Location: /phpmotors/vehicles/');
          exit;

        case 'client-update':
          $clientId = $_SESSION['clientData']['clientId'];
          $clientInfo = getClientItemInfo($clientId);
          if(count($clientInfo)<1){
           $message = 'Sorry, no vehicle information could be found.';
          }
          include '../view/client-update.php';
          exit;         
          break;

        case 'updateClient':
          $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
          $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
          $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
          $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
  
          if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) ) {
         $message = '<p>Please complete all information for the account! Double check the email.</p>';
           include '../view/client-update.php';
        exit;
       }
       
       $updateResult = updateAccount($clientFirstname, $clientLastname, $clientEmail, $clientId);
       if ($updateResult) {
        $message = "<p class='notice'>Congratulations, $clientFirstname $clientLastname, your account was successfully updated.</p>";
          $_SESSION['message'] = $message;
          $_SESSION['clientData']['clientFirstname'] = $clientFirstname;
          $_SESSION['clientData']['clientLastname'] = $clientLastname;
          $_SESSION['clientData']['clientEmail'] = $clientEmail;
          include '../view/admin.php';
          exit;
       } else {
          $message = "<p class='notice'>Error. Sorry, $clientFirstname $clientLastname, your account was not updated.</p>";
          include '../view/admin.php';
           exit;
          }
       break;

       case 'password-change':
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        $clientId = $_SESSION['clientData']['clientId'];
        $clientFirstname = $_SESSION['clientData']['clientFirstname'];
        $clientLastname = $_SESSION['clientData']['clientLastname'];
        $clientEmail = $_SESSION['clientData']['clientEmail'];


        $checkPassword = checkPassword($clientPassword);
                 // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        $passwordOutcome = updatePassword($hashedPassword, $clientId);
        if ($passwordOutcome) {
          $message = "<p class='notice'>Congratulations, $clientFirstname $clientLastname, your password was successfully updated.</p>";
            $_SESSION['message'] = $message;
            include '../view/admin.php';
            exit;
         } else {
            $message = "<p class='notice'>Error. Sorry, $clientFirstname $clientLastname, your password was not updated.</p>";
            include '../view/admin.php';
             exit;
            }


        break;

    
     default:
      include '../view/home.php';

}

?>

      


