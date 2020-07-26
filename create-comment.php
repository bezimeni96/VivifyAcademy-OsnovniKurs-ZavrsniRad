<?php
  require('database.php');

  include 'test-input.php';

  $author = $text ='';

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['confirmDelete'])) { 
      if (!empty($_POST["author"])) {
          $author = test_input($_POST["author"]);
        }

      if (!empty($_POST["text"])) {
          $text = test_input($_POST["text"]);
        }  
      
        $post_id = $_POST['post_id'];

     if(($author !== '') && ($text !== '' )) {
          $sqlInsert = "INSERT INTO comments (author, text, post_id) VALUES (?, ?, ?);";
          $statement = $connection->prepare($sqlInsert);
          $statement->execute([$author, $text, $post_id]);

        } 
    header("Location:single-post.php?post_id=$post_id");

}
?>



