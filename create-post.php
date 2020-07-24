<?php
    require('database.php');

    include 'test-input.php';

    $firstName = $lastName = $postTitle = $body = '';
    $firstNameErr = $lastNameErr = $postTitleErr = $bodyErr = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        if (empty($_POST["firstName"])) {
            $firstNameErr = "*First name is required";
        } else {
        $firstName = test_input($_POST["firstName"]);
        }

        if (empty($_POST["lastName"])) {
            $lastNameErr = "*Last name is required";
        } else {
            $lastName = test_input($_POST["lastName"]);
        }

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

        if(($firstName !== '') && ($lastName !== '') && ($body !== '' ) && ($postTitle !== '')) {

            function insertPost($connection, $postTitle, $body, $userId) {
                $sqlInsert = "INSERT INTO posts (title, body, user_id) VALUES (?, ?, ?);";
                $statement = $connection->prepare($sqlInsert);
                $statement->execute([$postTitle, $body, $userId]);
            }

            function getUserID($connection, $firstName, $lastName) {
                $sqlSelect = "SELECT id FROM users WHERE first_name=? and last_name=?";
                $statement=$connection->prepare($sqlSelect);
                $statement->execute([$firstName, $lastName]);
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $result = $statement->fetch();
                return $result['id'];
            }

            $userId = 0;
            $userId = getUserID($connection, $firstName, $lastName);
            
            if ($userId !== NULL) {
                insertPost($connection, $postTitle, $body, $userId);
            } else {
                $sqlInsert = "INSERT INTO users (first_name, last_name) VALUES (?, ?);";
                $statement = $connection->prepare($sqlInsert);
                $statement->execute([$firstName, $lastName]);

                $userId = getUserID($connection, $firstName, $lastName);
                insertPost($connection, $postTitle, $body, $userId);
            }

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
    <div>
        First name
        <span style="color: red;" ><?php if ($firstName == "") echo $firstNameErr; ?></span> <br>
        <input type="text" name="firstName" placeholder="Insert your first name" value="<?php if ($firstName !== "") echo $firstName; ?>" style="width: 100% "> <br>

        Last name
        <span style="color: red;" ><?php if ($lastName == "") echo $lastNameErr; ?></span> <br>
        <input type="text" name="lastName" placeholder="Insert your last name" value="<?php if ($lastName !== "") echo $lastName; ?>" style="width: 100% "> <br>
    </div>

    Post title
    <span style="color: red;" ><?php if ($postTitle == "") echo $postTitleErr; ?></span> <br>
    <input type="text" name="postTitle" placeholder="Insert post title" value="<?php if ($postTitle !== "") echo $postTitle; ?>" style="width: 100% "> <br>

    Post content 
    <span style="color: red;" ><?php if ($body == "") echo $bodyErr; ?></span> <br>
    <textarea name="body" placeholder="Insert post content" cols="30" rows="10" style="width: 100% "><?php if ($body !== "") echo $body; ?></textarea> <br>
    <br>
    <button type="submit" class="btn btn-default">Send</button> <br>
</form>            