<!-- Username change -->
<?php

include ('../db/connection.php');
session_start();
$validation = 0;
$_SESSION['errors'] = array();

if(isset($_POST['newUsername'])){
  if(preg_match("/^[a-zA-Z0-9]+$/", $_POST['newUsername']) == 1){
    $validation++;
    unset($_SESSION['errors']['usernameError']);
  } else {
    $_SESSION['errors']['usernameError'] = "Creation failed. Your username must contain only letters or numbers";
    header("Location:editInformations.php");
  }
}

if($validation > 0){

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $email = $_SESSION['user']['email'];
      $newUsername = $_POST['newUsername'];

      $statement = $conn->prepare("UPDATE users SET user_name = :newUsername WHERE user_email = :email");
      $statement->execute(array(
          "newUsername" => $newUsername,
          "email" => $email,
      ));
      $_SESSION['user']['username'] = $newUsername;
      header("Location:account.php");
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }

}
?>
<!-- Username change end -->
