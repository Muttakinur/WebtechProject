<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
$adminID = $_SESSION['adminID'];
if (strlen($_SESSION['adminID'] == 0)) {
	header('location:../logout.php');
} else {
	if (isset($_POST['submit'])) {
		$currentPassword = $_POST['currentPassword'];
		$newPassword = $_POST['newPassword'];
		$query = mysqli_query($con, "select * from users where UserID='$adminID' and Password='$currentPassword'");
		$row = mysqli_fetch_array($query);
		if ($row > 0) {
			$ret = mysqli_query($con, "update users set Password='$newPassword' where UserID='$adminID'");
			$msg = "Your password successfully changed";
		} else {
			$msg = "Your current password is wrong";
		}
	}


?>
<!DOCTYPE HTML>
<html>

<head>
    <title>DAS|| Change Password</title>
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
        rel='stylesheet' type='text/css'>
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <script type="text/javascript">
    function CheckPass() {
        if (document.changePassword.newPassword.value != document.changePassword.confirmPassword.value) {
            alert('New Password and Confirm Password field does not match');
            document.changePassword.confirmPassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <?php include_once('includes/sidebar.php'); ?>
        <?php include_once('includes/header.php'); ?>
        <div id="page-wrapper">
            <div class="main-page">
                <div class="forms">
                    <h3 class="title1">Change Password</h3>
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Reset Your Password :</h4>
                        </div>
                        <div class="form-body">
                            <form method="post" name="changePassword" onsubmit="return CheckPass();" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
																								echo $msg;
																							}  ?> </p>
                                <?php
									$adminID = $_SESSION['adminID'];
									$ret = mysqli_query($con, "select * from users where UserID='$adminID'");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {
									?>
                                <div class="form-group"> <label for="exampleInputEmail1">Current Password</label> <input
                                        type="password" name="currentPassword" class="form-control" required="true">
                                </div>
                                <div class="form-group"> <label for="exampleInputPassword1">New Password</label> <input
                                        type="password" name="newPassword" class="form-control" required="true"> </div>
                                <div class="form-group"> <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" name="confirmPassword" class="form-control" required="true">
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Change</button>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php include_once('includes/footer.php'); ?>
        </div>
        <script src="js/classie.js"></script>
        <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;
        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };

        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
        </script>
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/bootstrap.js"> </script>
</body>

</html>
<?php } ?>