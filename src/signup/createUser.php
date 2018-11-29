<!-- User creation -->
<?php

include ('../db/connection.php');
session_start();
$_SESSION['errors'] = array();

// Set the validation. If validation == 3, create user
$validation = 0;

// Testing the username for only having letters or numbers
if(isset($_POST['username'])){
  if(preg_match("/^[a-zA-Z0-9]+$/", $_POST['username']) == 1){
    $validation++;
    unset($_SESSION['errors']['usernameError']);
  } else {
    $_SESSION['errors']['usernameError'] = "Creation failed. Your username must contain only letters or numbers";
    header("Location:signup.php");
  }
}
// Testing the email for the email format
if(isset($_POST['email'])){
  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $validation++;
    unset($_SESSION['errors']['emailError']);
  } else {
    $_SESSION['errors']['emailError'] = "Creation failed. Your email have the wrong format";
    header("Location:signup.php");
  }
}
// Testing the password and the confirmation
if(isset($_POST['password'])){
  if($_POST['password'] == $_POST['confirmPassword']){
    $validation++;
    unset($_SESSION['errors']['passError']);
  } else {
    $_SESSION['errors']['passError'] = "Creation failed. Your passwords don't match";
    header("Location:signup.php");
  }
}

if($validation == 3){

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Searching if an user with this email already exists

      $statement = $conn->prepare('SELECT * FROM users WHERE user_email = :email');
      $statement->execute(array(
          "email" => $email,
      ));
      $row = $statement->fetch(PDO::FETCH_ASSOC);

      if($row){
        $_SESSION['creationMsg']['existsError'] = "An user with this email already exists";
        header("Location:signup.php");
      }

      if(!$row)
      {
        $statement = $conn->prepare("INSERT INTO users(user_name, user_email, user_password)
            VALUES(:username, :email, :password)");
        $statement->execute(array(
            "username" => $username,
            "email" => $email,
            "password" => $password
        ));

        unset($_SESSION['errors']);
        header("Location:../app/index.php");

      }
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }
}
?>
<!-- User creation end -->
