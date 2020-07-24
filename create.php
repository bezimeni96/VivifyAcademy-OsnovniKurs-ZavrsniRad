<?php session_start();?>
<?php include 'header.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
          <?php include 'create-post.php'; ?>
        </div>

        <?php include 'sidebar.php'; ?>

    </div><!-- /.row -->
</main><!-- /.container -->


<?php include 'footer.php'; ?>