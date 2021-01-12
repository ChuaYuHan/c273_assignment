<!-- Yuhan 19020844 -->
<?php
include('dbFunctions.php');

$username = $_POST['username'];
$password = $_POST['password'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$dob = $_POST['dob'];
$activeLevel = $_POST['activeLevel'];

$msg = "";
$query = "INSERT INTO patient(username, password, height, weight, date_of_birth, active_level)
        VALUES('$username', '$password', '$height', '$weight', STR_TO_DATE('$dob', '%d/%m/%y'), '$activeLevel')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if ($result) {
    $msg = "Record successfully added";
} else {
    $msg = "Record not added";
}

mysqli_close($link);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo $msg;
        header("location: Login.html");
        ?>
    </body>
</html>
<!-- Yuhan 19020844 -->