
    <div class="container-fluid">

      <?php
        include('../header/header.php');
      ?>

      <!-- Basic signup form with errors handling -->

      <div class="row">
        <div class="col-6 offset-3">
          <form action="createUser.php" class="user-authentication" id="form" method="post">

            <label for="username">Username</label>
              <input type="text" id="username" name="username">
            <label for="email">Email</label>
              <input type="email" id="email" name="email">
            <label for="password">Password</label>
              <input type="password" id="password" name="password">
            <label for="confirmPassword">Confirm your password</label>
              <input type="password" id="confirmPassword" name="confirmPassword">

              <?php if(isset($_SESSION['errors'])) {
                  foreach($_SESSION['errors'] as $error): ?>
                    <p class="creationUserWarning"><?php echo $error ?></p>
              <?php endforeach;} ?>

            <input type="submit" value="Send">

          </form>
        </div>
      </div>

      <?php include('../footer/footer.php') ?>
    </div>
