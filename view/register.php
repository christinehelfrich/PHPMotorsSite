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
<h1 class="login">Register</h1>

<?php
if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
 }
    ?>

<form method="post" action="/phpmotors/accounts/index.php">

  <div class="container">
    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" id="fname" name="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required>

    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" id="lname" name="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="name@email.com" id="email" name="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>required>

    <label for="psw"><b>Enter a Password</b></label>
    <input type="password" placeholder="Enter Password" id="psw" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
    <span class="pswreq">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>

    <input type="submit" name="submit" id="regbtn" value="Register">
    <input type="hidden" name="action" value="register2">

    <span class="psw"><a href="/phpmotors/accounts/index.php?action=login">Login to existing account?</a></span>
  </div>
</form>
</main>

<?php 
include "snippets/footer.php";
?>
</div>
    
</body>
</html>