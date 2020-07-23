<?php
  require('database.php');

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

  $author = $postTitle = $body = '';
  $authorErr = $postTitleErr = $bodyErr = '';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
      if (empty($_POST["author"])) {
        $authorErr = "*Name is required";
      } else {
          $author = test_input($_POST["author"]);
        }

      if (empty($_POST["postTitle"])) {
          $postTitleErr = "*Your post title is empty";
        } else {
          $postTitle = test_input($_POST["postTitle"]);
        }  
      
      if (empty($_POST["body"])) {
          $bodyErr = "*Post content is empty";
        } else {
          $body = test_input($_POST["body"]);
        } 

     if(($author !== '') && ($body !== '' ) && ($postTitle !== '')) {
          $sqlInsert = "INSERT INTO posts (author, title, body) VALUES (?, ?, ?);";
          $statement = $connection->prepare($sqlInsert);
          $statement->execute([$author, $postTitle, $body]);

          header("Location:posts.php");
     } else { ?>
      <div class="alert alert-danger">
        <strong>Danger!</strong> You didn't fill all input fields.
      </div>
     <?php }

}
?>



<h2>Add new post</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?create-post.php" method="POST">
    Author
    <span style="color: red;" ><?php if ($author == "") echo $authorErr; ?></span> <br>
    <input type="text" name="author" placeholder="Insert your name" value="<?php if ($author !== "") echo $author; ?>" style="width: 100% "> <br>

    Post title
    <span style="color: red;" ><?php if ($postTitle == "") echo $postTitleErr; ?></span> <br>
    <input type="text" name="postTitle" placeholder="Insert post title" value="<?php if ($postTitle !== "") echo $postTitle; ?>" style="width: 100% "> <br>

    Post content 
    <span style="color: red;" ><?php if ($body == "") echo $bodyErr; ?></span> <br>
    <textarea name="body" placeholder="Insert post content" value="<?php if ($body !== "") echo $body; ?>" cols="30" rows="10" style="width: 100% "></textarea> <br>
    <br>
    <button type="submit" class="btn btn-default">Send</button> <br>
</form>
            