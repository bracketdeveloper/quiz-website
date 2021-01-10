<?php
session_start();
include "../model/functions.php";

?>

<?php
$subjectId = $_GET['subjectId'];
$subject = getSpecificSubject($subjectId);
$quizResult = getSpecificQuizResultBySubject($subjectId);
$percentageResult = $quizResult[0]['obtain_marks']/5 *100;
$percentageResult = floor($percentageResult);
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
            <h1 class="display-4">Result of <?php echo $subject[0]['subject']?> Test</h1>
            <hr class="my-4">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 text-center offset-4">
            <table class="table table-striped ">
                <tr>
                    <th>Total Marks</th>
                    <td>5</td>
                </tr>
                <tr>
                    <th>Obtained Marks</th>
                    <td><?php echo $quizResult[0]['obtain_marks']?></td>
                </tr>
                <tr>
                    <th>Marks Percentage</th>
                    <td><?php echo $percentageResult ?>%</td>
                </tr>
            </table>
            <a href="index.php" class="btn btn-primary text-white">Take More Test</a>
            <a href="startTest.php?subjectId=<?php echo $subjectId?>" class="btn btn-success text-white">Retake</a>
        </div>

    </div>
</div>

</body>
</html>
