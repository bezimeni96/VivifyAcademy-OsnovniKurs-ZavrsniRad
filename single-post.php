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
                <?php include 'delete-post.php'; ?>
                
            </div><!-- /.blog-post -->

            <?php include 'create-comment.php'; ?>

            <?php include 'comments.php'; ?>
            
        </div>

        <?php include 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->


<?php include 'footer.php'; ?>