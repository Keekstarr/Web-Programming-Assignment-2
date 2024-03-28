<?php 
    session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" media="all" href="style.css" />
  <title>index</title>
</head>
<body>
    <?php
        require_once('db_credentials.php');
        require_once('database.php');
        $db = db_connect();
    ?>

    <?php 
        $sql = "SELECT * FROM book ";
        $sql .= "ORDER BY title ASC";
        $result_set = mysqli_query($db,$sql);
    ?>

    <div class="grid-container">
        <?php include("header.php"); ?>

        <div class="main">
        <a href="logout.php">logout</a>
            <h1>Books</h1>
            <a class="action" href="new.php">Add New Book</a><br><br>
            <?php while($results = mysqli_fetch_assoc($result_set)) { ?>
                <div class="container">
                    <img src="images/<?php echo $results['image']; ?>" alt="<?php echo $results['title']; ?>">
                    <div>
                        <a class="action" href="<?php echo"show.php?book_id=" . $results['book_id']; ?>"><?php echo $results['title']; ?></a>
                        <p>By <?php echo $results['author']; ?></p>
                        <p><?php echo $results['description']; ?></p>
                        <p>Rating <?php echo $results['rating']; ?></p>
                        <a class="action" href="<?php echo "edit.php?id=" . $results['book_id']; ?>">Edit</a>
                        <a class="action" href=<?php echo "delete.php?id=" . $results['book_id']; ?>">delete</a>


                    </div>
                </div>
            <?php } ?>

        </div>

        <?php include("left.php"); ?>
        <?php include("right.php"); ?>
            
        <?php include("footer.php"); ?>
    </div>
</body>
</html>
