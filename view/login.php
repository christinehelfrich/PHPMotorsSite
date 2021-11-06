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
    <h1 class="login">Login</h1>

    <?php
      if (isset($message)) {
       echo $message;
      }
    ?>

    <form method="post" action="/phpmotors/accounts/index.php">
  <div class="imgcontainer">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <input type="hidden" name="action" value="login2">

    <span class="psw"><a href="/phpmotors/accounts/index.php?action=register">Make an account?</a></span>
  </div>
</form>

</main>

<?php 
include "snippets/footer.php";
?>
</div>
    
</body>
</html>