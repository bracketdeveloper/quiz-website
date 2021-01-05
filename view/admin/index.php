<?php
include "../../model/functions.php";
session_start();
if (!(isset($_SESSION['admin_username']))) {
    header("Location: login.php");
}
$page = "home";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    echo "<script>
                alert('Error occur');
                window.location.href = 'index.php?page=home'
              </script>";
}
?>

<?php
$allSubject = getAllSubjects();
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin</title>
        <link rel="stylesheet" href="css/bootstrap.min.js.css">
        <script src="js/bootstrap.bundle.min.js"></script>
        <style>
            .form-group {
                margin-top: 20px
            }
        </style>
    </head>
    <body>
    <?php
    include "../../common/admin-top-bar.php";
    ?>
    <?php
    if ($page == "home") {
        ?>
        <div class="container">
            <div class="row">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome To Admin Dashboard</h1>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <?php
    } elseif ($page == "addSubject") {
        ?>
        <div class="container text-center">
            <div class="offset-md-3 col-lg-6">
                <h1>Add Subject Form</h1>
                <form action="../../model/formRequests.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="uname" placeholder="Enter Subject" name="subject"
                               required>

                    </div>

                    <div>
                        <input style="margin-top: 20px" type="submit" class="btn btn-primary" value="Submit"
                               name="btn_add_subject">

                    </div>
                </form>
            </div>
        </div>
        <?php
    } elseif ($page == "subjectList") {
        ?>
        <h1>Subject List</h1>
        <?php
    }
    ?>
    </body>
    </html>
<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];

    if ($error == 'exists') {
        $existingSubject = $_SESSION['existing_subject'];
        echo "<script>
                alert('Subject \'$existingSubject\' already exist');
                window.location.href = 'index.php?page=addSubject'
              </script>";
    }
}

if (isset($_GET['success'])) {
    $success = $_GET['success'];

    if ($success == 'subjectAdd') {
        echo "<script>
                alert('Subject is added successfully');
                window.location.href = 'index.php?page=subjectList'
              </script>";
    }
}
?>