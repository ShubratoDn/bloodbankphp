<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Reasult</title>
    
    <?php
        include("head.php");
    ?>
</head>
<body>

    <!-- header starts -->
    <header>

    <?php
        // including empty nav
        include("partial-template/_emptynav.php");
    ?>
        <!-- title -->
        <section id="header-path">
            <div class="container py-4">
                <div class="row">
                    <div class="col-12">
                        <p class=" text-white"><a href="index.php" class="text-white-50">Home</a> <span class=" text-red"> / </span> Needs Blood</p>
                    </div>
                </div>
                <h1 class=" text-white page-descrip">Search Result : </h1>
            </div>
        </section>
    </header>
    <!--header  ends  -->

    <main>
        <div class="container">
            <div class="row filter-mixitup">

                <!-- PHP CODES -->
                <?php
                    error_reporting(0);

                    $blood_group = $_GET['bg'];
                    $district = $_GET['district'];
                    $upazila = $_GET['upazila'];


                    include("database/dbconnection.php");

                    $sql = "SELECT * FROM donor_info WHERE blood_group= '$blood_group' AND district='$district' AND upazila='$upazila'";
                    $result = mysqli_query($con, $sql);

                    if(mysqli_num_rows($result)>0){
                        
                    while($row = mysqli_fetch_assoc($result)){
                ?> 
                    <div class="mix <?php echo $row['filter_bg_class']?> eli col-6 col-sm-4 col-lg-3 py-5">
                        <div class="card jumbotron p-0 <?php echo $row['donation_eligibility']?>">
                            <img src="<?php echo $row['photo']?>" alt="Donor" class="card-img">
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
                    }else{
                        echo '
                            <h1 class=" w-100 font-weight-bold text-center my-5 py-5 text-red fa-3x">No Result Found</h1>
                        ';
                    }
                ?>
            </div>
        </div>
    </main>

    <!-- including footer -->
    <?php
        include("partial-template/_footer.php");
    ?>
    
    <!-- javascript -->
    <script src="vendor/js/jquery.min.js"></script>
    <script src="vendor/js/popper.min.js"></script>
    <script src="vendor/js/html5shiv.min.js"></script>
    <script src="vendor/js/respond.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    
    <!-- mixitup plugin for filter -->
    <script src="vendor/js/mixitup.min.js"></script>


    <!-- custom js -->
    <script src="resources/js/main.js"></script>

</body>
</html>