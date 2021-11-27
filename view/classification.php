<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>

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

<h1><?php echo $classificationName; ?> vehicles</h1>
<?php if(isset($message)){
 echo $message; }
 ?>


<?php if(isset($vehicleDisplay)){
 echo $vehicleDisplay;
} ?>

</main>

<?php 
include "snippets/footer.php";
?>
</div>
    
</body>
</html>