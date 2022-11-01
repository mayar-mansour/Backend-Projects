<?php


// if ($_SERVER["REQUEST_METHOD"] === "POST"){
// echo $_POST['username'];
// echo"<br>";
// echo $_POST['language'];
// }
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST['language'] == 'arabic') {
        echo "redirect to arabic supourt system";
        header("location: ar.php");
    }
    elseif($_POST['language'] == 'English'){
        echo "redirect to english supourt system";
        header("location: eng.php");   
    }
    else{
        header("location: main.php");   
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="username" id="">
        <select name="language" id="">
            <option value="arabic">Arabic</option>
            <option value="English">English</option>
            <option value="French">French</option>
        </select>
        <input type="submit" value="Go">
    </form>


</body>

</html>