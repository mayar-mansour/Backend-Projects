<?php
//data source name the host and the database
$dsn = 'mysql:host=localhost;dbname=mayar';
//the connected users
$user = 'root';
$password = '';
//OPTIONS OF PDO WHAT TO DO while connect ,update any change or delete
$options = array( //key = pdo 
    //write arabic langauage 
PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
);
//start new connection with pdo with dsn and users and password
 // try //catch
try{
//connection
$connect = new PDO($dsn ,$user ,$password,$options);
//setAttribute() class of pdo
$connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
// echo "you are connected";
//querry code
//insert data into table 
$querry = "CREATE TABLE items(
    id int not null,
    price decimal(65,2),
  client_id int NOT null,
      PRIMARY KEY( id)
     
      
  )ENGINE = INNODB;
    ";
$connect->exec($querry);
}
catch(PDOException $e){
echo"failed" .$e->getMessage();
}

?>