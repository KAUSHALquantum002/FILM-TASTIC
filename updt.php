<?php

include 'connect.php';
$id = $_GET['infoid'];
$sql="select * from `movie` where id=$id";
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($result);
$name=$row['name'];
$description=$row['description'];
$imdb=$row['imdb'];
$genre=$row['genre'];
// $poster=$row['poster'];

// $filename = $_FILES["postr"]["name"];
//   $tempname = $_FILES["postr"]["tmp_name"];
//   $folder = "newData/".$filename;
// print_r($_FILES["postr"]);
//   move_uploaded_file($tempname,$folder);

if(isset($_POST['submitbtn'])){
  $name = $_POST['name'];
  $description = $_POST['desc'];
  $imdb = $_POST['imdb'];
  $genre = $_POST['gen'];
//   $poster = $_POST['postr'];
//   $filename = $_FILES["postr"]["name"];
//   $tempname = $_FILES["postr"]["tmp_name"];
//   $folder = "newData/".$filename;
  // print_r($_FILES["postr"]);
//   move_uploaded_file($tempname,$folder);

  $sql = "update `movie` set 
    id=$id,
    name='$name',
    description='$description',
    imdb=$imdb,
    genre='$genre'
    where id=$id";

    
    $result = mysqli_query($con,$sql);
    if($result){
        // echo " DATA inserted successfully ";
        header('location:display.php');
    }
    else{       
        die(mysqli_error($con));
    }
}

?>

<?php
// $bgurl = "$poster";
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Tilt+Prism&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_update.css">
</head>

<style>
    .bg{
        background-image: url(<?=$bgurl?>);
        background-position: absolute;
        background-size: 100%;
        height:1000px;
        
    }
</style>

<body>

    <div id="SLIDE_BG">
    <!-- my is margin y -->
    <h1 class="heading">Update Page</h1>
    <div class="container">
        
        <form method="POST">
            <div class="form-group">
                <label>NEW NAME:</label>
                <input type="text"
                class="form-control"
                name="name"
                placeholder="Enter name"
                value=
                "<?php
                echo $name
                ?>"
                >
            </div>
            <div class="form-group">
                <label>NEW DESCRIPTION:</label>
                <input type="text"
                class="form-control"
                name="desc"
                placeholder="Enter Description"
                value=
                "<?php
                echo $description
                ?>"
                >
            </div>
            <div class="form-group">
                <label>NEW IMDB:</label>
                <input type="float"
                class="form-control"
                name="imdb"
                placeholder="IMDB rating"
                value=
                "<?php
                echo $imdb
                ?>"
                >
            </div>
            <div class="form-group">
                <label>NEW GENRE:</label>
                <input type="text"
                class="form-control"
                name="gen" 
                placeholder="Enter Genre"
                value=
                "<?php
                echo $genre
                ?>"
                >
            </div>
            <div class="form-group">
                <!-- <label>Poster</label> -->
                <!-- <input type="file" 
                class="form-control" 
                name="postr" 
                placeholder="Enter image poster"
                value =
                <?php 
                // echo $poster 
                ?>
                > -->
            </div>
            <?php
            echo
            '
            <button type="submit" class="Done_btn" name="submitbtn"><a class = "text-ligh">Done</a></button>
            <button type="cancel" class="Cancel_btn" name="cancelbtn"><a href = "info.php?infoid='.$id.'" class = "text-ligh">Cancel</a></button>
            '
            ?>



<!-- <button type="submit" class="btn btn-success" name="submitbtn">Done</button> -->
</form>
</div>
   
    </div>
</body>

</html>


