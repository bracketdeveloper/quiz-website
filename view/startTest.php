<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
include "../model/functions.php";
?>

<?php
$subjectId = $_GET['subjectId'];
$subjects = getSpecificSubject($subjectId);
$allQuestions = getSubjectQuestions($subjectId);
$fiveRandQuestions = getSubjectRandomFiveQuestions($subjectId);
?>

<!doctype html>
<html lang="en " >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.js.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/jquery.js"></script>
</head>
<body>
<?php
include "../common/top-bar.php";
?>
<?php
if (!isset($_GET['startTest'])) {
    ?>
    <div class="container">
        <div class="row text-center">
            <div class="jumbotron">
                <h1 class="display-4"><?php echo $subjects[0]['subject'] ?> Test</h1>
                <hr class="my-4">
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-4 offset-4">
                <table class="table text-center table-striped">
                    <tr>
                        <th>Total Questions</th>
                        <td>5</td>
                    </tr>
                    <tr>
                        <th>Correct Award</th>
                        <td>1</td>
                    </tr>
                    <tr>
                        <th>Wrong Award</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <?php
                        if (sizeof($allQuestions) < 5) {
                            ?>
                            <td class="text-danger"><b>Have less than 5 questions <br>for this subject</b></td>
                            <?php
                        } else {
                            ?>
                            <td><a class="btn btn-success"
                                   href="startTest.php?startTest=true&subjectId=<?php echo $subjectId ?>">Start</a></td>
                            <?php
                        }
                        ?>
                        <td><a class="btn btn-danger" href="index.php">Back</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <!--<script type="text/javascript">
        window.onbeforeunload = function() {
            return "Dude, are you sure you want to leave? Think of the kittens!";
        }
    </script>-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <?php
                $sr = 0;
                foreach ($fiveRandQuestions as $question) {
                $sr++;
                ?>
                <form action="../model/formRequests.php" method="post">
                    <div style="margin-top: 25px">
                        <input type="text" value="<?php echo $subjectId?>" readonly hidden
                               name="subject_id">
                        <table class="table table-striped questions">
                            <tr>
                                <th colspan="5">Question <?php echo $sr ?>
                                    : <?php echo $question['question_statement'] ?>
                                    <input type="text" value="<?php echo $question['question_id']?>" readonly hidden
                                    name="question_<?php echo $sr ?>_id">
                                </th>
                            </tr>
                            <tr>
                                <td style="width: 10px">
                                    <input type="radio" name="given_answer<?php echo $sr ?>" value="option 1"></td>
                                <th><?php echo $question['option_a'] ?></th>
                            </tr>
                            <tr>
                                <td><input type="radio" name="given_answer<?php echo $sr ?>" value="option 2"></td>
                                <th><?php echo $question['option_b'] ?></th>
                            </tr>
                            <tr>
                                <td><input type="radio" name="given_answer<?php echo $sr ?>" value="option 3"></td>
                                <th><?php echo $question['option_c'] ?></th>
                            </tr>
                            <tr>
                                <td><input type="radio" name="given_answer<?php echo $sr ?>" value="option 4"></td>
                                <th><?php echo $question['option_d'] ?></th>
                            </tr>
                        </table>
                    </div>
                    <?php
                    }
                    ?>

                    <input type="submit" class="btn btn-info" value="submit" name="btn_submit_quiz" style="margin-bottom: 30px">
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>
</body>
</html>
