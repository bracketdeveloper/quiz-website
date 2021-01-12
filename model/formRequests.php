<?php
include "functions.php";
include "db.php";
session_start();
if (isset($_POST['btn_register_user'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlCheckExistingUser = "Select * from `users` WHERE `username` = '$username'";
    $checkExistingUserResult = mysqli_query($conn, $sqlCheckExistingUser);
    if (mysqli_num_rows($checkExistingUserResult) > 0) {
        $_SESSION['existing_username'] = $username;
        header("Location: ../view/register.php?error=exists");
    } else {
        $sql = "INSERT INTO `users`(`name`, `username`, `password`) 
    VALUES 
    ('$name', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../view/login.php?success=login");
        } else {
            header("Location: ../view/register.php?error=error");
        }
    }

}

if (isset($_POST['btn_login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlLoginUser = "Select * from `users` WHERE `username` = '$username' AND `password` = '$password'";
    $checkLoginUserResult = mysqli_query($conn, $sqlLoginUser);
    if (mysqli_num_rows($checkLoginUserResult) > 0) {
        $row = mysqli_fetch_array($checkLoginUserResult, MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['password'] = $row['password'];
        header("Location: ../view/index.php");
    } else {
        header("Location: ../view/login.php?error=invalid");

    }
}

if (isset($_POST['btn_login_admin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqlLoginAdmin = "Select * from `admin` WHERE `username` = '$username' AND `password` = '$password'";
    $checkLoginAdminResult = mysqli_query($conn, $sqlLoginAdmin);
    if (mysqli_num_rows($checkLoginAdminResult) > 0) {
        $row = mysqli_fetch_array($checkLoginAdminResult, MYSQLI_ASSOC);
        $_SESSION['admin_username'] = $row['username'];
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_password'] = $row['password'];
        header("Location: ../view/admin/index.php");
    } else {
        header("Location: ../view/admin/login.php?error=invalid");

    }
}

if (isset($_POST['btn_add_subject'])) {
    $subject = $_POST['subject'];

    $sqlCheckExistingSubject = "Select * from `subjects` WHERE `subject` = '$subject'";
    $checkExistingSubjectResult = mysqli_query($conn, $sqlCheckExistingSubject);
    if (mysqli_num_rows($checkExistingSubjectResult) > 0) {
        $_SESSION['existing_subject'] = $subject;
        header("Location: ../view/admin/index.php?page=addSubject&error=exists");
    } else {
        $sql = "INSERT INTO `subjects`( `subject`) 
    VALUES 
    ('$subject')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../view/admin/index.php?page=subjectList&success=subjectAdd");
        }
    }

}

if (isset($_POST['btn_add_question'])) {
    $subjectId = $_POST['subject_id'];
    $questionStatement = $_POST['question_statement'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer = $_POST['answer'];

    $sql = "INSERT INTO `questions`(`subject_id`, `question_statement`, `option_a`, `option_b`, `option_c`, 
                        `option_d`, `answer`) 
    VALUES 
    ('$subjectId', '$questionStatement', '$option1', '$option2', '$option3', '$option4', '$answer')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../view/admin/index.php?page=questionList&success=questionAdd");
    }else{
       echo $conn ->error;
    }

}

if (isset($_POST['btn_submit_quiz'])) {
    $subjectId = $_POST['subject_id'];
    $userId = $_SESSION['user_id'];
    $questionIDs = array();
    $questionIDs[] = $_POST['question_1_id'];
    $questionIDs[] = $_POST['question_2_id'];
    $questionIDs[] = $_POST['question_3_id'];
    $questionIDs[] = $_POST['question_4_id'];
    $questionIDs[] = $_POST['question_5_id'];

    $questionGivenAnswers = array();
    $questionGivenAnswers[] = $_POST['given_answer1'];
    $questionGivenAnswers[] = $_POST['given_answer2'];
    $questionGivenAnswers[] = $_POST['given_answer3'];
    $questionGivenAnswers[] = $_POST['given_answer4'];
    $questionGivenAnswers[] = $_POST['given_answer5'];

    $questionRightAnswers = array();
    for ($i = 0; $i < 5; $i++) {
        $questionRightAnswers[] = getSpecificQuestionById($questionIDs[$i])[0]['answer'];
    }

    $obtainMarks = 0;

    for ($i = 0; $i < 5; $i++) {
        if ($questionGivenAnswers[$i] == $questionRightAnswers[$i]) {
            $obtainMarks++;
        }
    }


        $sql = "INSERT INTO `quizes`(`subject_id`, `obtain_marks`, `user_id`)
    VALUES
    ('$subjectId', '$obtainMarks', '$userId')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../view/result.php?subjectId=$subjectId");
        }

}

