<?php
$target_dir = "uploads/";
$uploadOk = 1;

/*echo $imageFileType."<br/>";*/
// Check if image file is a actual image or fake image
if(isset($_POST['submit'] )|| !empty($_FILES["fileToUpload"]["name"])){
    $target_file =$target_dir.basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   
       // Check if $uploadOk is set to 0 by an error
       if ($uploadOk == 0) {
           echo "Sorry, your file was not uploaded.";
       // if everything is ok, try to upload file
       } else {
           if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
               echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
           } else {
               echo "Sorry, there was an error uploading your file.";
           }
       }
   }
   else{
       echo "Only JPG, JPEG & PNG files are allowed.Not a valid format";
   }
   
   ?>
   