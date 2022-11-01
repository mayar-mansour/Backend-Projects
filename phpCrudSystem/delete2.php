<?php
include 'connect.php';
//retrive data from the url using   delete.php?deleteid = '.$id.'
// echo"data deleted";
if(isset($_GET['id'])){
    //get the id from the url and store this value in variable named id 

    $id =$_GET['id'];
    $sql3 = "select * from `creators`where id=$id";
    $result3=mysqli_query($connect,$sql3);
    if ($result3){
    while($row = mysqli_fetch_assoc($result3)){
        $img=$row['image'];
    }
    unlink("image/".$img);
}
    $sql2="delete from `creators` where id=$id";
    
    $result2=mysqli_query($connect,$sql2);
    if( $result2 ){
        echo"data deleted";
        // when adding new data send me to the display page 
    header('location:display2.php');


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