<?php
session_start();
error_reporting(0);
include('includes/dbConnection.php');
$bid = $_GET['BookID'];
if (strlen($_SESSION['adminID'] == 0)) {
	header('location:../logout.php');
} 

elseif(isset($_POST['update']))
	{
        $adminRemark=$_POST['AdminRemark'];
        $Status="Accept";
        $query=mysqli_query($con,"update weddingbook set  Remark='$adminRemark',Status='$Status' where BookID='$bid'");
        if($query){ 
            echo "<script>alert('Admin Remark and  updated successfully.');</script>";
            echo "<script>window.location.href ='bookingDetail.php?BookID=$bid'</script>";
        }
	}
    elseif(isset($_POST['Completed']))
	{
        $Status="Completed";
        $query=mysqli_query($con,"update weddingbook set  Status='$Status' where BookID='$bid'");
        if($query){ 
            echo "<script>alert('Booking Completed  successfully.');</script>";
            echo "<script>window.location.href ='bookingDetail.php?BookID=$bid'</script>";
        }
	}
    elseif(isset($_POST['Cancel']))
	{
        $adminRemark=$_POST['AdminRemark'];
        $Status="Cancel";
        $query=mysqli_query($con,"update weddingbook set  Remark='$adminRemark',Status='$Status' where BookID='$bid'");
        if($query){ 
            echo "<script>alert('Admin Remark and Booking Cancel  successfully.');</script>";
            echo "<script>window.location.href ='bookingDetail.php?BookID=$bid'</script>";
        }
	} 

	else {
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Manage Booking</title>
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
                    <div class="table-responsive bs-example widget-shadow">
                        <?php
							$ret4 = mysqli_query($con, "select * from weddingbook where BookID='$bid'");
							
							while ($row4 = mysqli_fetch_array($ret4)) {
							?>
                        <?php
                        
                        $bid = $_GET['BookID'];
                        $ret = mysqli_query($con, "select * from weddingbook where BookID='$bid'");
                       
                        while ($row = mysqli_fetch_array($ret)) {
                          $BookNumber = $row['BookNumber'];
                          $CategoriesID = $row['CategoriesID'];
                          $UserID = $row['UserID'];
                          $BookDate = $row['BookDate'];
                          $UserMessage = $row['UserMessage'];
                          $Remark = $row['Remark'];
                          $Status = $row['Status'];
                          $Remark = $row['Remark'];
                          $Status = $row['Status'];
                          $BookingDate = $row['BookingDate'];
                          $RemarkDate = $row['RemarkDate'];
        
        
                          $query2 = mysqli_query($con, "SELECT * FROM `users` where UserID=  $UserID");
                          while ($row2 = mysqli_fetch_array($query2)) {
                            $Name = $row2['Name'];
                            $UserEmail = $row2['UserEmail'];
                            $Phone = $row2['Phone'];
                            $Address = $row2['Address'];
                          }
                          $query3 = mysqli_query($con, "SELECT * FROM `categories` where CategoriesID=  $CategoriesID");
                          while ($row3 = mysqli_fetch_array($query3)) {
                            $CategoriesType = $row3['CategoriesType'];
                            $Price = $row3['Price'];
                            
                          }
                ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr style="color: blue;font-size: 30px;text-align: center;">
                                    <td colspan="4">View Appointment</td>
                                </tr>
                                <tr>
                                    <th style="width: 20%;">Book Number</th>
                                    <td style="width: 30%;"><?php echo $BookNumber; ?></td>
                                    <th style="width: 20%;">User Name</th>
                                    <td style="width: 30%;"><?php echo $Name?></td>
                                </tr>
                                <tr>
                                    <th style="width: 20%;">Categories </th>
                                    <td><?php echo $CategoriesType; ?> Plan</td>
                                    <th style="width: 20%;">User Email</th>
                                    <td><?php echo  $UserEmail ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 20%;">Booking Date </th>
                                    <td><?php echo $BookDate; ?> </td>
                                    <th style="width: 20%;">User Phone</th>
                                    <td><?php echo $Phone; ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 20%;">Booking Fee</th>
                                    <td><?php echo $Price; ?> taka</td>
                                    <th style="width: 20%;">User Address </th>
                                    <td><?php echo $Address ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 20%;">Booking Status</th>
                                    <td><?php echo $Status; ?></td>

                                    <th style="width: 20%;">User Message </th>
                                    <td><?php echo $UserMessage ?></td>
                                </tr>


                                <tr>
                                    <th style="width: 20%;">Apply Date</th>
                                    <td><?php echo $row['BookingDate']; ?></td>

                                </tr>

                                <?php if($row['Remark']==""){?>
                                <form name="query" method="post">
                                    <tr>
                                        <th>Admin Remark</th>
                                        <td><textarea name="AdminRemark" class="form-control"
                                                required="true"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary pull-left"
                                                style="margin-right: 15px;" name="update">
                                                Accept <i class="fa fa-arrow-circle-right"></i>
                                            </button>
                                            <button type="submit" class="btn btn-danger pull-left" name="Cancel">
                                                Cancel <i class="fa fa-arrow-circle-right"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                                <?php } else {?>
                                <tr>
                                    <th>Admin Remark</th>
                                    <td><?php echo $row['Remark'];?></td>

                                </tr>
                                <?php }}?>
                            </tbody>
                        </table>
                        <?php if($row['Remark'] !=" "){?>

                        <?php if($Status=="Accept"){?>
                        <form name="query2" method="post">
                            <button type="submit" class="btn btn-danger pull-left" name="Completed">
                                Move to completed <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </form>
                        <?php }}}?>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/footer.php'); ?>
    </div>
    <script src="js/classie.js"></script>
    <script>
    function printTableData() {
        console.log('Printing table data');
        var divToPrint = document.getElementsByClassName('table')[0].outerHTML;
        console.log('Table content:', divToPrint);
        var divToPrint = document.getElementsByClassName('table')[0].outerHTML;
        var newWin = window.open('');
        newWin.document.write('<html><head><title>Print Appointment History</title>');
        newWin.document.write('<style>body { font-family: Arial, sans-serif; line-height: 1.6; }</style>');
        newWin.document.write('</head><body style="padding: 20px;">');
        newWin.document.write(
            '<h3 style="text-align: center; color: blue; margin-bottom: 30px;">Appointment History</h3>');
        newWin.document.write(divToPrint);
        newWin.document.write('</body></html>');
        newWin.print();
        newWin.close();
    }
    </script>
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
<?php  } ?>