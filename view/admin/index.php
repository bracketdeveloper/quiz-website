<?php
include "../../model/functions.php";
session_start();
if (!(isset($_SESSION['admin_username']))) {
    header("Location: login.php");
}
$page = "home";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
?>

<?php
$allSubjects = getAllSubjects();
$allQuestions = getAllQuestions();
$allUsers = getAllUsers();
$allQuizzes = getAllQuizzes()
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
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 offset-md-3">
                    <h1>Subject List</h1>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sr = 0;
                        foreach ($allSubjects as $subject) {
                            $sr++;
                            ?>
                            <tr>
                                <td scope="row"><?php echo $sr ?></td>
                                <td><?php echo $subject['subject'] ?></td>
                                <td><a href="delete.php?q=delSubject&subjectId=<?php echo $subject['subject_id'] ?>"
                                       class="btn btn-danger" onclick="return confirm('Do you want delete this subject?')">Delete</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <?php
    } elseif ($page == "addQuestion") {
        ?>
        <div class="container text-center">
            <div class="offset-md-3 col-lg-6">
                <h1>Add Question Form</h1>
                <form action="../../model/formRequests.php" method="post">
                    <div class="form-group">
                        <select name="subject_id" required="required" class="form-control">
                            <option disabled selected value="">Select Subject</option>
                            <?php
                                foreach ($allSubjects as $subject) {
                            ?>
                                    <option value="<?php echo $subject['subject_id']?>">
                                        <?php echo $subject['subject']?>
                                    </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Enter question statement" name="question_statement" required rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Option 1" name="option1" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Option 2" name="option2" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Option 3" name="option3" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Option 4" name="option4" required>
                    </div>
                    <div class="form-group">
                        <select name="answer" class="form-control" required="required">
                            <option disabled selected value=""> Select Correct Option</option>
                            <option value="option 1">Option 1</option>
                            <option value="option 2">Option 2</option>
                            <option value="option 3">Option 3</option>
                            <option value="option 4">Option 4</option>
                        </select>
                    </div>
                    <div>
                        <input style="margin-top: 20px" type="submit" class="btn btn-primary" value="Submit"
                               name="btn_add_question">

                    </div>
                </form>
            </div>
        </div>
        <?php
    }elseif ($page == "questionList") {
        ?>
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Question List</h1>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question Statement</th>
                            <th scope="col">Option 1</th>
                            <th scope="col">Option 2</th>
                            <th scope="col">Option 3</th>
                            <th scope="col">Option 4</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sr = 0;
                        foreach ($allQuestions as $question) {
                            $sr++;
                            $subject =  getSpecificSubject($question['subject_id'])
                            ?>
                            <tr>
                                <td scope="row"><?php echo $sr ?></td>
                                <td><?php echo $question['question_statement'] ?></td>
                                <td><?php echo $question['option_a'] ?></td>
                                <td><?php echo $question['option_b'] ?></td>
                                <td><?php echo $question['option_c'] ?></td>
                                <td><?php echo $question['option_d'] ?></td>
                                <td><?php echo $question['answer'] ?></td>
                                <td><?php echo $subject[0]['subject'] ?></td>
                                <td><a href="delete.php?q=delQuestion&questionId=<?php echo $question['question_id'] ?>"
                                       class="btn btn-danger" onclick="return confirm('Do you want to delete this question?')">Delete</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <?php
    }elseif ($page == "usersList") {
        ?>
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-6 offset-3">
                    <h1>Users List</h1>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sr = 0;
                        foreach ($allUsers as $user) {
                            $sr++;
                            ?>
                            <tr>
                                <td scope="row"><?php echo $sr ?></td>
                                <td><?php echo $user['name'] ?></td>
                                <td><?php echo $user['username'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <?php
    }elseif ($page == "quizzesList") {
        ?>
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12 ">
                    <h1>Quizzes List</h1>
                    <div class="row">
                        <div class="col-lg-8 text-center offset-2">
                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Total Marks</th>
                                    <th>Obtain Marks</th>
                                    <th>Percentage</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <?php
                                foreach ($allQuizzes as $quiz) {
                                    $userId = $quiz['user_id'];
                                    $user = getSpecificUserById($userId)[0]['name'];
                                    $subjectId = $quiz['subject_id'];
                                    $subject = getSpecificSubject($subjectId)[0]['subject'];
                                    $obtainMarks = $quiz['obtain_marks'];
                                    $percentageMarks = $obtainMarks / 5 * 100;
                                    $percentageMarks = floor($percentageMarks);
                                    $date = $quiz['time'];
                                    $date = date("d-m-Y H:i:s A", strtotime($date))
                                    ?>
                                    <tr>
                                        <td><?php echo $user?></td>
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

            </div>
        </div>

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

    if ($success == 'questionAdd') {
        echo "<script>
                alert('Question is added successfully');
                window.location.href = 'index.php?page=questionList'
              </script>";
    }


}

if (isset($_GET['deleteSubjectSuccess'])) {
    $deleteSubjectSuccess = $_GET['deleteSubjectSuccess'];

    if ($deleteSubjectSuccess == 'true') {
        echo "<script>
                alert('Subject is deleted successfully');
                window.location.href = 'index.php?page=subjectList'
              </script>";
    }

    if ($deleteSubjectSuccess == 'false') {
        echo "<script>
                alert('Subject cannot be deleted because having questions');
                window.location.href = 'index.php?page=subjectList'
              </script>";
    }
}

if (isset($_GET['deleteQuestionSuccess'])) {
    $deleteQuestionSuccess = $_GET['deleteQuestionSuccess'];

    if ($deleteQuestionSuccess == 'true') {
        echo "<script>
                alert('Question is deleted successfully');
                window.location.href = 'index.php?page=questionList'
              </script>";
    }

    if ($deleteQuestionSuccess == 'false') {
        echo "<script>
                alert('Question cannot be deleted because having questions');
                window.location.href = 'index.php?page=subjectList'
              </script>";
    }
}
?>