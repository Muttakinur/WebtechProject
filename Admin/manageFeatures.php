<?php
session_start();
error_reporting(0);
include('includes/dbConnection.php');
if (strlen($_SESSION['adminID'] == 0)) {
	header('location:../logout.php');
} else {
	if ($_GET['delID']) {
		$did = $_GET['delID'];
		mysqli_query($con, "delete from features where FeaturesID ='$did'");
		echo "<script>alert('Data Deleted');</script>";
		echo "<script>window.location.href='manageFeatures.php'</script>";
	}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title> Manage Features</title>
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
                    <h3 class="title1">Manage Features</h3>
                    <div class="table-responsive bs-example widget-shadow">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Categories Name</th>
                                    <th>Features Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              ;
                                
                           $ret = mysqli_query($con, "  SELECT f.FeaturesID, f.CategoriesID, f.Title, c.CategoriesType FROM features f  JOIN categories c ON f.CategoriesID = c.CategoriesID ORDER BY f.CategoriesID ASC");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $cnt; ?></th>
                                    <td><?php echo $row['CategoriesType']; ?></td>
                                    <td><?php echo $row['Title']; ?></td>

                                    <td>
                                        <a href="editFeatures.php?editID=<?php echo $row['FeaturesID']; ?>"
                                            class="btn btn-primary">Edit</a>
                                        <a href="manageFeatures.php?delID=<?php echo $row['FeaturesID']; ?>"
                                            class="btn btn-danger"
                                            onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
            $cnt = $cnt + 1;
        }
        ?>
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