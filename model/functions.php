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