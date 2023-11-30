<?php
    $err = false;
    include 'partials/database.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["name"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
    if($cpassword == $password){
        $sql = "INSERT INTO `user_form`.`login_data`(`username` ,`password`,`email`) VALUES ('$username','$password','$email')";
        $result = mysqli_query($conn,$sql);
        if ($result){
            $err = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="main">
    <form action="signin.php" method="post" >
        <h3>registration form</h3>
        <input type="text" name="name" required placeholder="enter username">
        <input type="email" name="email" required placeholder="enter your e-mail">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password text number" name="cpassword" required placeholder="confirm your password">
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>already have an acount ? <a href="login.php">login here</a></p>
        <?php
        if($err == true){
            echo '<div id = mani>Succesfully Register</div>';
            $err = false;
        }
        ?>
    </form>
    </div>
    
</body>
</html>