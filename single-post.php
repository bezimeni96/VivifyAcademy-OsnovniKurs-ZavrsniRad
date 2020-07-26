<?php
    session_start();

    $index = null;

    if (isset($_GET['post_id'])) {
        $index=$_GET['post_id'];
    
    
        require('database.php');
        
        $sqlSelect = "SELECT p.id id, p.title title, p.created_at created_at, p.body body, u.first_name, u.last_name FROM posts p 
        INNER JOIN users u ON p.user_id=u.id
        WHERE p.id=?";
        $statement = $connection->prepare($sqlSelect);
        $statement->execute([$index]);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $singleBlog = $statement->fetch();
    }
?>

<?php include 'header.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $singleBlog['title']; ?></h2>
                <p class="blog-post-meta"><?php echo $singleBlog['created_at']; ?> by <a href="#"><?php echo($singleBlog['first_name'] . " " . $singleBlog['last_name']); ?></a></p>

                <p><?php echo $singleBlog['body'] ?></p>

                <br>
                <form id="delete-post" action="<?php echo $_SERVER['PHP_SELF']; ?>?post_id=<?php echo $index; ?>" method="POST">
                    <input type="hidden" name="post_id" value="<?php echo $index; ?>">
                    <input type="hidden" name="confirmDelete" id="confirmDelete">
                    <button type="submit" class="btn btn-default" id="deletePost">Delete this post</button> <br>
                </form>

                <script src="delete-post.js"></script>
                
            </div><!-- /.blog-post -->

            <div class="alert alert-danger" id="comment-alert" style="display: none;">
                <strong>Danger!</strong> You didn't fill all input fields.
            </div>
            <div>
                <form name="comment-form" action="create-comment.php" method="POST" class="create-comment" onsubmit="return validateCommentForm()">
                    <input type="hidden" name="post_id" value="<?php echo $index; ?>">

                    Author 
                    <span id="authorErr" style="color: red;" ></span> <br>
                    <input type="text" name="author" id="author" placeholder="Insert your name"  style="width: 100% "> <br>

                    Your comment 
                    <span id="commentErr" style="color: red;"></span> <br>
                    <textarea name="text" id="coment-content" cols="30" rows="5" placeholder="Insert your comment"  style="width: 100%"><?php if ($text !== "") echo $text; ?></textarea> <br>
                    
                    <br>
                    <button id="add-comment" type="submit" class="btn btn-default">Send</button> <br>
                </form>
            </div>

            <script src="create-comments.js"></script>

            <?php include 'comments.php'; ?>
            
        </div>

        <?php include 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->


<?php include 'footer.php'; ?>