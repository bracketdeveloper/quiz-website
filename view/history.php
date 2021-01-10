<?php
session_start();
include "../model/functions.php";

?>

<?php
$userId = $_SESSION['user_id'];
$users = getSpecificUserById($userId);
$userQuizzes = getSpecificQuizResultByUserId($userId);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.js.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<?php
include "../common/top-bar.php";
?>
<div class="container">
    <div class="row">
        <div class="jumbotron">
            <h1 class="display-4">Quiz History of <?php echo ucfirst($users[0]['username']) ?></h1>
            <hr class="my-4">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 text-center offset-2">
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>Subject</th>
                    <th>Total Marks</th>
                    <th>Obtain Marks</th>
                    <th>Percentage</th>
                    <th>Date</th>
                </tr>
                </thead>
                <?php
                foreach ($userQuizzes as $userQuiz) {
                    $subjectId = $userQuiz['subject_id'];
                    $subject = getSpecificSubject($subjectId)[0]['subject'];
                    $obtainMarks = $userQuiz['obtain_marks'];
                    $percentageMarks = $obtainMarks / 5 * 100;
                    $percentageMarks = floor($percentageMarks);
                    $date = $userQuiz['time'];
                    $date = date("d-m-Y H:i:s A", strtotime($date))
                    ?>
                    <tr>
                        <td><?php echo $subject?></td>
                        <td>5</td>
                        <td><?php echo $obtainMarks?></td>
                        <td><?php echo $percentageMarks?>%</td>
                        <td><?php echo $date?></td>
                    </tr>

                    <?php
                }
                ?>
            </table>

        </div>

    </div>
</div>

</body>
</html>
