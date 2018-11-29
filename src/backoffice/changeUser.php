
  <?php

    include ('../db/connection.php');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = $_POST['user_name'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $status = $_POST['user_status'];
        $user_old_email = $_POST['user_old_email'];
        
        $statement = $conn->prepare("UPDATE users SET user_name = :username, user_email = :email, user_password = :password, user_status = :status WHERE user_email = :user_old_email");
        $statement->execute(array(
            "username" => $username,
            "email" => $email,
            "password" => $password,
            "status" => $status,
            "user_old_email" => $user_old_email,
        ));

        header("Location:backoffice.php");

      }
    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }

  ?>
