<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors Template</title>

    <link href="css/small.css" rel="stylesheet">
    <link href="css/medium.css" rel="stylesheet">
    <link href="css/large.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">



</head>
<body>

<img class="backgroundimg" src="images/site/small_check.jpg" alt="Racing Checkers">
<div class="whole">

<header>
    <img class="logo" src="images\site\logo.png">
    <span class="myaccount"><a href="login.php">My Account</a></span>

    <nav>
    <?php 
    echo $navList; 
    ?>
    </nav>



</header>

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

<footer>
<p>PHP Motors, All rights reserved.</p>
<p>All images used are believed to be in "Fair Use". Please notify the autot if any are not and they will be removed.</p>
<p>Last Updated: <span id="last-updated">xx</span> </p>
</footer>
</div>
    
</body>
</html>