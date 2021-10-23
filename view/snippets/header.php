
<?php
switch ($action){
 case 'register':
    $imgsrc = "../images/site/logo.png";
  
  break;

  case 'login':
    $imgsrc = "../images/site/logo.png";
  
  break;

  case 'vehicle-management':
    $imgsrc = "../images/site/logo.png";
  
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
    echo $navList; 
    ?>
    </nav>

</header>

