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
    <form action="action_page.php" method="post">

  <div class="container">
    <label for="uname"><b>Enter a Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Enter a Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw"><b>Re-enter a Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Register</button>

    <span class="psw"><a href="login.php">Login to existing account?</a></span>
  </div>
</form>
</main>

<?php 
include "snippets/footer.php";
?>
</div>
    
</body>
</html>