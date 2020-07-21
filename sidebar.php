<?php
    require('database.php');

    $sqlSelect = "SELECT id, title FROM posts ORDER BY created_at DESC";
    $statement=$connection->prepare($sqlSelect);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $results = $statement->fetchAll();
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Latest postes</h4>
        <ul class="list-unstyled">
            <?php 
                foreach($results as $blog) { ?>
                    <li><a href="single-post.php?post_id=<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></a></li>
                <?php }
            ?>
        </ul>
    </div>
</aside>