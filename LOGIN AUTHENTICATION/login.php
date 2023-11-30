<?php
    $login = false;
    $showerror = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/database.php';
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "Select * from `user_form`.`login_data` where username = '$username' AND password='$password'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $username;
            header("location: index.php");
        }
        else{
            $showerror = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form/sumit/kumar/.1.3.4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="main">
    <form action="login.php" method="post" >
        <h3>login form</h3>
        <input type="text" name="username" required placeholder="enter your username">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p>dont' have an acount ? <a href="signin.php">register here</a></p>
    </form>
    <?php
        if($login == true){
            echo '<div id = mani>Succesfully login</div>';
            $login = false;
        }
        if($showerror == true){
            echo '<div id = mani>Password Or Username Are Incorrect Try Again?</div>';
            $showerror = false;
        }
        ?>
    </div>
</body>
</html>