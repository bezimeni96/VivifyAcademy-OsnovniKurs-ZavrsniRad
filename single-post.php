<?php
    $index = null;

    if (isset($_GET['post_id'])) {
        $index=$_GET['post_id'];
    
    
        require('database.php');
        
        $sqlSelect = "SELECT id, title, created_at, body, author FROM posts WHERE id = $index";
        $statement = $connection->prepare($sqlSelect);
        $statement->execute();
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
                <p class="blog-post-meta"><?php echo $singleBlog['created_at']; ?> by <a href="#"><?php echo $singleBlog['author']; ?></a></p>

                <p><?php echo $singleBlog['body'] ?></p>
            </div><!-- /.blog-post -->

            <?php include 'comments.php'; ?>
            
        </div>

        <?php include 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->


<?php include 'footer.php'; ?>