<!-- Yuhan 19020844 -->
<?php
include("dbFunctions.php");
session_start();

$patient = $_SESSION['id'];

// WHERE clause is to compare user login id with patient_id
$query = "SELECT * FROM exercise, exercise_category, patient
          WHERE exercise.cat_id = exercise_category.id
          AND exercise.patient_id = $patient
          ORDER BY exercise.cat_id";

$result = mysqli_query($link, $query) or
        die("Error in query: $query. " . mysqli_error($link));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Exercise History</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#itemTypes").change(function () {
                    if ($(this).val() == 0) {
                        $("tr").show();
                    } else {
                        $("tr").hide();
                        $(".header").show();
                        var cat = "." + $("#itemTypes").val();
                        $(cat).show();
                    }
                });
            });
        </script>
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
                            <a class="nav-link" href="ExerciseEntry.html">Exercise Entry</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="bg-light">
            <div class="container">
                <h3>Exercise History</h3>
                <form>
                    <div class="form-group">
                        <label for="itemTypes">Show:</label>
                        <select id="itemTypes" class="form-control">
                            <option value="0">
                                All categories
                            </option>
                            <option value="Walk">
                                Walk
                            </option>
                            <option value="Run">
                                Run
                            </option>
                            <option value="Cycle">
                                Cycle
                            </option>
                        </select>
                    </div>
                </form>
                <table id="idExerciseHistory" class="table table-hover table-bordered">
                    <tr class="header">
                        <th>Exercise Type</th>
                        <th>Duration</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $type = $row['type'];
                        $duration = $row['duration'];
                        $category = $row['category'];
                        ?>
                        <tr class="<?php echo $category; ?>">
                            <td>
                                <?php echo $type; ?>
                            </td>
                            <td>
                                <?php echo $duration; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>    
                </table>
            </div>
        </div>
    </body>
</html>
<!-- Yuhan 19020844 -->