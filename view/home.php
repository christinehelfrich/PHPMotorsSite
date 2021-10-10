<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors Template</title>

    <link href="css/small.css" rel="stylesheet">
    <link href="css/large.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">



</head>
<body>

<img class="backgroundimg" src="images/site/small_check.jpg" alt="Racing Checkers">
<div class="whole">

<header>
    <img class="logo" src="images/site/logo.png" alt="Logo">
    <span class="myaccount"><a href="view/login.php">My Account</a></span>

    <nav>
    <?php 
    echo $navList; 
    ?>
    </nav>

</header>

<main>
    <h1>Welcome to PHP Motors!</h1>
    <ul class="DMC">
        <li><strong>DMC Delorean</strong></li>
        <li>3 Cup Holders</li>
        <li>Superman Doors</li>
        <li>Fuzzy Dice!</li>
</ul>
    <img class="carpic" src="images/delorean.jpg" alt="Delorean Photo">
    <div>
    <img class="owntoday" src="images/site/own_today.png" alt="Own Today Button">
    </div>

    <div class="container">
    <h1 class="reviews">DMC Delorean Reviews</h1>
    <ul class="reviews" >
        <li>"So fast its almost like traveing in time."(4/5)</li>
        <li>"Coolest ride on the road."(4/5)</li>
        <li>"I'm feeling Marty McFly!"(5/5)</li>
        <li>"The most futuristic ride of our day."(5/5)</li>
        <li>"80s livin and I love it!"(5/5)</li>
    </ul>

    <h1 class="upgrades">Delorean Upgrades</h1>
    <div class="upgrades">

    <div class="flux">
        <img src="images/upgrades/flux-cap.png" alt="Flux Capacitor">
        <p>Flux Capacitor</p>
    </div>
    <div class="flame">
        <img src="images/upgrades/flame.jpg" alt="Flame Decals">
        <p>Flame Decals</p>
    </div>

    <div class="bumper">
        <img src="images/upgrades/bumper_sticker.jpg" alt="Bumper Stickers">
        <p>Bumper Sticker</p>
    </div>

    <div class="hub">
        <img src="images/upgrades/hub-cap.jpg" alt="Hub Caps">
        <p>Hub Caps</p>
    </div>

</div>
</div>



</main>

<footer>

<hr>
<p>PHP Motors, All rights reserved.</p>
<p>All images used are believed to be in "Fair Use". Please notify the autot if any are not and they will be removed.</p>
<p>Last Updated: <span id="last-updated">xx</span> </p>
</footer>
</div>
    
</body>
</html>