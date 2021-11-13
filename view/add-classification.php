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
    <h1>Add Classification</h1>
    <?php
      if (isset($message)) {
       echo $message;
      }
    ?>

    <form method="post" action="/phpmotors/vehicles/index.php">
    <div class="container">
    <label for="classificationName">Classification Name:</label>
    <input type="text" id="classificationName" name="classificationName" required>
    <input type="submit" name="submit" id="addClassification" value="Add Classification">
    <input type="hidden" name="action" value="addClassification">
    </div>
</form>
</main>

<?php 
include "snippets/footer.php";
?>
</div>
    
</body>
</html>