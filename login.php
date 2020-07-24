<?php
    session_start();

    require('database.php');

    include 'test-input.php';

    $username = $password = '';
    $usernameErr = $passwordErr = '';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        if (empty($_POST["username"])) {
            $usernameErr = "*Username is required";
        } else {
        $username = test_input($_POST["username"]);
        }

        if (empty($_POST["password"])) {
            $passwordErr = "*Password is required";
        } else {
            $password = ($_POST["password"]);
        }


        if (($username !== '') && ($password !== '')) {
            $sqlSelect = "SELECT id FROM users WHERE username=? and password=?";
            $statement = $connection->prepare($sqlSelect);
            $statement->execute([$username, $password]);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $user = $statement->fetch();

            if ($user == NULL) { ?>
                <div class="alert alert-danger">
                    <strong>Danger!</strong> This user doesn't exist.
                </div>
            <?php } else {
                $_SESSION['user_id'] = $user['id'];
                header("Location:create.php");
            }
        } else { ?>
            <div class="alert alert-danger">
                <strong>Danger!</strong> You didn't fill all input fields.
            </div>
        <?php }
        
    }
?>

<?php include 'header.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                Username
                <span style="color: red;" ><?php if ($username == "") echo $usernameErr; ?></span> <br>
                <input type="text" name="username" placeholder="Insert your username" value="<?php if ($username !== "") echo $username; ?>" style="width: 100% "> <br>

                Password
                <span style="color: red;" ><?php if ($password == "") echo $passwordErr; ?></span> <br>
                <input type="password" name="password" placeholder="Insert your password" style="width: 100% "> <br>
                <br>
                <button type="submit" class="btn btn-default">Login</button> <br>
 
            </form>
            
        </div>

        <?php include 'sidebar.php'; ?>

    </div><!-- /.row -->

</main><!-- /.container -->


<?php include 'footer.php'; ?>