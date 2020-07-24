<?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $post_id = $_POST['post_id'];
        if (isset($_POST['comment_id'])) {
            $comment_id = $_POST['comment_id'];
            
            require('database.php');
    
            $sqlDelete = "DELETE FROM comments WHERE id=$comment_id";
            $statement=$connection->prepare($sqlDelete);
            $statement->execute();
    
            header("Location:single-post.php?post_id=$post_id");
        }

    }
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>?post_id=<?php echo $index; ?>" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $index; ?>">
    <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
    <button type="submit" class="btn btn-default">Delete this comment</button> <br>
</form>