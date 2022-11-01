<!-- //connect to database -->
<?php
include 'connect.php';

$target_dir = "image/";
$uploadOk = 1;

// $validation 
$validation = true;
// define variables and set to empty values
$nameErr = $phoneErr = $imageErr = "";
 $name= $phone =  $image = "";
 $try = [$name ,$phone, $image] = "";

 //name required
if (($_SERVER["REQUEST_METHOD"] == "POST")) {
  // echo"test";
  // print_r($name);
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $validation = false;

  } else {
    $name =($_POST["name"]);
     //   // check if title name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  

 //name required

  // echo"test";
  // print_r($name);
  if (empty($_POST["phone"])) {
    $phoneErr = "phone is required";
    $validation = false;
  } else {
    $phone = ($_POST["phone"]);
  }
  
     //  phone number didgit should me 12 number
    if ((strlen($phone) < 11 || strlen($phone) > 11)) {
      $phoneErr = "phone number digit should be 12 number";
      // echo"testPhoneNumber";
    }
  

//image required 

  if (empty($_POST["image"])) {
    $imageErr = "Image is required";
   
    } 
    else{
      $_FILES["image1"]["name"];
    }


//returned function
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//  to update new data

if(($validation == true )
  && (!empty($_FILES["image1"]["name"]))){
  
  // print_r($_FILES["image1"]);
  $imageFileExt = pathinfo($_FILES["image1"]['name'],PATHINFO_EXTENSION);

  $new_file_name = time().'.'.$imageFileExt;
    $target_file = dirname(__FILE__) . '/' . $target_dir. $new_file_name ;    //basename($_FILES["fileToUpload"]["name"]);
    
    // print_r($target_file);
    // exit;
    $check = getimagesize($_FILES["image1"]["tmp_name"]);
   
       // Check if $uploadOk is set to 0 by an error
       if ($uploadOk == 0) {
           echo "Sorry, your file was not uploaded.";
       // if everything is ok, try to upload file
       } else {
           if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
               echo "The file ". basename( $_FILES["image1"]["name"]). " has been uploaded.";
           } else {
               echo "Sorry, there was an error uploading your file.";
           }
       }
    $name = $_POST['name'];
    $phone= $_POST['phone']; 
    $image = $new_file_name ;
    
    $sql = "insert into `creators`(name,phone,image)
     values('$name',' $phone','$image')" ;
     $result = mysqli_query($connect, $sql);
     if( $result ){
// echo"data inserted";
// when adding new data send me to the display page 
header('location:display2.php');
     }
     else{
        die(mysqli_error($connect));
     }
}
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .error{
      color: red;
    }
  </style>  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Insert new author</title>
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
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
    <label for="name">Author Name</label>
    <input type='text' id="name" class="form-control" name="name" placeholder="Writer name" autocomplete="none"  value="<?php echo $name;?>">
    <span class="error"> <?php echo $nameErr;?></span>
  </div>
  <div class="form-group">
    <label>Phone Number</label>
    <input type="text" class="form-control" name="phone" placeholder="phone Number"  autocomplete="none" value="<?php echo $phone;?>">
    <span class="error"> <?php echo $phoneErr;?></span>
  </div>

  <div class="form-group">
  <label>Author Image</label>
  <input type="file" class="custom-file-input" id="customFile" name="image1" autocomplete="none" value="<?php echo $image;?>">
  <label class="custom-file-label" for="customFile">Choose file</label>
  <span class="error"> <?php echo $imageErr;?></span>
  </div>
 
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>       
    </div>     
</body>
</html>