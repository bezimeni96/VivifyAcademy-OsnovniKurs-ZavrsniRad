<?php
    foreach ($results as $blog) { ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></a></h2>
            <p class="blog-post-meta"><?php echo $blog['created_at']; ?> by <a href="#"><?php echo $blog['author']; ?></a></p>

            <p><?php echo $blog['body'] ?></p>
        </div><!-- /.blog-post -->
    <?php }
?>