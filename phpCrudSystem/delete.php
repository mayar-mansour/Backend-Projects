<?php
include 'connect.php';
//retrive data from the url using   delete.php?deleteid = '.$id.'
// echo"data deleted";
// $id=$_GET['id'];
if(isset($_GET['id'])){
    //get the id from the url and store this value in variable named id 
    $id =$_GET['id'];
    // print_r($id);
    $sql2 = "select * from `articles`";
    $result2=mysqli_query($connect,$sql2);
    if ($result2){
    while($row = mysqli_fetch_assoc($result2)){
        $img=$row['image'];
    }
    unlink("uploads/".$img);
}
    $sql="delete from `articles` where id=$id";
    $result=mysqli_query($connect,$sql);
    if($result){
    
        echo"data deleted";
        // when adding new data send me to the display page 
    header('location:display.php');
             }
             else{
                die(mysqli_error($connect));
                echo"erohvbjnkm";
             }
        
}
else{
    echo"erohvbjnkm";
}
?>