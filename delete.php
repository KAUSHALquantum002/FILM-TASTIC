<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "delete from `movie` where id = $id";
    $delResult = mysqli_query($con,$sql);
    if($delResult){
        // echo "deleted successfully";
        header('location:display.php');
    }
    else{
        die(mysqli_error($con));
    }

}
?>