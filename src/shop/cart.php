
  <?php include('../header/header.php') ?>

  <?php

    include ('../db/connection.php');

    $customer_id = $_SESSION['user']['id'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("SELECT * FROM shop_items LEFT JOIN cart ON shop_items.item_id = cart.product_id WHERE cart.customer_id = $customer_id");
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
      }
    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }

  ?>

  <!-- Here we can see all the products that the actual user in session have in his db cart -->

  <div class="container-fluid shop-products-container">
      <?php foreach($rows as $row) {?>
          <div class="shop-product-container">
            <form action="deleteCart.php" method="post">
              <img src="<?php echo $row['item_img'] ?>" alt=”animated”>
              <h1><?php echo $row['item_name'] ?></h1>
              <p><?php echo $row['item_desc'] ?></p>
              <span> Price: <?php echo $row['item_price'] ?>$</span>
              <input type="hidden" value="<?php echo $row['item_id'] ?>" name="item_id">
              <input type="submit" value="Delete from cart">
            </form>
          </div>
      <?php } ?>
  </div>

  <?php include('../footer/footer.php') ?>
