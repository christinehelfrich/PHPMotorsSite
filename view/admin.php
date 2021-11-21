<?php
if($_SESSION['loggedin'] = TRUE) {
  
}
else {
    header('Location: /phpmotors/index.php');
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
<?php 
    if (isset($_SESSION['message'])) {
      $message = $_SESSION['message'];
      echo $message;
      }
      
    ?>
    <h1> <?php 
echo $_SESSION['clientData']['clientFirstname'];;echo " "; echo $_SESSION['clientData']['clientLastname'];;
?></h1>
<ul class="admin-list">
    <li>First Name: <p><?php 
echo $_SESSION['clientData']['clientFirstname'];?></p>
</li>
<li>Last Name: <p><?php 
echo $_SESSION['clientData']['clientLastname'];?></p>
</li>
<li>Email: <p><?php 
echo $_SESSION['clientData']['clientEmail'];?></p>
</li>
</ul>

<h2>Account Management</h2>
    <p>Use this link to update account information.</p>
    <span id='veh-crtl'><a href='/phpmotors/accounts/index.php?action=client-update'>Update Account Information</a></span>


<?php 
if($_SESSION['clientData']['clientLevel'] > 1) {
    echo "
    <h2>Inventory Management</h2>
    <p>Use this link to manage the inventory.</p>
    <span id='veh-crtl'><a href='/phpmotors/accounts/index.php?action=vehicles'>Vehicles Management</a></span>";
}
?>





</main>

<?php 
include "snippets/footer.php";
?>
</div>
    
</body>
</html>

