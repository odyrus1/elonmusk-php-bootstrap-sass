
  <?php include('../header/header.php') ?>

  <!-- here the customer can change his username. When submitted, the username is sent to sendInformations.php where it will be tested for errors and if all is good, the username will be sent to the db -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-6 offset-3 account-informations">
            <form action="sendInformations.php" method="post">
              <label for="newUsername">Your new username: </label>
                <input type="text" name="newUsername" id="newUsername">
                <input type="submit" value="Change">

                <?php if(isset($_SESSION['errors'])) {
                    foreach($_SESSION['errors'] as $error): ?>
                      <p class="creationUserWarning"><?php echo $error ?></p>
                <?php endforeach;} ?>

            </form>
        </div>
      </div>
    </div>

  <?php include('../footer/footer.php') ?>
