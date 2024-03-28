<?php
// Including necessary files and establishing database connection
require_once('db_credentials.php');
require_once('database.php');
$db = db_connect();

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
    $rating = $_POST['rating']; 
    $review = $_POST['review'];

    // Check if an image has been uploaded
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];

        // Move uploaded image to the desired location
        move_uploaded_file($image_tmp_name, "images/$image_name");
    } else {
        // If no image is uploaded, set image name to NULL
        $image_name = NULL;
    }

    // Inserting new book into the database
    $sql = "INSERT INTO book (title, author, publisher, year, edition, genre, description, rating, review, image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($db, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssssss", $title, $author, $publisher, $year, $edition, $genre, $description, $rating, $review, $image_name);
    
    // Execute the prepared statement
    mysqli_stmt_execute($stmt);
    
    // Close the statement
    mysqli_stmt_close($stmt);

    // Get the ID of the newly inserted book
    $id = mysqli_insert_id($db);

    // Redirect to the show page for the newly created book
    header("Location: show.php?book_id=$id");
    exit;
}
?>

<!-- Your HTML form for creating a new book goes here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Book</title>
    <link rel="stylesheet" media="all" href="style.css" />
    <link rel="stylesheet" media="all" href="form.css" />
</head>
<body>

<?php include 'header.php'; ?>

<div class="grid-container">
    <div class="main">
        <h1>Create New Book</h1>
        <!-- Form for creating a new book -->
        <form action="create.php" method="post" enctype="multipart/form-data">
            <label for="image">Book Image:</label>
            <input type="file" name="image"><br>
            <label for="title">Title:</label>
            <input type="text" name="title"><br>
            <label for="author">Author:</label>
            <input type="text" name="author"><br>
            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher"><br>
            <label for="year">Year:</label>
            <input type="text" name="year"><br>
            <label for="edition">Edition:</label>
            <input type="text" name="edition"><br>
            <label for="genre">Genre:</label>
            <input type="text" name="genre"><br>
            <label for="description">Description:</label>
            <textarea name="description"></textarea><br>
            <label for="rating">Rating:</label>
            <input type="number" name="rating" min="0" max="5" step="0.1"><br>
            <label for="review">Review:</label>
            <textarea name="review"></textarea><br>
            <input type="submit" value="Create Book">
        </form>
    </div>

    <?php include("left.php"); ?>
    <?php include("right.php"); ?>
    <?php include("footer.php"); ?>
</div>
</body>
</html>
