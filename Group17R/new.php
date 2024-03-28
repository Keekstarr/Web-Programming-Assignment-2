<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" media="all" href="style.css" />
</head>
<body>
  
<?php include 'header.php'; ?>

<div id="content">

  <a class="back-link" href="<?php echo 'index.php'; ?>"> Back to List</a>

  <div class="New Employee">
    <h1>Create New Book</h1>

    <form action='create.php' method="POST" enctype="multipart/form-data">
    
      <dl>
        <dt>Title</dt>
        <dd><input type="text" name="title" /></dd>
      </dl>
      <dl>
        <dt>Author</dt>
        <dd><input type="text" name="author" /></dd>
      </dl>
      <dl>
        <dt>Publisher</dt>
        <dd><input type="text" name="publisher" /></dd>
      </dl>
      <dl>
        <dt>Year</dt>
        <dd><input type="text" name="year" /></dd>
      </dl>
      <dl>
        <dt>Edition</dt>
        <dd><input type="text" name="edition" /></dd>
      </dl>
      <dl>
        <dt>Genre</dt>
        <dd><input type="text" name="genre" /></dd>
      </dl>
      <dl>
        <dt>Description</dt>
        <dd><textarea name="description"></textarea></dd>
      </dl>
      <dl>
        <dt>Rating</dt>
        <dd><input type="number" name="rating" min="0" max="5" step="0.1" /></dd>
      </dl>
      <dl>
        <dt>Review</dt>
        <dd><textarea name="review"></textarea></dd>
      </dl>
      <dl>
        <dt>Image</dt>
        <dd><input type="file" name="image" /></dd>
      </dl>
      
      <div id="operations">
        <input type="submit" value="Create Book" />
      </div>
    </form>


  </div>

</div>

<?php include 'footer.php'; ?>


