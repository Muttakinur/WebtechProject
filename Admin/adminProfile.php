<?php
session_start();
error_reporting(0);
include('includes/dbConnection.php');
$adminID = $_SESSION['adminID'];
if (strlen($_SESSION['adminID'] == 0)) {
	header('location:../logout.php');
} else {
	if (isset($_POST['submit'])) {
		$Name = $_POST['Name'];
		$UserEmail = $_POST['email'];
		$Blood = $_POST['Blood'];
		$Phone = $_POST['contactNumber'];
		$Address = $_POST['Address'];
		
	
		// $ret = mysqli_query($con, "select UserEmail from users where UserEmail='$UserEmail' || Phone='$Phone'");
		// $result = mysqli_fetch_array($ret);
		// if ($result > 0) {
		// 	echo "<script>alert('This email or Contact Number already associated with another account!.');</script>";
		// } else {
			$query = mysqli_query($con, "update users set Name ='$Name',UserEmail ='$UserEmail', Blood='$Blood',Phone ='$Phone',Address ='$Address' where UserID='$adminID'");
			if ($query) {
				$msg = "Admin profile has been updated.";
			} else {
				$msg = "Something Went Wrong. Please try again.";
			}
		}
	
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>DAS | Admin Profile</title>
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
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <?php include_once('includes/sidebar.php'); ?>
        <?php include_once('includes/header.php'); ?>
        <div id="page-wrapper">
            <div class="main-page">
                <div class="forms">
                    <h3 class="title1">Admin Profile</h3>
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">

                        <div class="form-body">
                            <form method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
																								echo $msg;
																							}  ?> </p>
                                <?php
									$ret = mysqli_query($con, "select * from users where UserID='$adminID'");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {
									?>
                                <div class="form-group"> <label for="exampleInputEmail1">Name</label> <input type="text"
                                        class="form-control" id="Name" name="Name" placeholder=" Name"
                                        value="<?php echo $row['Name']; ?>"> </div>
                                <div class="form-group"> <label for="exampleInputPassword1">Email address</label> <input
                                        type="email" id="email" name="email" class="form-control"
                                        value="<?php echo $row['UserEmail']; ?>" readonly='true'> </div>
                                <div class="form-group"> <label for="exampleInputPassword1">Blood</label> <input
                                        type="text" id="Blood" name="Blood" class="form-control"
                                        value="<?php echo $row['Blood']; ?>"> </div>
                                <div class="form-group"> <label for="exampleInputPassword1">Address</label> <input
                                        type="text" id="Address" name="Address" class="form-control"
                                        value="<?php echo $row['Address']; ?>"> </div>
                                <div class="form-group"> <label for="exampleInputPassword1">Mobile Number</label> <input
                                        type="tel" id="contactNumber" name="contactNumber" class="form-control"
                                        value="<?php echo $row['Phone']; ?>" readonly='true'> </div>

                                <!-- <div class="form-group"> <label for="exampleInputPassword1">Image</label> <img
                                        src="images/<?php echo $row['picture'] ?>" width="220">
                                    <a href="update-image.php?adminID=<?php echo $row['UserID']; ?>">Update Image</a>
                                </div> -->
                                <button type="submit" name="submit" class="btn btn-default">Update</button>
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