<div class="sticky-header header-section ">
    <div class="header-left">
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
    </div>

    <div class="profile_details">
        <?php
      $adid = $_SESSION['adminID'];
      $ret = mysqli_query($con, "select Name from users where UserID='$adid'");
      $row = mysqli_fetch_array($ret);
      $name = $row['Name'];
      ?>
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <div class="profile_img">
                        <!-- <span class="prfil-img"> <img src="images/<?php echo $row['Image'] ?>" alt="" width="50"
                                height="50"> </span> -->
                        <div class="user-name">
                            <p><?php echo $name; ?></p>
                            <span>Administrator</span>
                        </div>
                        <i class="fa fa-angle-down lnr"></i>
                        <i class="fa fa-angle-up lnr"></i>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul class="dropdown-menu drp-mnu">
                    <li> <a href="changePassword.php"><i class="fa fa-cog"></i> Settings</a> </li>
                    <li> <a href="adminProfile.php"><i class="fa fa-user"></i> Profile</a> </li>
                    <li> <a href="../login.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>