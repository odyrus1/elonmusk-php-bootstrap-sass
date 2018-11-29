
<?php

session_start();

if($_POST['category'] == "all"){
  $_SESSION['itemsSelection'] = 'all';
  header("Location:shop.php");
}

if($_POST['category'] == "tshirt"){
  $_SESSION['itemsSelection'] = 'tshirt';
  header("Location:shop.php");
}

if($_POST['category'] == "vinyl"){
  $_SESSION['itemsSelection'] = 'vinyl';
  header("Location:shop.php");
}

if($_POST['category'] == "stickers"){
  $_SESSION['itemsSelection'] = 'stickers';
  header("Location:shop.php");
}

?>
