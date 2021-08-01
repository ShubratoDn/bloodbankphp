<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Donor</title>

    <!-- vendor style -->
    <!-- normalize -->
    <link rel="stylesheet" href="vendor/css/normalize.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fredoka+One&family=Open+Sans&family=Tourney:wght@200&display=swap" rel="stylesheet">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/css/font-awesome.min.css">
    
    <!--animated headline css -->
    <link rel="stylesheet" href="vendor/css/animateHeader.css">

    <!-- data-aos -->
    <link rel="stylesheet" href="vendor/css/aos.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="vendor/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/css/owl.theme.default.css">

    <!-- custom style -->
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/responsive.css">
    <link rel="stylesheet" href="resources/css/nav,title.css">
    <link rel="stylesheet" href="resources/css/all-donor.css">
</head>
<body>
    <!-- header starts -->
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="index.php" class="nav-logo col-lg-5">
                    <img src="resources/img/logo.png" alt="logo" class="logo">
                    <div class="logo-text">
                        Blood Bank
                    </div>
                </a>
            </div>
        </nav>

        <!-- title -->
        <section id="header-path">
            <div class="container py-4">
                <div class="row">
                    <div class="col-12">
                        <p class=" text-white"><a href="index.php" class="text-white-50">Home</a> <span class=" text-red"> / </span> All Donor</p>
                    </div>
                </div>
                <h1 class=" text-white page-descrip">All Donors List : </h1>
            </div>
        </section>
    </header>
    <!--header  ends  -->

    <!-- main section stars -->
    <main>
        <section id="all-donor">
            <div class="container">
                <h2 class="my-5 div-title"><span class=" title-style">Filter Donor List by Blood Group :</span></h2>
                <div class="row">
                    <div class="col-6">
                        <div class="filter-buttons">
                            <button class=" filter-btn" data-filter="all">All Donor</button>
                            <button class=" filter-btn" data-filter=".eli">Eligible</button>
                            <button class=" filter-btn" data-filter=".neli">Non-eligible</button>
                            <button class=" filter-btn" data-filter=".Ap">A+</button>
                            <button class=" filter-btn" data-filter=".An">A-</button>
                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="filter-buttons">

                            <button class=" filter-btn" data-filter=".Bp">B+</button>
                            <button class=" filter-btn" data-filter=".Bn">B-</button>
                            <button class=" filter-btn" data-filter=".ABp">AB+</button>
                            <button class=" filter-btn" data-filter=".ABn">AB-</button>
                            <button class=" filter-btn" data-filter=".Op">O+</button>
                            <button class=" filter-btn" data-filter=".On">O-</button>
                        </div>
                    </div>
                </div>

                <!-- filtering all donors -->
                <div class="row filter-mixitup">

                    <!-- PHP CODES -->
                    <?php

                        include("database/dbconnection.php");

                        $sql = "SELECT * FROM donor_info WHERE user_type='donor'";
                        $result = mysqli_query($con, $sql);

                        if(mysqli_num_rows($result)>0){
                            
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['donation_eligibility'] == "eligible"){
                                $filter_donation_status = "eli";
                            }else{
                                $filter_donation_status = "neli";
                            }
                    ?> 
                        <div class="mix <?php echo $row['filter_bg_class']." $filter_donation_status"?> col-6 col-sm-4 col-lg-3 py-5">
                            <div class="card jumbotron p-0 <?php echo $row['donation_eligibility']?>">
                                <img src="<?php echo $row['photo'] ?>" alt="Donor" class="card-img">
                                <div class="card-blood-group"><?php echo $row['blood_group']?></div>
                                <div class="card-text">
                                    <h3 class=" text-dark font-weight-bold"><?php echo $row['fname']." ".$row['lname']?></h3>
                                    <h4><b>Blood Group :</b> <span class=" text-red font-weight-bold"><?php echo $row['blood_group']?></span></h4>
                                    <br>
                                    <h4><b>Last donate :</b> <?php echo $row['last_donate']?></h4>
                                    <h4><b>Address :</b><?php echo $row['upazila'].", ".$row['district']?></h4>
                                    <h4><b>Contact :</b> <a href="tel: <?php echo $row['phone1']?>" class="card-phone"><?php echo $row['phone1']?></a> <h4>
                                    <small><a href="profile/view_profile.php?id=<?php echo $row['id']?>" class=" card-link">View profile <i class=" fa fa-angle-double-right text-red card-link-icon"></i></a></small>
                                </div>
                            </div>
                        </div>
                    <?php
                            }//ending while loop
                        }//ending first if 
                    ?>
                </div>
            </div>
        </section>
    </main>
    <!-- main section Ends -->


    <?php
        // footer
        include("partial-template/_footer.php");

    ?>




    <!-- javascript -->
    <script src="vendor/js/jquery.min.js"></script>
    <script src="vendor/js/popper.min.js"></script>
    <script src="vendor/js/html5shiv.min.js"></script>
    <script src="vendor/js/respond.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <!-- animated headline js-->
    <script src="vendor/js/animateHeader.js"></script>
    <!-- data-aos-->
    <script src="vendor/js/aos.js"></script>
    <!-- owl carousel -->
    <script src="vendor/js/owl.carousel.min.js"></script>
    <!-- mixitup plugin for filter -->
    <script src="vendor/js/mixitup.min.js"></script>


    <!-- custom js -->
    <script src="resources/js/main.js"></script>
</body>
</html>