<?php
// print the name and email of the user
// var_dump($_POST);
// echo $_POST['name'] ;//send only the name
// echo '<br>';
// echo $_POST['email'] ;


//check if the user has entered his mail or not 
// isset function is used for check if the variable has a value
// empty fn check if this variable is not empty
if(isset ($_POST['email']) && !empty($_POST['email'])){
echo"your email is :";
echo $_POST ['email'];
echo"<br>";

}
else{
    echo "please enter your email";
}


if(isset ($_POST['name'])&& !empty($_POST['name'])){
    header('location:index.html');
    die();
}
else{
    echo "please enter your name";
}

?>