<?php
function getAllSubjects()
{
    include "db.php";
    $query = "SELECT * FROM `subjects`";
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