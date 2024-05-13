<?php
session_start();
error_reporting(0);
include('includes/dbConnection.php');
if (strlen($_SESSION['adminID'] == 0)) {
	header('location:../logout.php');
} else {
	if ($_GET['delID']) {
	}
	if (isset($_POST['submit'])) {
		$pid = $_GET['editID'];
		mysqli_query($con, "delete from users where UserID ='$pid'");
		echo "<script>alert('Data Deleted');</script>";
		echo "<script>window.location.href='managePatient.php'</script>";
	}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Edit User</title>
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
                    <h3 class="title1">Update Patient</h3>
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-body">
                            <form method="post">
                                <?php
									$pid = $_GET['editID'];
									$ret = mysqli_query($con, "select * from  users where UserID='$pid'");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {
									?>
                                <div class="form-group"> <label for="exampleInputEmail1">Patient Name</label> <input
                                        type="text" class="form-control" placeholder="Patient Name"
                                        value="<?php echo $row['Name']; ?>" readonly> </div>
                                <div class="form-group"> <label for="exampleInputPassword1">Email</label> <input
                                        type="text" class="form-control" value="<?php echo $row['UserEmail']; ?>"
                                        readonly>
                                </div>
                                <div class="form-group"> <label for="exampleInputPassword1">Mobile</label> <input
                                        type="text" class="form-control" value="<?php echo $row['Phone']; ?>" readonly>
                                </div>
                                <div class="form-group"> <label for="exampleInputPassword1">Blood</label> <input
                                        type="text" class="form-control" value="<?php echo $row['Blood']; ?>" readonly>
                                </div>
                                <div class="form-group"> <label for="exampleInputPassword1"> Address</label>
                                    <input type="text" class="form-control" value="<?php echo $row['Address']; ?>"
                                        readonly>
                                </div>

                                <?php } ?>
                                <br><br>
                                <button type="submit" name="submit" style="background-color: red;"
                                    onClick="return confirm('Are you sure you want to delete?')"
                                    class="btn btn-default">Delete</button>
                            </form>
                        </div>
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