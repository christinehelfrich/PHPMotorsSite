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
    <?php
      if (isset($message)) {
       echo $message;
      }
    ?>
    <span class="classification"><a href="/phpmotors/vehicles/index.php?action=add-classification">+ New Classification</a></span>
    <span class="vehicle"><a href="/phpmotors/vehicles/index.php?action=add-vehicle">+ New Vehicle</a></span>
</main>

<?php 
include "snippets/footer.php";
?>
</div>
    
</body>
</html>