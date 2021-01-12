<!-- Yuhan 19020844 -->
<?php
session_start();
if (isset($_SESSION['id'])) {
    session_destroy();
    $_SESSION = array();
}
$message = "You have logged out.";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class='container'>
                <img src="image/ych-logo.png" alt="" height="50"/>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="SignUp.html">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Login.html">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br/>
        <div align="center">
            <?php
            echo $message;
            ?>
        </div>
    </body>
</html>
<!-- Yuhan 19020844 -->