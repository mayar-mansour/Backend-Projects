<?php
include 'connect.php';

$target_dir = "form/";
$uploadOk = 1;

$validation = true;

$nameErr = $emailErr = $passwordErr = $checkErr = $imageErr = $phoneErr = "";
$email = $name = $password = $check = $image = $phone = "";
if (($_SERVER["REQUEST_METHOD"] == "POST")) {

    if (empty($_POST["name"])) {
        $nameErr = "username is required";
        $validation = false;
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $nameErr = "email is required";
        $validation = false;
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
        $validation = false;
    } else {
        $password = $_POST["password"];
    }


    if (empty($_POST["check"])) {
        $checkErr = "rewrite your password here";
        $validation = false;
    } elseif ($_POST["check"] === $_POST["password"]) {

        $check = $_POST["check"];
    } else {
        $checkErr = "Passwords do no match";
        $validation = false;
    }



    if (empty($_POST["phone"])) {
        $phoneErr = "phone is required";
        $validation = false;
    } else {
        $phone = $_POST["phone"];
    }

    if (empty($_POST["image1"])) {
        $imageErr = "image is required";
    } else {
        $_FILES["image1"]["name"];
    }
    //returned function
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    echo "test";
    if (
        !empty($_FILES["image1"]["name"])
        && $validation == true
    ) {

        $imageFileExt = pathinfo($_FILES["image1"]['name'], PATHINFO_EXTENSION);

        $new_file_name = time() . '.' . $imageFileExt;
        $target_file = dirname(__FILE__) . '/' . $target_dir . $new_file_name;
        $check = getimagesize($_FILES["image1"]["tmp_name"]);

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image1"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $image = $new_file_name;


        $sql = "insert into `users`(name,phone,email,password,image)
     values('$name','$phone', '$email' ,' $password','$image')";
        $result = mysqli_query($connect, $sql);



        if ($result) {
            echo "data inserted";
            // when adding new data send me to the display page 
            header('location:login.php');
        } else {
            die(mysqli_error($connect));
        }
    }
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="reg.css">

    <title>Registration</title>
</head>
<style>
    .error {
        color: red;
    }
</style>

<body>
    <div class="wrapper">
        <div class="form-left">
            <h2 class="text-uppercase">Registration Form</h2>
            <p>
                Be a part of our Family
            </p>
            <p class="text">
                <span>Already have account?</span>
                login instead please
            </p>
            <div class="form-field">
                <input type="submit" class="account" value="login" onclick="location.href = 'login.php';">
            </div>
        </div>
        <!-- form  -->
        <form class="form-right" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
            <h2 class="text-uppercase">Registration form</h2>
            <div class="row">
                <div class="mb-4">
                    <label>Full Name</label>
                    <input type="text" name="name" id="first_name" class="input-field" value="<?php echo $name; ?>">
                    <span class="error"><?php echo $nameErr; ?></span>
                </div>

            </div>
            <div class="mb-3">
                <label>Your Email</label>
                <input type="email" class="input-field" name="email" value="<?php echo $email; ?>">
                <span class="error"><?php echo $emailErr; ?></span>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="password" id="pwd" class="input-field" value="<?php echo $password; ?>">
                    <span class="error"><?php echo $passwordErr; ?></span>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Check Password</label>
                    <input type="password" name="check" id="cpwd" class="input-field" value="<?php echo $check; ?>">
                    <span class="error"><?php echo $checkErr; ?></span>
                </div>
            </div>
            <div class="mb-3">
                <label>phone number</label>
                <input type="number" class="input-field" name="phone" value="<?php echo $phone; ?>">
                <span class="error"><?php echo $phoneErr; ?></span>
            </div>
            <div class="form-group">
                <label> Image</label>
                <img class="image" src="form/<?php echo $image; ?>" alt="<?php echo $image; ?>">
                <input type="file" class="custom-file-input" id="customFile" name="image1" autocomplete="none" value="<?php echo $image; ?>">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <span class="error"><?php echo $imageErr; ?></span>
            </div>
            <div class="mb-3">
                <label class="option">I agree to the <a href="https://www.iubenda.com/en/help/2859-terms-and-conditions-when-are-they-needed">Terms and Conditions</a>
                    <input type="checkbox" id="agree">
                    <span class="checkmark"></span>

                </label>
            </div>
            <div class="form-field">
                <input type="submit" value="submit" class="register" name="submit">
            </div>
        </form>
    </div>
</body>