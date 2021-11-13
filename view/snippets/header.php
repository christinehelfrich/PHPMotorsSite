
<?php

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


switch ($url){
  case "http://localhost/phpmotors/index.php":
    $imgsrc = "images/site/logo.png";
    break;

  case "http://localhost/phpmotors/":
    $imgsrc = "images/site/logo.png";
    break;
 
    default:
    $imgsrc = "../images/site/logo.png";
}
 
?>

<header>
    <img class="logo" src="<?php echo $imgsrc;?>" alt="Logo">

    <?php
    if(isset($_SESSION['clientData']['clientFirstname'])){
      $firstname = $_SESSION['clientData']['clientFirstname'];
      echo "<span class='welcome'><a href='/phpmotors/accounts/index.php?action=adminpage'>Welcome, $firstname</a></span>";
      echo "<span class='welcome'><a href='/phpmotors/accounts/index.php?action=logout'>Logout</a></span>";
    }
    else{
      echo "<span class='welcome'><a href='/phpmotors/accounts/index.php?action=login'>My Account</a></span>";
    }
    ?>
    

    <nav>
    <?php 
    navFunction($classifications); 
    ?>
    </nav>

</header>



