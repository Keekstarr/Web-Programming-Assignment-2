<?php 
    session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" media="all" href="style.css" />
    <link rel="stylesheet" media="all" href="form.css" />
</head>
<body>
<?php
// Including necessary files and establishing database connection
require_once('db_credentials.php');
require_once('database.php');
$db = db_connect();

// Check if a book ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after redirection
}
$id = $_GET['id'];

// Retrieving book information based on the provided ID
$sql = "SELECT * FROM book WHERE book_id = '$id'";
$result_set = mysqli_query($db, $sql);
$result = mysqli_fetch_assoc($result_set);

// Handling form submission
// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Accessing form values
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];
    $edition = $_POST['edition'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $rating = $_POST['rating']; // Retrieve rating from form
    $review = $_POST['review']; // Retrieve review from form

    // Check if an image has been uploaded
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];

        // Move uploaded image to the desired location
        move_uploaded_file($image_tmp_name, "images/$image_name");
    } else {
        // If no image is uploaded, retain the existing image
        $image_name = $result['image'];
    }

    // Constructing the SQL query using prepared statements
    $sql = "UPDATE book SET title = ?, author = ?, publisher = ?, 
            year = ?, edition = ?, genre = ?, description = ?, rating = ?, review = ?, image = ? WHERE book_id = ?";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($db, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssssssi", $title, $author, $publisher, 
                   $year, $edition, $genre, $description, $rating, $review, $image_name, $id);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Redirect to the show page
    header("Location: show.php?book_id=$id");
}

?>

<!-- Including header -->
<?php include 'header.php'; ?>

<div class="grid-container">
    <div class="main">
        <h1>Edit Book</h1>
        <!-- Display current image -->
            <?php if (!empty($result['image'])) { ?>
                <img src="images/<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>"><br>
            <?php } else { ?>
                <p>No image available</p>
            <?php } ?>
        <!-- Form for editing book information including image upload -->
    <form action="edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <label for="image">Change Book Image:</label>
        <input type="file" name="image"><br>
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $result['title']; ?>"><br>
        <label for="author">Author:</label>
        <input type="text" name="author" value="<?php echo $result['author']; ?>"><br>
        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" value="<?php echo $result['publisher']; ?>"><br>
        <label for="year">Year:</label>
        <input type="text" name="year" value="<?php echo $result['year']; ?>"><br>
        <label for="edition">Edition:</label>
        <input type="text" name="edition" value="<?php echo $result['edition']; ?>"><br>
        <label for="genre">Genre:</label>
        <input type="text" name="genre" value="<?php echo $result['genre']; ?>"><br>
        <label for="description">Description:</label>
        <textarea name="description"><?php echo $result['description']; ?></textarea><br>
        <label for="rating">Rating:</label>
<input type="number" name="rating" min="0" max="5" step="0.1" value="<?php echo $result['rating']; ?>"><br>

<label for="review">Review:</label>
<textarea name="review"><?php echo $result['review']; ?></textarea><br>

        <input type="submit" value="Edit Book">
    </form>

    </div>


    <?php include("left.php"); ?>
    <?php include("right.php"); ?>
    <?php include("footer.php"); ?>
</div>


</body>
</html>