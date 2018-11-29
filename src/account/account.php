
  <?php include('../header/header.php') ?>

  <!-- showing all informations in session about the actual connected user -->
  <!-- by clicking "edit your username" the customer goes to editInformations.php -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-6 offset-3 account-informations">
            <p>Your username: <?php echo $_SESSION['user']['username'] ?> | <a href="editInformations.php">Edit your username</a></p>
            <p>Your email: <?php echo $_SESSION['user']['email'] ?></p>
            <p>Your status: <?php if($_SESSION['user']['status'] == 1){ echo "Admin"; } else { echo "Customer"; } ?> </p>
        </div>
      </div>
    </div>

  <?php include('../footer/footer.php') ?>
