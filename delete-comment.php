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