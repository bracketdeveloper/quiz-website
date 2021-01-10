<?php
function getAllSubjects()
{
    include "db.php";
    $query = "SELECT * FROM `subjects` ORDER BY `subject_id` DESC ";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getAllQuestions()
{
    include "db.php";
    $query = "SELECT * FROM `questions` ORDER BY `question_id` DESC ";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getSpecificSubject ($subjectId){
    include "db.php";
    $query = "SELECT * FROM `subjects` WHERE  `subject_id` = '$subjectId'";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getAllUsers()
{
    include "db.php";
    $query = "SELECT * FROM `users` ORDER BY `user_id` DESC ";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getSpecificUserById($userId)
{
    include "db.php";
    $query = "SELECT * FROM `users` WHERE `user_id` = '$userId' ";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getSubjectQuestions ($subjectId){
    include "db.php";
    $query = "SELECT * FROM `questions` WHERE  `subject_id` = '$subjectId'";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getSubjectRandomFiveQuestions ($subjectId){
    include "db.php";
    $query = "SELECT * FROM `questions` WHERE  `subject_id` = '$subjectId' ORDER BY  RAND() LIMIT 5";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getSpecificQuestionById($questionId){
    include "db.php";
    $query = "SELECT * FROM `questions` WHERE  `question_id` = '$questionId'";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getSpecificQuizResultBySubject($subjectId){
    include "db.php";
    $userId = $_SESSION['user_id'];
    $query = "SELECT * FROM `quizes` WHERE  `subject_id` = '$subjectId' AND `user_id` = '$userId'
    ORDER BY `quiz_id` DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getSpecificQuizResultByUserId($userId){
    include "db.php";
    $query = "SELECT * FROM `quizes` WHERE  `user_id` = '$userId'
    ORDER BY `time` DESC";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}

function getAllQuizzes(){
    include "db.php";
    $query = "SELECT * FROM `quizes`
    ORDER BY `time` DESC";
    $result = mysqli_query($conn, $query);
    echo mysqli_error($conn);
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        {
            $data[] = $row;
        }
    }
    return $data;
}