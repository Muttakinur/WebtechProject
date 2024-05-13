<?php
session_start();
error_reporting(0);
include('./includes/dbConnection.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIUB Wedding Planner</title>
    <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css link -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- header section starts -->
    <?php include_once('includes/header.php'); ?>
    <!-- home -->
    <section class="home" id="home">
        <div class="content">
        </div>
    </section>

    <!-- end -->

    <!-- about -->

    <section class="about" id="about">
        <h1 class="heading"> <span>about</span> us</h1>
        <div class="row">
            <div class="content">
                <h3>Our Planners are Most Experience.</h3>
                <p>At AIUB Wedding Planner, we are passionate about creating unforgettable wedding experiences for
                    couples in Bangladesh. With years of experience and a deep understanding of Bangladeshi culture, our
                    dedicated team of wedding planners is committed to bringing your vision to life.</p>
                <p>From personalized planning to attention to detail, we strive to make your wedding day as magical and
                    memorable as you've always dreamed. Let us be a part of your journey and turn your wedding dreams
                    into reality.</p>
                <a href="about.php" class="btn">read more</a>
            </div>
            <div class="image">
                <img src="./assets/Images/aboutUs.jpg" alt="">
            </div>
        </div>
    </section>

    <!-- end -->

    <!-- service -->

    <section class="services" id="services">
        <h1 class="heading">our services</h1>
        <div class="box-container">
            <div class="box">
                <img src="./assets/Images/photography.jpg" alt="">
                <h3>Photography</h3>
                <p>Expert candid and traditional photography teams</p>
            </div>
            <div class="box">
                <img src="./assets/Images/Decoration.jpg" alt="">

                <h3>Decoration</h3>
                <p>Professionally designed decor at attractive prices</p>
            </div>
            <div class="box">
                <img src="./assets/Images/Venue&Hall.jpg" alt="">
                <h3>venue & Hall</h3>
                <p>finding the right place for you</p>
            </div>
        </div>
    </section>


    <section class="plan" id="plan">

        <h1 class="heading"> Catalogue</h1>

        <div class="box-container">
            <?php
                            $ret = mysqli_query($con, "select * from  categories where Status = 'Active'");
                            
                            while ($row = mysqli_fetch_array($ret)) {
                                $CategoriesID = $row['CategoriesID'];
                            ?>
            <div class="box">
                <h3 class="title"><?php echo $row['CategoriesType']; ?></h3>
                <h3 class="price"><?php echo $row['Price']; ?><span>৳</span></h3>
                <?php
                            $ret2 = mysqli_query($con, "select * from  features where CategoriesID =  $CategoriesID ");
                            while ($row2 = mysqli_fetch_array($ret2)) {
                            ?>
                <ul>
                    <li><i class="fas fa-check"></i><?php echo $row2['Title']; ?></li>
                </ul>
                <?php } ?>
                <a href="login.php"><button class="btn">Book now</button></a>
            </div>
            <?php } ?>
        </div>


    </section>
    <!-- plan section ends -->

    <!-- gallery=--->

    <section class="gallery" id="gallery">
        <h1 class="heading"> <span>our</span> Memories</h1>
        <div class="swiper gallery-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="./assets/Images/GALLERY1.jpg" alt=""></div>
                <div class="swiper-slide"><img src="./assets/Images/GALLERY2.jpg" alt=""></div>
                <div class="swiper-slide"><img src="./assets/Images/GALLERY3.jpg" alt=""></div>
                <div class="swiper-slide"><img src="./assets/Images/GALLERY4.jpg" alt=""></div>
                <div class="swiper-slide"><img src="./assets/Images/GALLERY5.jpg" alt=""></div>
                <div class="swiper-slide"><img src="./assets/Images/GALLERY6.jpg" alt=""></div>
                <div class="swiper-slide"><img src="./assets/Images/GALLERY7.jpg" alt=""></div>
                <div class="swiper-slide"><img src="./assets/Images/GALLERY8.jpeg" alt=""></div>
            </div>
        </div>
    </section>



    <!-- team -->

    <section class="team" id="team">
        <h1 class="heading">our CREATIVE team</h1>
        <div class="box-container">
            <div class="box">
                <img src="./assets/Images/profilePic.png" alt="">
                <h3>AIUB AIUB </h3>
                <p>wedding planner</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
            <div class="box">
                <img src="./assets/Images/profilePic.png" alt="">
                <h3>AIUB AIUB</h3>
                <p>wedding planner</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
            <div class="box">
                <img src="./assets/Images/profilePic.png" alt="">
                <h3>AIUB AIUB</h3>
                <p>Photographer</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
            <div class="box">
                <img src="./assets/Images/profilePic.png" alt="">
                <h3>AIUB AIUB</h3>
                <p>Event Manager </p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
    </section>

    <!-- end -->





    <?php include_once('includes/footer.php'); ?>




    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="script.js"></script>

</body>

</html>