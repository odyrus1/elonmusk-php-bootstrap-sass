<?php

  include ('../db/connection.php');

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $statement = $conn->prepare('SELECT * FROM articles');
      $statement->execute();
      $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }

?>

<!-- showing all news articles from the db -->

<div class="container-fluid articles-container">

  <?php foreach($rows as $row) { ?>
    <div class="col-md-5 col-sm-12 information-container">
      <h1><?php echo $row['article_name'] ?></h1>
      <img src="<?php echo $row['article_img'] ?>" alt="elonmusk">
      <p><?php echo $row['article_text'] ?></p>
    </div>
  <?php }; ?>

</div>
