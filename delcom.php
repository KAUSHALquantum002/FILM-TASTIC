<?php
include 'connect.php';
if(isset($_GET['delcomid'])){
    $ID = $_GET['delcomid'];
    $sqldel = "delete from `comments` where ID = '$ID'";
    $delResult2 = mysqli_query($con,$sqldel);
    if($delResult2){
        header('location: '. $_SERVER['HTTP_REFERER']);
    }
    else{
        die(mysqli_error($con));

}

}
?>