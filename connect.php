<?php

$con = new mysqli('localhost','root','','crud');

if(!$con){
    // echo " NOT connection successfull";
    die(mysqli_error($con));
}



?>