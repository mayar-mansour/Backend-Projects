
<!-- //connect page -->
<?php
//data source name the host and the database

$connect = new mysqli('localhost' ,'root' ,'','authors');
//start new connection with pdo with dsn and users and password
 // try //catch
if($connect){
    // // echo "you are connected";

}
else{

 die(mysqli_error($connect));
}
?>

