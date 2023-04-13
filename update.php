<?php
include 'connect.php';
$id=$_GET['infoid'];
$sql="select * from `movie` where id=$id";
$result = mysqli_query($con,$sql);

$prewData = mysqli_fetch_assoc($result);
$name=$prewData['name'];
$description=$prewData['description'];
$imdb=$prewData['imdb'];
$genre=$prewData['genre'];
// $poster=$prewData['poster'];

if(isset($_POST['submitbtn'])){
  $name = $_POST['name'];
  $description = $_POST['desc'];
  $imdb = $_POST['imdb'];
  $genre = $_POST['gen'];
//   $poster = $_POST['postr'];
//   $filename = $_FILES["postr"]["name"];
//   $tempname = $_FILES["postr"]["tmp_name"];
//   $folder = "newData/".$filename;
//   move_uploaded_file($tempname,$folder);

    $sql = "update `movie` set 
    id=$id,
    name='$name',
    description='$description',
    imdb=$imdb,
    genre='$genre' 
    where id=$id";
    //where so that the id matches its prev value
    $result = mysqli_query($con,$sql);
    if($result){
        echo " updated successfully ";
        // header('location:info.php?infoid='.$id.'');
        // header('location:display.php');
    }
    else{       
        die(mysqli_error($con));
    }
}

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- <title>Hello, world!</title> -->
</head>

<body>
    <!-- my is margin y -->
    <div class="container my-5">
        <form method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" 
                class="form-control" 
                name="name" 
                placeholder="Enter name"
                value =<?php echo $name ?>> 
<!-- this is used to fill the already values value =<php echo $name ?>>  -->
                
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text"
                 class="form-control" 
                 name="desc" 
                 placeholder="Enter Description"
                 value =<?php echo $description ?>
                 >
            </div>
            <div class="form-group">
                <label>IMDB</label>
                <input type="float" 
                class="form-control" 
                name="imdb" 
                placeholder="IMDB rating"
                value =<?php echo $imdb ?>>
            </div>
            <div class="form-group">
                <label>Genre</label>
                <input type="text" 
                class="form-control" 
                name="gen" 
                placeholder="Enter Genre"
                value =<?php echo $genre ?>>
            </div>
            <div class="not">
                <!-- <label>Poster</label> -->
                <!-- <input type="file" 
                class="form-control" 
                name="postr" 
                placeholder="Enter image poster">
            </input> -->
            <?php
            echo
            '
            <button type="submit" class="btn btn-success" name="submitbtn"><a class = "text-light">Done</a></button>
            <button type="cancel" class="btn btn-danger" name="cancelbtn"><a href = "info.php?infoid='.$id.'" class = "text-light">Cancel</a></button>
            '
            ?>
        </form>
    </div>

</body>

</html>