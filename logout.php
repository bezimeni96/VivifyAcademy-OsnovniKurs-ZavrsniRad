<?php
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        session_unset();
        header("Location:posts.php");

    }
?>

<?php include 'header.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button type="submit" class="btn btn-default">Logout</button> <br>
            </form>
            
        </div>

        <?php include 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->


<?php include 'footer.php'; ?>