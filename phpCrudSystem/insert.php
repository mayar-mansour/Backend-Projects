<!-- //connect to database -->
<?php
include 'connect.php';
$target_dir = "uploads/";
$uploadOk = 1;
//returned function


$validation = true;
// define variables and set to empty values
$titleErr = $nameErr = $contentErr = $dateErr = $imageErr = "";
$title = $name = $content = $date = $image = "";
//Title required
if (($_SERVER["REQUEST_METHOD"] == "POST")) {

  if (empty($_POST["title"])) {
    $titleErr = "Title is required";
    $validation = false;
  } else {
    $title = $_POST["title"];
  
    //   // check if title name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $title)) {
      $titleErr = "Only letters and white space allowed";
    }
  }


  //validation for content required only

  if (empty($_POST["content"])) {
    $contentErr = "content is required";
    $validation = false;
  } else {
    $content = ($_POST["content"]);
   
  }


  if (empty($_POST["date"])) {
    $dateErr = "date is required";
    $validation = false;
  } else {
    $date = ($_POST["date"]);
  
  }

  //image required 

  if (empty($_POST["image"])) {
    $imageErr = "Image is required";
    // $validation = false;
  } else {
    $_FILES["fileToUpload"]["name"];
   
  };
  
  //name required 

  if (empty($_POST["creator_id"])) {
    $nameErr = "Name is required";
    $validation = false;
  } else {
    $name = ($_POST["creator_id"]);
  }

  //returned function
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  if(
    !empty($_FILES["fileToUpload"]["name"])
     && $validation == true
     ){
    $imageFileExt = pathinfo($_FILES["fileToUpload"]['name'], PATHINFO_EXTENSION);

    $new_file_name = time() . '.' . $imageFileExt;
    $target_file = dirname(__FILE__) . '/' . $target_dir . $new_file_name;    //basename($_FILES["fileToUpload"]["name"]);

    // print_r($target_file);
    // exit;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    $title =$_POST['title'];
    $creator_id = $_POST['creator_id'];
    $content= $_POST['content']; 
    $date = $_POST['date'];
    $image = $new_file_name ;


  $sql = "insert into `articles`(title,creator_id,content,creation_date,image)
     values('$title',$creator_id, '$content' ,' $date','$image')";
  $result = mysqli_query($connect, $sql);



  if ($result) {
    // echo"data inserted";
    // when adding new data send me to the display page 
    header('location:display.php');
  } else {
    die(mysqli_error($connect));
  }
  }
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .error {
      color: red;
    }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>insert New Article</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

  <title>CRUD</title>
</head>

<body>

  <div class="container" style="margin: 5%;">
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

      <div class="form-group">
        <label for="title">Article Title</label>
        <input type='text' id="title" class="form-control" name="title" placeholder="Title name" autocomplete="none" value="<?php echo $title; ?>">
        <span class="error"><?php echo $titleErr; ?></span>
      </div>
      <div class="form-group">
        <label for="test">select Creator</label>
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
              <?php echo $list_names["id"] , $list_names["name"];
              // To show the category name to the user
              ?>
            </option>
          <?php
          endwhile;
          // While loop must be terminated
          ?>
        </select>
        <span class="error"><?php echo $nameErr; ?></span>
      </div>
      <div class="form-group">
        <label>content</label>
        <input type="text" class="form-control input-lg " style="width: ;" name="content" autocomplete="none" value="<?php echo $content; ?>">
        <span class="error"><?php echo $contentErr; ?></span>
      </div>
      <div class="form-group">
        <label>Date of Creation</label>
        <input type="datetime-local" class="form-control" name="date" autocomplete="none" value="<?php echo $date; ?>">
        <span class="error"><?php echo $dateErr; ?></span>
      </div>
      <div class="form-group">
        <label>Article Image</label>
        <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" autocomplete="none" value="<?php echo $image; ?>">
        <label class="custom-file-label" for="customFile">Choose file</label>
        <span class="error"><?php echo $imageErr; ?></span>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>