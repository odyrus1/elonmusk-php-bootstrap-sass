<!-- User creation -->
<?php

include ('../db/connection.php');
session_start();
$_SESSION['errors'] = array();

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $email = $_POST['email'];
      $password = $_POST['password'];

      $statement = $conn->prepare('SELECT * FROM users WHERE user_email = :email AND user_password = :password');
      $statement->execute(array(
          "email" => $email,
          "password" => $password,
      ));
      $row = $statement->fetch(PDO::FETCH_ASSOC);

      if($row){
        $_SESSION['user']['username'] = $row['user_name'];
        $_SESSION['user']['email'] = $row['user_email'];
        $_SESSION['user']['id'] = $row['user_id'];
        $_SESSION['user']['status'] = $row['user_status'];
        header("Location:../account/account.php");
      }
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }
?>
<!-- User creation end -->
