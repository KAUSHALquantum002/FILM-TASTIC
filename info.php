<?php
include 'connect.php';
$id=$_GET['infoid'];
$sql="select * from movie where id=$id";
$result = mysqli_query($con,$sql);

$prewData = mysqli_fetch_assoc($result);
$name=$prewData['name'];
$description=$prewData['description'];
$imdb=$prewData['imdb'];
$genre=$prewData['genre'];
$poster=$prewData['poster'];

?>


<?php


if(isset($_POST['addbtn'])){
    // $movname = $_POST['movname'];
    $username = $_POST['username'];
    $comment = $_POST['comment'];
  
    $sql1 = "insert into `comments` (movname,username,comment) 
          values('$name','$username','$comment')";
      
      $result1 = mysqli_query($con,$sql1);
      if($result1){
        //   echo " DATA inserted successfully ";
          header('location:');
      }
      else{       
          die(mysqli_error($con));
      }
  }
?>


<!-- create link for the background -->
<?php
// echo $bgurl = "$poster";
$bgurl = "$poster";
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Tilt+Prism&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="infostyle.css">
    <!-- <title>Hello, world!</title> -->
</head>

<style>
    .bacK{
        background-image: url(<?=$bgurl?>);       
        filter: brightness(20%);
        /* size: 100%; */
        height: 300px;
        width: 100;
    }

</style>

<!-- <body background="Images/1457553.jpg"> -->
<body>
<div id="SLIDE_BG">
    <div class = bg>
    <?php 
    // echo ' <img src="'.$poster.'">' 
    ?>
    <!-- my is margin y -->
    <!-- <h2>hi</h2> -->
    <img id="movpic" src="<?=$bgurl?>">
    <!-- <div class = "back"></div> -->
    <div class="container">
    <?php
        $sql = "select * from `movie`";
        $result = mysqli_query($con,$sql);
        // if($result){
            // while($row = mysqli_fetch_assoc($result)){
                // $id=$row['id'];
                // $name=$row['name'];
            //     $description=$row['description'];
            //     $imdb=$row['imdb'];
            //     $genre=$row['genre'];
            //     $poster=$row['poster'];
            // }
        // }
    ?>
        <form method="POST">
            <div class="bgblur">
            <div class="form-group">
                <!-- <label>NAME :</label> -->
                <p type="text" 
                class="form-control1" 
                name="name" 
                placeholder="Enter name"
                 >
                <?php echo $name ?>
                </p>
<!-- this is used to fill the already values value =<php echo $name ?>>  -->
                
            </div>
            <div class="form-group">
                <label>DESCRIPTION :</label>
                <p style="color:rgba(255, 255, 255, 1.5);" type="text"
                 class="form-control2" 
                 name="desc" 
                 placeholder="Enter Description"
                 value = 
                 >
                 " <?php echo $description ?> "
                </p>
            </div>
            <div class="form-group">
                <label>IMDB :</label>
                <p type="float" 
                class="form-control3" 
                name="imdb" 
                placeholder="IMDB rating"
                value =
                >
                <?php echo $imdb ?>
                </p>
            </div>
            <div class="form-group">
                <label>GENRE :</label>
                <p type="text" 
                class="form-control4" 
                name="gen" 
                placeholder="Enter Genre"
                value = 
                >
                <?php echo $genre ?>
                </p>
            </div>
            <div class="form-group">
                <div class = "img_bg">
                <!-- <label>Poster</label> -->
                <!-- <p type="text" 
                class="form-control" 
                name="postr" 
                placeholder="Enter image poster"
                value = 
                > -->
                <?php 
                // echo' <img src="'.$poster.'" height="100px" width="100px"> '
                ?>
                </p>
                </div>
            </div>
            <br><br><br>
                <?php
                echo
                '
            <button class = "btn btn-primary" name="updatebtn"><a href = "updt.php?infoid='.$id.'" class = "text-light">Update</a></button>
            <button type="cancel" class="btn btn-danger" name="cancelbtn"><a href = "display.php" class = "text-light">Cancel</a></button>
                '
                ?>
            </form>
    </div>

            <form method = "POST" enctype="multipart/form-data"> 
                <div class="form-group">
                    <label>username</label>
                    <input type="text"
                    class="form-control" 
                    name="username" 
                    placeholder="Enter username"
                   
                    >
                </div>
                
                <div class="form-group">
                    <label>comment</label>
                    <input type="text"
                    class="form-control" 
                    name="comment" 
                    placeholder="Enter comment"
                   
                    >
                </div>
                <input type="submit" class="btn btn-success" name="addbtn"></input>
                
            </form>

            <table class="table">
            <thead>
                <tr>
                    <!-- <th scope="col">id</th> -->
                    <th scope="col">USERNAME</th>
                    <!-- <th scope="col">description</th> -->
                    <!-- <th scope="col">IMDB</th> -->
                    <!-- <th scope="col">genre</th> -->
                    <th scope="col">COMMENT</th>
                </tr>
            </thead>

            <tbody>

                <?php
        $sql3 = "select * from `comments` where movname='$name'";
        $result3 = mysqli_query($con,$sql3);
        if($result3){
            while($row3 = mysqli_fetch_assoc($result3)){
                $ID = $row3['ID'];
                $username=$row3['username'];
                $comment=$row3['comment'];
                echo '<tr>
                <td class = "inftxt1"><a class = "text-ligh">'.$username.'</a></td>
                <td class = "inftxt2"><a class = "text-ligh">'.$comment.'</a></td>
                <td>
                <button id="comdelbtn" name = "comdelbtn"><a href = "delcom.php?delcomid='.$ID.'" class = "text-ligh"><img src="./Images/delete.png" alt="buttonpng" height ="30px" width = "30px" /></a></button>
                </td>
              </tr>';
            }
        }
        
    ?>


            </tbody>
        </table>
    </div>
    </div>
</div>
    

</body>

</html>