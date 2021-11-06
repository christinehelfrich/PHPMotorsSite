
<?php



$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


switch ($url){
  case "http://localhost/phpmotors/index.php":
    $imgsrc = "images/site/logo.png";
    break;
 
    default:
    $imgsrc = "../images/site/logo.png";
}
 

?>

<header>
    <img class="logo" src="<?php echo $imgsrc;?>" alt="Logo">
    <span class="myaccount"><a href="/phpmotors/accounts/index.php?action=login">My Account</a></span>

    <nav>
    <?php 
    navFunction($classifications); 
    ?>
    </nav>

</header>

