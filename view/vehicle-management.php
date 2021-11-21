<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}

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

    <link href="/phpmotors/css/small.css" rel="stylesheet">
    <link href="/phpmotors/css/large.css" rel="stylesheet">
    <link href="/phpmotors/css/normalize.css" rel="stylesheet">



</head>
<body>

<img class="backgroundimg" src="../images/site/small_check.jpg" alt="Racing Checkers">
<div class="whole">

<?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/snippets/header.php'; ?>


<main>
    <h1>Vehicle Management</h1>
    <span class="classification"><a href="/phpmotors/vehicles/index.php?action=add-classification">+ New Classification</a></span>
    <span class="vehicle"><a href="/phpmotors/vehicles/index.php?action=add-vehicle">+ New Vehicle</a></span>

    <?php
if (isset($message)) { 
 echo $message; 
} 
if (isset($classificationList)) { 
 echo '<h2>Vehicles By Classification</h2>'; 
 echo '<p>Choose a classification to see those vehicles</p>'; 
 echo $classificationList; 
}
?>

<noscript>
<p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
</noscript>
<table id="inventoryDisplay"></table>

</main>

<?php 
include "snippets/footer.php";
?>
</div>
<script src="../js/inventory.js"></script>
</body>
</html>

<?php
if (isset($_SESSION['message'])) {
$message = $_SESSION['message'];
}
?>
