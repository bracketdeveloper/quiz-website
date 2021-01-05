<?php
session_start();
if((isset($_SESSION['username']) )){
    header("Location: index.php");
}
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.min.js.css">
        <script src="js/bootstrap.bundle.min.js"></script>
        <title>Register</title>
    </head>
    <style>
        .form-group{
            margin-top: 20px
        }
    </style>
    <body>
    <?php
    include "../common/top-bar.php";
    ?>
    <div class="container text-center">
        <div class="offset-md-3 col-lg-6">
            <h1>Register Form</h1>
            <form action="../model/formRequests.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="uname" placeholder="Enter Name" name="name" required>

                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username"
                           required>

                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password"
                           required>

                </div>
                <div>
                    <input style="margin-top: 20px" type="submit" class="btn btn-primary" value="Submit" name="btn_register_user">

                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];

    if ($error == 'exists') {
        $existingUsername = $_SESSION['existing_username'];
        echo "<script>
                alert('Username \'$existingUsername\' already exist');
                window.location.href = 'register.php'
              </script>";
    }

    if ($error == 'error') {
        echo "<script>
                alert('Some error occur');
                window.location.href = 'register.php'
              </script>";
    }

}
?>