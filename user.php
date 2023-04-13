<?php

include 'connect.php';
if(isset($_POST['submitbtn'])){
  $name = $_POST['name'];
  $description = $_POST['desc'];
  $imdb = $_POST['imdb'];
  $genre = $_POST['gen'];
  $poster = $_POST['postr'];
  // echo $_FILES["postr"]["name"];
  $filename = $_FILES["postr"]["name"];
  $tempname = $_FILES["postr"]["tmp_name"];
  $folder = "newData/".$filename;
// print_r($_FILES["postr"]);
  move_uploaded_file($tempname,$folder);

  $sql = "insert into `movie` (name,description,imdb,genre,poster) 
        values('$name','$description','$imdb','$genre','$folder')";
    
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


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Tilt+Prism&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="userstyle.css">
    
</head>

<body>
    <!-- my is margin y -->
    <div id = "SLIDE_BG">
    <div class="container">
    <h1 class="heading">ADD MOVIE</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="lbl">Movie Name :</label>
                <input type="text" id = "ftxt" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label class="lbl">Movie Description :</label>
                <input type="text" id = "ftxt" class="form-control" name="desc" placeholder="Enter Description">
            </div>
            <div class="form-group">
                <label class="lbl">IMDB rating :</label>
                <input type="float" id = "ftxt" class="form-control" name="imdb" placeholder="IMDB rating">
            </div>
            <div class="form-group">
                <label class="lbl">Genre :</label>
                <input type="text" id = "ftxt" class="form-control" name="gen" placeholder="Enter Genre">
            </div>
            <div class="form-group">
                <label class="lbl">Movie Poster :</label>
                <input type="file" id = "ftxt" class="form-control" name="postr" placeholder="Enter image poster">
            </div>
                <input type="submit" id = "ftxt" class="subbtn" name="submitbtn"></input>
            </form>
        </div>
        <img src="./Images/Hero_theboys.jpg" class="margin_dene_ka_kaam_kar_de_bhai">    
    </div>
        
    </body>
    
    </html>
    