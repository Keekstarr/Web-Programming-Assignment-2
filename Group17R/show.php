<?php 
    session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>


<body>
  <div class="grid-container">
    <?php include("header.php"); ?>
    <?php
        require_once('db_credentials.php');
        require_once('database.php');
        $db = db_connect();
        $id = $_GET['book_id'];
        $sql = "SELECT * FROM book WHERE book_id = '$id'";
        $result_set = mysqli_query($db, $sql);
        $result = mysqli_fetch_assoc($result_set);
      ?>
    <div class="main">
    <a class="back-link" href="index.php">&laquo; Back to List</a>

      <div class="show-container">
        <div class="show-content">
          <!-- Display book information -->
          <p><Strong>Title: </Strong><?php echo $result['title']; ?> </p> 
          <p><Strong>Author: </Strong><?php echo $result['author']; ?> </p>
          <p><Strong>Publisher: </Strong><?php echo $result['publisher']; ?> </p>
          <p><Strong>Year: </Strong><?php echo $result['year']; ?> </p>
          <p><Strong>Edition: </Strong><?php echo $result['edition']; ?> </p>
          <p><Strong>Genre: </Strong><?php echo $result['genre']; ?> </p>
          <p><Strong>Description: </Strong><?php echo $result['description']; ?> </p>
          <p><Strong>Rating: </Strong><?php echo $result['rating']; ?> </p>
          <p><Strong>Review: </Strong><?php echo $result['review']; ?> </p>
        </div>
        <?php if (!empty($result['image'])) { ?>
        <img src="images/<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>">
    <?php } else { ?>
        <p>No image available</p>
    <?php } ?>
      </div>
    </div>

      
      <?php include("left.php"); ?>
      <?php include("right.php"); ?>
      <?php include("footer.php"); ?>
  </div>
</body>

</body>
</html>

