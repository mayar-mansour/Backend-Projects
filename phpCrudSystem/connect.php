
<!-- //connect page -->
<?php
//data source name the host and the database

$connect = new mysqli('localhost' ,'root' ,'','php_crud');
//start new connection with pdo with dsn and users and password
 // try //catch
if($connect){
    // echo "you are connected";
//     $sql2 = "ALTER TABLE articles
//     ADD CONSTRAINT fk_crs_name FOREIGN KEY(creator_id) REFERENCES creators(id);";
//     $result2 = mysqli_query($connect, $sql2);
//  // echo "you are connected";
}
else{

 die(mysqli_error($connect));
}
// if ($result2) {
 
//     echo "you are connected";
//   } else {
//     die(mysqli_error($connect));
//   }
// ?>

