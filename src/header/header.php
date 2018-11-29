<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Elon Musk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  </head>
  <body>

    <?php session_start(); ?>

<div class="container-fluid">
  <div class="row">
    <!-- Logo container -->
    <div class="col-2 logo-container">
      <a href="../app/index.php"><img src="../../pictures/elonmusk-face.jpg" alt="elonmusk-face"></a>
    </div>
    <!-- Desktop menu container -->
    <div class="col-8 menu-container">
      <a href="../app/index.php">Home</a>
      <a href="../shop/shop.php">Shop</a>
      <?php if(!isset($_SESSION['user'])){ ?>
        <a href="../signup/signup.php">Sign up</a>
        <a href="../signin/signin.php">Sign in</a>
      <?php } else { ?>
        <a href="../account/account.php">Account</a>
        <a href="../account/logout.php">Log out</a>
        <a href="../shop/cart.php">Cart</a>
        <?php if($_SESSION['user']['status'] == 1) { ?>
          <a href="../backoffice/backoffice.php">Backoffice</a>
        <?php }; ?>
      <?php }; ?>
    </div>
    <!-- Mobile menu container -->
    <div class="mobile-menu-container">
      <a href="" onclick="showMenu(event)"><i class="fas fa-bars"></i></a>
      <div class="mobile-menu" id="mobileMenu">
        <a href="../app/index.php">Home</a>
        <a href="../shop/shop.php">Shop</a>
        <?php if(!isset($_SESSION['user'])){ ?>
          <a href="../signup/signup.php">Sign up</a>
          <a href="../signin/signin.php">Sign in</a>
        <?php } else { ?>
          <a href="../account/account.php">Account</a>
          <a href="../account/logout.php">Log out</a>
          <a href="../shop/cart.php">Cart</a>
          <?php if($_SESSION['user']['status'] == 1) { ?>
            <a href="../backoffice/backoffice.php">Backoffice</a>
          <?php }; ?>
        <?php }; ?>
      </div>
    </div>

  </div>
</div>

<script>
  // Function for showing the menu on mobile
  function showMenu(event){
    event.preventDefault();
    document.getElementById('mobileMenu').style.display == 'none' ?
      document.getElementById('mobileMenu').style.display = 'inline-block'
    :
      document.getElementById('mobileMenu').style.display = 'none';
  };
</script>
