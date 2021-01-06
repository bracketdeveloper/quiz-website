<?php
include "../../model/db.php";
session_start();
if (!(isset($_SESSION['admin_username']))) {
    header("Location: login.php");
}

if(!(isset($_GET['q']))){
    header("Location: index.php");
}else{
    if($_GET['q'] == 'delSubject'){
        $subjectId = $_GET['subjectId'];
        $query = "DELETE FROM `subjects` WHERE `subject_id` = '$subjectId'";
        if ($conn->query($query) === TRUE) {
            header("Location: index.php?page=subjectList&deleteSuccess=true");
        } else {
            header("Location: index.php?page=subjectList&deleteSuccess=false");
        }
    }
}

