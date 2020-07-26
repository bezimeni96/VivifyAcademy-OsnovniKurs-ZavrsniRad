<?php session_start();?>
<?php include 'header.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
          <h2>Add new post</h2>
          <div class="alert alert-danger" id="post-alert" style="display: none;">
            <strong>Danger!</strong> You didn't fill all input fields.
          </div>

          <form name="post-form" action="create-post.php" method="POST" onsubmit="return validatePostForm()">

              Post title
              <span id="titleErr" style="color: red;" ></span> <br>
              <input type="text" name="title" placeholder="Insert post title" value="<?php if ($postTitle !== "") echo $postTitle; ?>" style="width: 100% "> <br>

              Post content 
              <span  id="bodyErr" style="color: red;" ></span> <br>
              <textarea name="body" placeholder="Insert post content" cols="30" rows="10" style="width: 100% "><?php if ($body !== "") echo $body; ?></textarea> <br>
              <br>
              <button type="submit" class="btn btn-default">Send</button> <br>
          </form> 
        </div>

        <script src="create-post.js"></script>

        <?php include 'sidebar.php'; ?>

    </div><!-- /.row -->
</main><!-- /.container -->


<?php include 'footer.php'; ?>