<?php

    require('database.php');

    include 'test-input.php';

    $postTitle = $body = '';
    $postTitleErr = $bodyErr = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

        if (empty($_POST["postTitle"])) {
            $postTitleErr = "*Your post title is empty";
        } else {
            $postTitle = test_input($_POST["postTitle"]);
        }  
        
        if (empty($_POST["body"])) {
            $bodyErr = "*Post content is empty";
        } else {
            $body = test_input($_POST["body"]);
        } 

        if(($body !== '' ) && ($postTitle !== '')) {

            function insertPost($connection, $postTitle, $body, $userId) {
                $sqlInsert = "INSERT INTO posts (title, body, user_id) VALUES (?, ?, ?);";
                $statement = $connection->prepare($sqlInsert);
                $statement->execute([$postTitle, $body, $userId]);
            }

            $userId = $_SESSION['user_id'];
            insertPost($connection, $postTitle, $body, $userId);

            header("Location:posts.php");
        } else { ?>
            <div class="alert alert-danger">
                <strong>Danger!</strong> You didn't fill all input fields.
            </div>
        <?php }  
    }
?>



<h2>Add new post</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?create-post.php" method="POST">

    Post title
    <span style="color: red;" ><?php if ($postTitle == "") echo $postTitleErr; ?></span> <br>
    <input type="text" name="postTitle" placeholder="Insert post title" value="<?php if ($postTitle !== "") echo $postTitle; ?>" style="width: 100% "> <br>

    Post content 
    <span style="color: red;" ><?php if ($body == "") echo $bodyErr; ?></span> <br>
    <textarea name="body" placeholder="Insert post content" cols="30" rows="10" style="width: 100% "><?php if ($body !== "") echo $body; ?></textarea> <br>
    <br>
    <button type="submit" class="btn btn-default">Send</button> <br>
</form>            