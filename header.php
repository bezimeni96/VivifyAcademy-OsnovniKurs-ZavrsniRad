<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">

</head>
<body>
<header>
    <div class="blog-masthead">
        <div class="container">
            <nav class="nav">
                <a class="nav-link <?php if ($_SERVER['PHP_SELF'] === "/posts.php") echo "active"?>" href="posts.php">Home</a>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] === "/create.php") echo "active"?>" href="create.php">Create</a>
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] === "/logout.php") echo "active"?>" href="logout.php">Logout</a>
                <?php }  else { ?>
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] === "/login.php") echo "active"?>" href="login.php">Login</a>
                <?php } ?>
                
            </nav>
        </div>
    </div>
</header>


