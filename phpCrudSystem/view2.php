<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Display Authors details</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
.img{
    width: 40%;
    border-radius: 30%;
}
</style>
<title>Display</title>
</head>
<body>
<div class="container my-5">
 <!-- //direct the button to the insert page to add new creator-->

<?php
include 'connect.php';
$id =$_GET['id'];
$sql2="select * from `creators` where id=$id";
$result2 = mysqli_query($connect,$sql2);
//to display the data

if( $result2 ){
    //get the data from tha table 
    // so the values here show me tha same names of columns
while($row = mysqli_fetch_assoc($result2)){
    $id =$row['id'];
    $image =$row['image'];
    $name =$row['name'];
    $phone =$row['phone'];
echo' 
<div>
  
      <h3 class="text-success">Id : '.$id.'</h3>
      
      <h4> Image: <img  class="img" src="image/' . $image . '"></img> </h4> 
      <h4>Author name: '.$name.'</h4>

      <h7 class="text-muted">Phone number: '.$phone.'</h7> 
</div>';
}
    

}
