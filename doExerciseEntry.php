<!-- Yuhan 19020844 -->
<?php
include('dbFunctions.php');
session_start();

$type = $_POST['exerciseType'];
$duration = $_POST['duration'];
$pat_id = $_SESSION['id'];
$cat_id = $_POST['id'];

if ($type == 'Walk') {
    $cat_id = '1';
} else if ($type == 'Run') {
    $cat_id = '2';
} else {
    $cat_id = '3';
}

$msg = "";
$query = "INSERT INTO exercise(type, duration, patient_id, cat_id) VALUES('$type', '$duration', '$pat_id', '$cat_id')";
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
        header("Location: ExerciseHistory.php");
        ?>
    </body>
</html>
<!-- Yuhan 19020844 -->