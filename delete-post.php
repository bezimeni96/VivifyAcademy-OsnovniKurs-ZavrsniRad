<?php
    $post_id = $confirm = NULL;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $post_id = $_POST['post_id'];
        if (isset($_POST['confirmDelete'])) {
            $confirmDel = $_POST['confirmDelete'];
    
            require('database.php');
    
            if ($confirmDel == "true") {
                $sqlDelete = "DELETE FROM comments WHERE post_id=$post_id";
                $statement=$connection->prepare($sqlDelete);
                $statement->execute();
        
                $sqlDelete = "DELETE FROM posts WHERE id=$post_id";
                $statement=$connection->prepare($sqlDelete);
                $statement->execute();
        
                header("Location:posts.php");
            }
        }
            
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>?post_id=<?php echo $index; ?>" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $index; ?>">
    <input type="hidden" name="confirmDelete" id="confirmDelete">
    <button type="submit" class="btn btn-default" id="deletePost">Delete this post</button> <br>
</form>

<script src="delete-post.js"></script>