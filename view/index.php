<?php
session_start();
include "../model/functions.php";

?>

<?php
$allSubjects = getAllSubjects();
$bgColorArray = array("l-bg-blue-dark", "l-bg-cherry", "l-bg-cyan", "l-bg-green", "l-bg-green-dark", "l-bg-orange", "l-bg-orange-dark");
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
            <h1 class="display-4">Welcome To Mian Quiz APP</h1>
            <hr class="my-4">
            <?php
            if(!(isset($_SESSION['username']))){
                ?>
                <p class="lead text-center">
                    <a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a>
                    <a class="btn btn-success btn-lg" href="register.php" role="button">Register</a>
                    <a class="btn btn-danger btn-lg" href="admin/" role="button">Admin</a>
                </p>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
if((isset($_SESSION['username']))){
    ?>
    <div class="container">
        <div class="col-md-12">
            <div class="row ">
                <?php
                $bgColorIndex = 0;
                foreach ($allSubjects as $subject) {
                    ?>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card <?php echo $bgColorArray[$bgColorIndex % 7]?>">
                            <div class="card-statistic-3 p-4">
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-6">
                                        <h5 class="card-title mb-0"><?php echo $subject['subject']?></h5>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a class="btn btn-dark text-white" href="startTest.php?subjectId=<?php echo $subject['subject_id']?>">Start Test</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $bgColorIndex++;
                }
                ?>
            </div>
        </div>

    </div>
    <?php
}
?>
</body>
</html>
