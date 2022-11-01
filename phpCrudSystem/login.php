<?php
include 'connect.php';
session_start();
// $sql2 = " SELECT * FROM `users`";
// $sql2 = " SELECT * FROM `users`";
// $username = $_SESSION['name'];
// echo"$username";
if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = "select * from `users` ";
    // // $sql = " SELECT * FROM `users` WHERE  =" .$email;


    $result = mysqli_query($connect, $sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($email == $row['email'] && $password == $row['password']) {
                echo "$username";
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_phone'] = $row['phone'];
                $_SESSION['user_image'] = $row['image'];
                header('location:admin.php');
                
if (!empty($_POST["rememberme"]))
{

    
    setcookie("email", $email, time() +
                        (1 * 365 * 24 * 60 * 60));

    
    setcookie("password", $password, time() +
                        (1 * 365 * 24 * 60 * 60));

    $_SESSION['user_name'] = $username;

}
            }
    else {
        $error = 'incorrect email or password!';
    }
}}
}



?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="login.css">
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                <div class="panel border bg-white">
                    <div class="panel-heading">
                        <h3 class="pt-3 font-weight-bold">Login</h3>
                    </div>
                    <div class="panel-body p-3">
                        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <?php
                           if(isset($error)){
                            
                               echo '<span class="error-msg">'.$error.'</span>';
                            
                        }
                            ?>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <span class="far fa-user p-2"></span>
                                    <input type="text" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="form-group py-1 pb-2">
                                <div class="input-field"> <span class="fas fa-lock px-2"></span>
                                    <input type="password" placeholder="Enter your Password" name="password">
                                </div>
                            </div>
                            <div class="form-inline"> <input type="checkbox" name="remember" id="remember"> <label for="remember" class="text-muted" name="rememberme">Remember me</label> </div>
                            <input type="submit" name="submit" value="login Now" class="btn btn-primary btn-block mt-3">
                            <div class="text-center pt-4 text-muted">Don't have an account? <a href="registration.php">Sign up</a> </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>