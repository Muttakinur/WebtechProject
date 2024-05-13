<?php
session_start();
error_reporting(0);
include('includes/dbConnection.php');
if (strlen($_SESSION['adminID'] == 0)) {
	header('location:../logout.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>DAS || Admin Dashboard</title>
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
    <script src="js/Chart.js"></script>
    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
    <script src="js/underscore-min.js" type="text/javascript"></script>
    <script src="js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="js/clndr.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <?php include_once('includes/header.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>

        <div id="page-wrapper" class="row calender widget-shadow">
            <div class="main-page">
                <div class="row calender widget-shadow">
                    <div class="row-one">
                        <div class="col-md-4 widget">
                            <?php $query1 = mysqli_query($con, "Select * from users");
							$totalUser = mysqli_num_rows($query1);
							?>
                            <div class="stats-left ">
                                <h5>Total</h5>
                                <h4>Users</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $totalUser; ?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-mdl">
                            <?php $query2 = mysqli_query($con, "Select * from weddingbook  ");
							$totalParlour = mysqli_num_rows($query2);
							?>
                            <div class="stats-left">
                                <h5>Total</h5>
                                <h4>Booking</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $totalParlour; ?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-last">
                            <?php $query3 = mysqli_query($con, "Select * from weddingbook  where Status='Completed'");
							$totalCustomer = mysqli_num_rows($query3);
							?>
                            <div class="stats-left">
                                <h5>Total</h5>
                                <h4>Complete</h4>
                            </div>
                            <div class="stats-right">
                                <label><?php echo $totalCustomer; ?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

            </div>
            <div class="clearfix"> </div>
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