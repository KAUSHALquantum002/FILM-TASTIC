<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Boys</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Tilt+Prism&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="SLIDE_BG">
    <div class="container">
        <h1 class="heading">FILM-TASTIC</h1>
        <button class="add_btn">
            <a href="user.php" class="add_btn_text">ADD MOVIE</a>

        </button>
        <table class="table">
            <thead>
                <tr>
                    <!-- <th scope="col">id</th> -->
                    <!-- <th scope="col">name</th> -->
                    <!-- <th scope="col">description</th> -->
                    <!-- <th scope="col">IMDB</th> -->
                    <!-- <th scope="col">genre</th> -->
                    <!-- <th scope="col">poster</th> -->
                </tr>
            </thead>

            <tbody>
            <br><br><br><br>
                <?php
        $sql = "select * from `movie`";
        $result = mysqli_query($con,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $name=$row['name'];
                $description=$row['description'];
                $imdb=$row['imdb'];
                $genre=$row['genre'];
                $poster=$row['poster'];
                // $updateid='.$id.';
                
                // <th scope="row">'.$id.'</th>
                // <td>'.$description.'</td>
                // <td>'.$genre.'</td>
                
                // <button class = "btn btn-primary"><a href = "update.php?updateid='.$id.'" class = "text-light">Update</a></button>
                echo '<tr>
                <td class="poster_td"><img class="poster" src="'.$poster.'" height="100px" width="100px"></td>
                <td class="text_light_td"><a href = "info.php?infoid='.$id.'" class = "text-light">'.$name.'</a></td>
                <td class="imdb"><div class="imdb_text">IMDB</div><span class="fa fa-star checked"></span> '.$imdb.'</td>
                <td>
                <button class = "delete_btn"><a href = "delete.php?deleteid='.$id.'" class = "delete_btn_text">Delete</a></button>
                </td>
              </tr>';
            }
        }
        
    ?>


            </tbody>
        </table>
    </div>
    <img src="./Images/Hero_theboys.jpg" class="margin_dene_ka_kaam_kar_de_bhai">    
    </div>
</body>

</html>