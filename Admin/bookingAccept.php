<?php
session_start();
error_reporting(0);
include('includes/dbConnection.php');
if (strlen($_SESSION['adminID'] == 0)) {
	header('location:../logout.php');
} else {

	if ($_GET['delID']) {
		$dID = $_GET['delID'];
		mysqli_query($con, "delete from enquiry where ID ='$dID'");
		echo "<script>alert('Data Deleted');</script>";
		echo "<script>window.location.href='enquiry-unread.php'</script>";
	}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title> Accept Booking</title>
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
                <div class="tables">
                    <h3 class="title1">Manage Accept Appointment</h3>
                    <div class="table-responsive bs-example widget-shadow">
                        <h4>View Booking:</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr style="vertical-align: middle; text-align: center;">
                                    <th style="vertical-align: middle; text-align: center;">#</th>
                                    <th style="vertical-align: middle; text-align: center;">Booking Number</th>
                                    <th style="vertical-align: middle; text-align: center;">User Name</th>
                                    <th style="vertical-align: middle; text-align: center;">Booking Date</th>
                                    <th style="vertical-align: middle; text-align: center;">Booking category</th>
                                    <!-- <th style="vertical-align: middle; text-align: center;">Doctor Name</th> -->

                                    <th style="vertical-align: middle; text-align: center;">Price</th>
                                    <th style="vertical-align: middle; text-align: center;">Booking Status</th>
                                    <th style="vertical-align: middle; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $query = mysqli_query($con, "select * from weddingbook where Status='Accept'");
                                $cnt = 1;
                            while ($row = mysqli_fetch_array($query)) { 
                                $CategoriesID = $row['CategoriesID'];
                                $UserID = $row['UserID'];
                        ?>
                                <tr style="vertical-align: middle; text-align: center;">
                                    <td><?php echo $cnt; ?></td>
                                    <td>
                                        <?php echo $row['BookNumber']; ?>
                                    </td>
                                    <td>
                                        <?php
                                               $query3 = mysqli_query($con, "SELECT * FROM users where UserID=  $UserID");
                                                while ($row3 = mysqli_fetch_array($query3)) { ?>
                                        <p> <?php echo $row3['Name'] ?> </p>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php echo $row['BookDate']; ?>
                                    </td>

                                    <?php
                                                $query2 = mysqli_query($con, "SELECT * FROM categories where CategoriesID=  $CategoriesID");
                                                while ($row2 = mysqli_fetch_array($query2)) { ?>

                                    <td>
                                        <p> <?php echo $row2['CategoriesType'] ?> </p>
                                    </td>
                                    <td>
                                        <p> <?php echo $row2['Price'] ?> </p>
                                    </td>
                                    <?php } ?>
                                    <td><?php $status = $row['Status'];
                                                if ($status == '') {
                                                    echo "Waiting for confirmation";
                                                } else {
                                                    echo $status;
                                                }
                                                ?> </td>
                                    <td>
                                        <a href="bookingDetail.php?BookID=<?php echo $row['BookID']; ?>"
                                            class="btn btn-primary">View</a>

                                    </td>
                                </tr><?php $cnt = $cnt + 1;
                                            } ?>
                            </tbody>

                        </table>
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
<?php }  ?>