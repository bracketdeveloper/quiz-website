<?php
$conn=mysqli_connect("localhost","root","","exam");
if(!isset($conn))
{
    echo mysqli_error('DB Not Connected');
    die;
}




