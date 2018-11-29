
  <?php include('../header/header.php') ?>

  <?php

    include ('../db/connection.php');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare('SELECT * FROM users');
        $statement->execute();
        $users = $statement->fetchAll(\PDO::FETCH_ASSOC);
      }
    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }

  ?>

  <!-- in this backoffice the user with the status "admin" can see all the users accounts from the website and change any informations about them -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-6 offset-2">
            <table class="backoffice-table">
              <tr>
                <th>Username</th>
                <th>User email</th>
                <th>User password</th>
                <th>User status</th>
                <th>Change info</th>
              </tr>
              <?php foreach($users as $user){ ?>
                <tr>
                  <form action="changeUser.php" method="post">
                    <td><input type="text" value="<?php echo $user['user_name'] ?>" name="user_name"></td>
                    <td><input type="text" value="<?php echo $user['user_email'] ?>" name="user_email"></td>
                    <td><input type="text" value="<?php echo $user['user_password'] ?>" name="user_password"></td>
                    <td><input type="text" value="<?php echo $user['user_status'] ?>" name="user_status"></td>
                    <td>
                      <input type="hidden" value="<?php echo $user['user_email'] ?>" name="user_old_email">
                      <input type="submit" value="Change informations">
                    </td>
                  </form>
                </tr>
              <?php }; ?>
            </table>
        </div>
      </div>
    </div>

  <?php include('../footer/footer.php') ?>
