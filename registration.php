<?php
include('includes/dbConnection.php');
error_reporting(0);
$name = "";
$errors = array();
if (isset($_POST['submit'])) {
    $UserName = $_POST['UserName'];
    $UserEmail = $_POST['UserEmail'];
    $Password = $_POST['Password'];
    $Name = $_POST['Name'];
    $Blood = $_POST['Blood'];
    $Gender = $_POST['Gender'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $UserTypeID=2;
    
    $ret = mysqli_query($con, "select UserName from users where UserName= '$UserName' || UserEmail='$UserEmail' || Phone='$Phone'");
    $result = mysqli_fetch_array($ret);
    if ($result > 0) {
        echo "<script>alert('This UserName or email or Contact Number already associated with another account!.');</script>";
    } else {
        $query = mysqli_query($con, "INSERT INTO `users` ( `UserName`, `UserEmail`, `Password`, `Name`, `Gender`, `Blood`, `Phone`, `Address`,UserTypeID ) VALUES ('" . $UserName . "','" . $UserEmail . "','" . $Password . "','" . $Name . " ','" . $Gender . "','" . $Blood . "','" . $Phone . "','" . $Address .  "','" . $UserTypeID . "')");
        if ($query) {
            echo "<script>alert('You have successfully registered.');</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php include_once('includes/header.php'); ?>
    <section class="contact" id="contact">
        <h1> </h1>
        <h1 class="heading"> <span>Sign Up</span> </h1>
        <form method="post" name="dataValid" onsubmit="return validateForm()">
            <!-- <form action="post"> -->
            <div class="inputBox">
                <input type="text" placeholder="name" name="Name" required="required">
                <input type="text" placeholder="UserName" name="UserName" required="required" autofocus="">
            </div>
            <div class="inputBox">
                <input type="email" placeholder="Email Address" name="UserEmail" required="required">
                <input type="number" placeholder="Phone Number" name="Phone" required="required">
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Password" name="Password" required="required">
                <input type="password" placeholder="ConfirmPassword" name="ConfirmPassword" required="required">
            </div>
            <div class="inputBox">
                <select id="Gender" name="Gender" required>
                    <option value="">Select your Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <select id="Blood" name="Blood" required>
                    <option value="">Select your blood group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="inputBox">
                <input type="text" placeholder="your address" name="Address" required="required">

            </div>
            <button type="submit" name="submit" class="btn ">Sign Up</button>
            <h3 style="color: red; padding-top: 2rem;">Already have an account? <a style="color: green;"
                    href="login.php">Login
                    here</a></>
        </form>
    </section>





    </div>
    <?php include_once('includes/footer.php'); ?>
    <script>
    function validateForm() {
        var Password = document.forms["dataValid"]["Password"].value;
        var ConfirmPassword = document.forms["dataValid"]["ConfirmPassword"].value;
        if (Password != ConfirmPassword) {
            alert("Password do not match");
            return false;
        }
    }
    </script>
</body>

</html>