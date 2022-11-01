
<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Display creators </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="style.css"> -->
<title>Display creators names</title>
</head>
<!-- <style>
  .image5{
    width: 20%;
    /* border-radius: 50%; */
    padding: 0%;
    margin: 0%;
    height: 2vh;
}
.image5 img{
    width: 10%;
    height: 10%;
}
</style> -->
<body>
<div class="container my-5">
 <!-- //direct the button to the insert page to add new article -->
 <h3 class="text-success"> Display creators names</h3>
<button class="btn btn-primary my-5 "><a href="insert2.php" class="text-light">New Author</a></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
     
     <img src="" alt=""> <th scope="col">Image</th>
     <th scope="col">Name</th>
      <th scope="col">phone</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    // //retreive data from mysql database
  $sql2 = "select * from `creators` ";
  $result=mysqli_query($connect,$sql2);
  if( $result ){
    //get the data from tha table 
    // so the values here show me tha same names of columns
while($row = mysqli_fetch_assoc($result)){
    $id =$row['id'];
    $image =$row['image'];
    $name=$row['name'];
    $phone =$row['phone'];
 
echo'<tr>
<th scope="row">'.$id.'</th>
<td><img class=image5" src="image/'.$image.'"  style="width: 50%;height:8vh;" alt=""></td>
<td>'.$name.'</td>
<td>'.$phone.'</td>
<td>
<button class="btn btn-success"> <a href="view2.php?id='.$row['id'].'"class="text-light">View</a></button>
    <button class="btn btn-primary "> <a href="update2.php?id='.$row['id'].'"class="text-light" >Edit</a></button>
    <button class="btn btn-danger"> <a href="delete2.php?id='.$row['id'].'" class="text-light delete">Delete</a></button>
  
  </td>
</tr> ';
}
    

}

// delete.php?deleteid = '.$id.' to detete item by the id
  ?>  
  
  </tbody>
</table>
</div>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
</body>
</html>