
<!-- adding to cart in db the product that you selected on shop.php -->

<?php
  include ('../db/connection.php');
  session_start();

  $product_id = $_POST['item_id'];
  $customer_id = $_SESSION['user']['id'];

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $statement = $conn->prepare("INSERT INTO cart(product_id, customer_id)
          VALUES(:product_id, :customer_id)");
      $statement->execute(array(
          "product_id" => $product_id,
          "customer_id" => $customer_id,
      ));
    }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }

  header("Location:cart.php");

?>
