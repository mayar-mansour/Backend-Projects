<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap Simple Data Table</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Display</title>
</head>

<body>
  <div class="container my-5">
    <!-- //direct the button to the insert page to add new article -->
    <!-- <button class="btn btn-primary my-5 "><a href="insert.php" class="text-light">New Article</a></button> -->
    <!-- <div>
  
      <h3>Id</h3>
      <h1>Article Title :</th>
    <h4> Image: <img src=""></img> </h4> 
      <h4>Author name:</h4>
      <h6>Creation Date:</h6> 
      <p>content</p> 
</div>  -->
    <?php
    include 'connect.php';
    $id = $_GET['id'];
    $sql = "select * from `articles` where id=$id";
    $result = mysqli_query($connect, $sql);
    //to display the data

    if ($result) {
      //get the data from tha table 
      // so the values here show me tha same names of columns
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $image = $row['image'];
        $title = $row['title'];
        $date = $row['creation_date'];
        $creator_id = $row['creator_id'];
        $content = $row['content'];

        // $name =$row['creator_id']; 
        $sql2 = "select * from `creators` where id=" . $creator_id;
        $result2 = mysqli_query($connect, $sql2);

        if ($result2) {
          $row = mysqli_fetch_assoc($result2);

          $id_creator = $row['id'];
          $creator_name = $row['name'];


          echo ' 
<div>
  
      <h3 class="text-success">Id : ' . $id . '</h3>
      <h1  class="text-danger">Article Title :' . $title . '</th>
      <h4> Image: <img src="uploads/' . $image . '"></img> </h4> 
      <h4>Author name: ' . $creator_name . '</h4>
      <p> <h6>content: </h6>
      ' . $content . '
      </p> 

      <h7 class="text-muted">Creation Date: ' . $date . '</h7> 
</div>';
        }
      }
    }
