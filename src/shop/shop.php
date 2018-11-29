
  <?php include('../header/header.php') ?>

  <!-- Fetch all products from all categories -->
  <?php
    include ('../db/connection.php');

    if(!isset($_SESSION['itemsSelection'])){
      $_SESSION['itemsSelection'] = "all";
    }

    if($_SESSION['itemsSelection'] == "all"){

      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $conn->prepare('SELECT * FROM shop_items');
          $statement->execute();
          $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
      catch(PDOException $e)
      {
        echo "Connection failed: " . $e->getMessage();
      }

    }
    // Fetch only products with item_cat 1 (tshirt)
    if($_SESSION['itemsSelection'] == "tshirt"){

      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $conn->prepare('SELECT * FROM shop_items WHERE item_cat = 1');
          $statement->execute();
          $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
      catch(PDOException $e)
      {
        echo "Connection failed: " . $e->getMessage();
      }

    }
    // Fetch only products with item_cat 2 (vinyl)
    if($_SESSION['itemsSelection'] == "vinyl"){

      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $conn->prepare('SELECT * FROM shop_items WHERE item_cat = 2');
          $statement->execute();
          $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
      catch(PDOException $e)
      {
        echo "Connection failed: " . $e->getMessage();
      }

    }
    // Fetch only products with item_cat 3 (stickers)
    if($_SESSION['itemsSelection'] == "stickers"){

      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $statement = $conn->prepare('SELECT * FROM shop_items WHERE item_cat = 3');
          $statement->execute();
          $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
      catch(PDOException $e)
      {
        echo "Connection failed: " . $e->getMessage();
      }

    }

  ?>

    <!-- You can select the category of products here. When selected, the request goes to itemsSelection.php where the $_SESSION['itemsSelection'] is changed. After that the app goes back to this page and you see only the products from the cat that you selected -->

    <div class="category-product-container">
      <form action="itemsSelection.php" method="post">
        <input type="radio" value="all" name="category">All</input>
        <input type="radio" value="tshirt" name="category">T-shirt</input>
        <input type="radio" value="vinyl" name="category">Vinyl</input>
        <input type="radio" value="stickers" name="category">Stickers</input>
        <input type="submit" value="Show">
      </form>
    </div>

    <!-- Showing the products from the selected category (by default all). In here you can see the picture of the product, the name, description, price and you can put it in the cart (it goes to addCart.php and in the db) -->

    <div class="container-fluid shop-products-container">
        <?php foreach($rows as $row) {?>
            <div class="shop-product-container">
              <form action="addCart.php" method="post">
                <img src="<?php echo $row['item_img'] ?>" alt=”animated”>
                <h1><?php echo $row['item_name'] ?></h1>
                <p><?php echo $row['item_desc'] ?></p>
                <span> Price: <?php echo $row['item_price'] ?>$</span>
                <input type="hidden" value="<?php echo $row['item_id'] ?>" name="item_id">
                <input type="submit" value="Add to cart">
              </form>
            </div>
        <?php } ?>
    </div>

  <?php include('../footer/footer.php') ?>
