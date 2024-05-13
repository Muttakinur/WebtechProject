<?php
session_start();
error_reporting(0);
include('includes/dbConnection.php');

if (isset($_POST['login'])) {
    $email = $_POST['UserName'];
    $password = ($_POST['Password']);

    $query = mysqli_query($con, "select * from users where  UserName='$email'  && Password='$password' ");
    $ret = mysqli_fetch_array($query);

    if ($ret > 0) {
        if ($ret['UserTypeID'] == 1) {
            $_SESSION['adminID'] =$ret['UserID'];
			header('Location: Admin/dashboard.php');
        } else if ($ret['UserTypeID'] == 2) {
            
			$_SESSION['customerID'] =$ret['UserID'];
			header('Location: Customer/customerHome.php');
        }
    } else {
        echo "<script>alert('Invalid Details. ');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include_once('includes/header.php'); ?>
    <div class="login-container">
        <div class="col-md-6">
            <h1 class="title ">Please Login</h1>
            <?php
        if (isset($_GET['error'])) {
            echo "<div class='alert alert-danger'>Invalid email or password!</div> ";
        }
        ?>
            <form method="POST">
                <input name="UserName" type="text" class="input" placeholder="username" required />
                <input name="Password" type="password" class="input" placeholder="Password" required>
                <button type="submit" class="submit-btn" name="login">Login</button>
                <div class="text-center" style="color: red; font-size: 2rem;">Don't have an account? <a
                        style="color: green;" href="registration.php"> Registration here</a></div>
            </form>
        </div>
        <div class="col-md-6">
            <img class="w-100" src="./assets/Images/reg.png" alt="" />
        </div>
    </div>
    <?php include_once('includes/footer.php'); ?>
</body>

</html>