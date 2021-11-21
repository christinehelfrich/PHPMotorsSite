<?php
if($_SESSION['loggedin'] = TRUE) {
  
}
else {
    header('Location: /phpmotors/index.php');
}
//TRntdyrl4*
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors Template</title>

    <link href="../css/small.css" rel="stylesheet">
    <link href="../css/large.css" rel="stylesheet">
    <link href="../css/normalize.css" rel="stylesheet">



</head>
<body>

<img class="backgroundimg" src="../images/site/small_check.jpg" alt="Racing Checkers">
<div class="whole">

<?php 
include "snippets/header.php";
?>

<main>
    <h1>Manage Account</h1>
    <?php 
    if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  }
  
?>


    <form method="post" action="/phpmotors/accounts/index.php">
  <div class="imgcontainer">
  </div>

  <div class="container">
      <h2>Update Account</h2>
  <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" id="fname" name="clientFirstname" value=<?php echo $_SESSION['clientData']['clientFirstname'];?> required >

    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" id="lname" name="clientLastname" value=<?php echo $_SESSION['clientData']['clientLastname'];?> required>
                                                                                     
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="name@email.com" id="email" name="clientEmail" value=<?php echo $_SESSION['clientData']['clientEmail'];?> required>

    <button type="submit">Update Info</button>
    <input type="hidden" name="action" value="updateClient">
    <input type="hidden" name="clientId" value="
    <?php if(isset($clientInfo['clientId'])){ echo $clientInfo['clientId'];} 
elseif(isset($clientId)){ echo $clientId; } ?>
">

  </div>
</form>

<form method="post" action="/phpmotors/accounts/index.php">
  <div class="imgcontainer">
  </div>

  <div class="container">
      <h2>Update Password</h2>

      <label for="psw"><b>New Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
    <span class="pswreq">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>


    <button type="submit">Update Password</button>
    <input type="hidden" name="action" value="password-change">

  </div>
</form>

</main>

<?php 
include "snippets/footer.php";
?>
</div>
    
</body>
</html>