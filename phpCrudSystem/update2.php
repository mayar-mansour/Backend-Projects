<!-- //connect to database -->
<?php
include 'connect.php';
$id = $_GET['id'];
$sql2 = "select * from `creators` where id=$id";
$result2 = mysqli_query($connect, $sql2);
//to display the data
if ($result2) {
  while ($row = mysqli_fetch_assoc($result2)) {

    $id = $row['id'];
    $old_image = $row['image'];
    $name = $row['name'];
    $phone = $row['phone'];
  }
}
$target_dir = "image/";
$uploadOk = 1;
if (isset($_POST['submit'])) {

  $image = $old_image;
  $name = $_POST['name'];
  $phone = $_POST['phone'];

  if (!empty($_FILES["image1"]["name"])) {

    print_r($_FILES["image1"]);
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

    unlink("image/" . $old_image);
  }



  $sql2 = "update `creators`set id='$id' ,image='$image' ,
    name='$name' , phone='$phone'where id=$id";
  $result2 = mysqli_query($connect, $sql2);
  if ($result2) {
    // echo"data inserted";
    // when adding new data send me to the display page 
    header('location:display2.php');
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
  <title>Update Authors Data</title>
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
        <label>Author Name</label>
        <input type='text' class="form-control" name="name" placeholder="Title name" autocomplete="none" value="<?php echo $name; ?>">
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="form-control" name="phone" placeholder="Creator Name" autocomplete="none" value="<?php echo $phone; ?>">
      </div>

      <div class="form-group">
        <label>Author Image</label>

        <div style="display: flex;">
          <img class="image" src="image/<?php echo $old_image; ?>" alt="<?php echo $old_image; ?>">
          <div style="margin-top: 1% ;padding-left:1%;">
            <input type="file" class="custom-file-input" id="customFile" name="image1" autocomplete="none">
            <!-- <img class="image" src="<?php echo $image; ?>" alt=""> -->
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>