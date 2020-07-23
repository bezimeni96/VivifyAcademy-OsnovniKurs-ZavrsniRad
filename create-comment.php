<?php
  require('database.php');

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

  $author = $text ='';
  $authorErr = $textErr = '';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
      if (empty($_POST["author"])) {
          $authorErr = "*Name is required";
        } else {
          $author = test_input($_POST["author"]);
        }

      if (empty($_POST["text"])) {
          $textErr = "*Your comment is empty";
        } else {
          $text = test_input($_POST["text"]);
        }  
      
        $post_id = $_POST['post_id'];

     if(($author !== '') && ($text !== '' )) {
          $sqlInsert = "INSERT INTO comments (author, text, post_id) VALUES (?, ?, ?);";
          $statement = $connection->prepare($sqlInsert);
          $statement->execute([$author, $text, $post_id]);

          header("Location:single-post.php?post_id=$post_id");
     } else { ?>
      <div class="alert alert-danger">
        <strong>Danger!</strong> You didn't fill all input fields.
      </div>
     <?php }

}
?>


<div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?post_id=<?php echo $index; ?>" method="POST" class="create-comment">
        <input type="hidden" name="post_id" value="<?php echo $index; ?>">

        Author 
        <span style="color: red;" ><?php if ($author == "") echo $authorErr; ?></span> <br>
        <input type="text" name="author" placeholder="Insert your name" value="<?php if ($author !== "") echo $author; ?>" style="width: 100% "> <br>

        Your comment 
        <span style="color: red;"><?php if ($text == "") echo $textErr; ?></span> <br>
        <textarea name="text" id="" cols="30" rows="5" placeholder="Insert your comment" value="" style="width: 100%"><?php if ($text !== "") echo $text; ?></textarea> <br>
        
        <br>
        <button type="submit" class="btn btn-default">Send</button> <br>
    </form>
</div>