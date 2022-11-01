<!-- //connect to database -->
<?php

include 'connect.php';



$id = $_GET['id'];
$sql2 = "select * from `articles` where id=$id";
$result2 = mysqli_query($connect, $sql2);
// $name =$row['creator_id']; 

//to display the data

if ($result2) {
  while ($row = mysqli_fetch_assoc($result2)) {
    $id = $row['id'];
    $old_image = $row['image'];
    $title = $row['title'];
    $date = $row['creation_date'];
    $creator_id = $row['creator_id'];
    $content = $row['content'];


    $sql3= "select * from `creators` where id=" . $creator_id;
    $result3 = mysqli_query($connect, $sql3);

    if ($result3) {
      $row1 = mysqli_fetch_assoc($result3);

      $id_creator = $row1['id'];
      $creator_name = $row1['name'];
    }
  }
}
$target_dir = "uploads/";
$uploadOk = 1;
//  to update new data
if (isset($_POST['submit'])) {


  $title = $_POST['title'];
  $creator_id = $_POST['creator_id'];
  $content = $_POST['content'];
  $date = $_POST['date'];
  $image = $old_image;


  

  if (!empty($_FILES["image1"]["name"])) {
    //print_r($_FILES["image1"]);
    $imageFileExt = pathinfo($_FILES["image1"]['name'], PATHINFO_EXTENSION);

    $new_file_name = time() . '.' . $imageFileExt;
    $target_file = dirname(__FILE__) . '/' . $target_dir . $new_file_name;    //basename($_FILES["fileToUpload"]["name"]);

    // print_r($target_file);
    // exit;
    $check = getimagesize($_FILES["image1"]["tmp_name"]);

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["image1"]["name"]) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $image = $new_file_name;

    unlink("uploads/" . $old_image);
  }

  $sql = "update `articles`set id='$id' ,
    creator_id='$creator_id' ,title='$title' ,content='$content'
     , creation_date='$date', image='$image' where id=$id";
  $result = mysqli_query($connect, $sql);
  if ($result) {
    // echo"data inserted";
    // when adding new data send me to the display page 
    header('location:display.php');
  } else {
    die(mysqli_error($connect));
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Articles details</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="style2.css">
  <style>
    .image {
      width: 5%;
      border-radius: 50%;
      padding: 0%;
      margin: 0%;
      height: 8vh;
    }

    .image img {
      width: 100%;
      height: 100%;
    }
  </style>
  <title>CRUD</title>
</head>

<body>
  <div class="container" style="margin: 5%;">
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Article Title</label>
        <input type='text' class="form-control" name="title" placeholder="Title name" autocomplete="none" value="<?php echo $title; ?>">
      </div>
      <div class="form-group">
        <label>Creator</label>
        <!-- <input type="name" class="form-control" name="name" placeholder="Creator Name"  autocomplete="none" value=""> -->
        <!-- <input type="name" class="form-control" name="name" placeholder="Creator Name"  autocomplete="none"> -->
        <select class="form-control" name="creator_id" id="test" placeholder="Writer Name" autocomplete="none">
          <option selected="false" disabled="disabled">Choose Tagging</option>
          <?php
          // use a while loop to fetch data
          // from the $all_categories variable
          // and individually display as an option
          include 'connect.php';
          // //retreive data from mysql database
          $sql2 = "select * from `creators` ";
          $result2 = mysqli_query($connect, $sql2);
          while ($list_names = mysqli_fetch_array(
            $result2
          )) :;
          ?>
            <option value="<?php echo $list_names["id"] ?>">
              <?php echo $list_names["id"], $list_names["name"];
             
              // To show the category name to the user
              ?>
            </option>
          <?php
          endwhile;
          // While loop must be terminated
          ?>
        </select>
      </div>
      <div class="form-group" enctype="multipart/form-data">
        <label>content</label>
        <input type="text" class="form-control input-lg " style="height:fit-content;" name="content" autocomplete="none" value="<?php echo $content; ?>">
      </div>
      <div class="form-group">
        <label>Date of Creation</label>
        <input type="datetime-local" class="form-control" name="date" autocomplete="none" value="<?php echo $date; ?>">
      </div>
      <div class="form-group">
        <label>Article Image</label>

        <div style="display: flex;">
          <img class="image" src="uploads/<?php echo $old_image; ?>" alt="<?php echo $old_image; ?>">
          <div style="margin-top: 1% ;padding-left:1%;">
            <input type="file" class="custom-file-input" id="customFile" name="image1" autocomplete="none">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-danger " name="submit">Update</button>
    </form>
  </div>
</body>

</html>