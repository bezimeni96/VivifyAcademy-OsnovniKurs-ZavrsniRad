<?php session_start() ?>
<?php
    require('database.php');

    include 'test-input.php';

    $postTitle = $body = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

        if (!empty($_POST["title"])) {
            $postTitle = test_input($_POST["title"]);
        }  
        
        if (!empty($_POST["body"])) {
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

        }  
        header("Location:posts.php");
    }
?>           