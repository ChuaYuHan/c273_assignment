<!-- Yuhan 19020844 -->
<?php
session_start();
include('dbFunctions.php');

if (isset($_SESSION['id'])) {
    $msg = "You are already logged in.";
} else {
    if (isset($_POST['username'])) {

        //retrieve form data
        $entered_username = $_POST['username'];
        $entered_password = $_POST['password'];

        //connect to database
        include ("dbFunctions.php");

        //match the username and password entered with database record
        $query = "SELECT * FROM patient 
                  WHERE username='$entered_username' AND 
                  password = '$entered_password'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        //if record is found, store id, username and password into session
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];

            header("location: ExerciseEntry.html");
        } else { //record not found
            $msg = "Sorry, you must enter a valid username 
                    and password to log in.";
            ?>
            <a href="Login.html">Login Page</a><br/>
            <?php
        }
        mysqli_close($link);
    }
}
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        echo $msg;
        ?>
    </body>
</html>
<!-- Yuhan 19020844 -->