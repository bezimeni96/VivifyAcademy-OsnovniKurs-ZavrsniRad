<?php
    session_start();
    require('database.php');

    $sqlSelect = "SELECT p.id id, p.title title, p.body body, p.created_at created_at, u.first_name first_name, u.last_name last_name FROM posts p
    INNER JOIN users u on p.user_id = u.id ORDER BY created_at DESC";
    $statement=$connection->prepare($sqlSelect);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $results = $statement->fetchAll();
?>

<?php
    include 'header.php';
?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php include 'display-posts.php'; ?>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
        </div><!-- /.blog-main -->

        <?php include 'sidebar.php'; ?>

    </div><!-- /.row -->
    
</main><!-- /.container -->

<?php include 'footer.php'; ?>

