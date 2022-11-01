<?php
$username = "mayar";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables | <?php echo $username?> </title>
</head>
<body>
    <div>Welcome <?php echo $username?></div>
    <div>try <?php echo $username?> </div>
    <?php
    // go get any data from another page 
    include("var_include.php");
    ?>
</body>
</html>