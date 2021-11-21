<?php 
// Build a classifications list using the $classifications array
$classificationList = "<select name='classificationId'>";
$classificationList .= "<option id='classificationId' value='select'>Select a Classification</option>";
foreach ($classifications as $classification) {
    $classificationList .= "<option value=".urlencode($classification['classificationId'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</option>";
}
$classificationList .= '</select>';

// Build the car classification option list

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

<div class="dropdown">
<?php 
include "snippets/header.php";
?>
</div>

<main>
    <h1>Add Vehicle</h1>
    <?php
      if (isset($message)) {
       echo $message;
      }
    ?>

    <form method="post" action="/phpmotors/vehicles/index.php">
    <div class="container">
    <label for="selectclass">Select a Classification:</label>
    <?php echo $classificationList; ?>

    <label for="make">Make:</label>
    <input type="text" id="make" name="make" required>

    <label for="model">Model:</label>
    <input type="text" id="model" name="model" required>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required>

    <label for="imagePath">Image Path:</label>
    <input type="text" id="imagePath" name="imagePath" required>

    <label for="thumbnail">Thumbnail Path:</label>
    <input type="text" id="thumbnail" name="thumbnail" required>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required>

    <label for="stock">Stock:</label>
    <input type="text" id="stock" name="stock" required>

    <label for="color">Color:</label>
    <input type="text" id="color" name="color" required>

    <input type="submit" name="submit" id="addveh" value="Add Vehicle">
    <input type="hidden" name="action" value="addvehicle">
    </div>
</form>
</main>

<?php 
include "snippets/footer.php";
?>
</div>
    
</body>
</html>