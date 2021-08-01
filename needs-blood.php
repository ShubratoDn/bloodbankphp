<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Blood</title>

    <?php
        include("head.php");
    ?>

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
                        <p class=" text-white"><a href="index.php" class="text-white-50">Home</a> <span class=" text-red"> / </span> Needs Blood</p>
                    </div>
                </div>
                <h1 class=" text-white page-descrip">They Need Blood : </h1>
            </div>
        </section>
    </header>
    <!--header  ends  -->

    <!-- main section stars -->
    <main>
        <section id="all-blood-seeker">
            <div class="container">
                <h2 class="my-5 div-title"><span class=" title-style text-capitalize">Filter who need blood by Blood Group :</span></h2>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="filter-buttons">
                            <button class=" filter-btn" data-filter="all">All</button>
                            <button class=" filter-btn" data-filter=".Ap">A+</button>
                            <button class=" filter-btn" data-filter=".An">A-</button>
                            <button class=" filter-btn" data-filter=".Bp">B+</button>
                            <button class=" filter-btn" data-filter=".Bn">B-</button>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="filter-buttons">
                            <button class=" filter-btn" data-filter=".ABp">AB+</button>
                            <button class=" filter-btn" data-filter=".ABn">AB-</button>
                            <button class=" filter-btn" data-filter=".Op">O+</button>
                            <button class=" filter-btn" data-filter=".On">O-</button>
                        </div>
                    </div>
                </div>

                <!-- filtering all donors -->
                <div class="row filter-mixitup">

                    <?php
                        include("database/dbconnection.php");

                        $sql = "SELECT * FROM `need_blood` ";
                        $result =  mysqli_query($con, $sql);

                        if(mysqli_num_rows($result)>0){

                            while($row = mysqli_fetch_assoc($result)){

                    ?>
                    <div class="mix <?php echo $row['filter_bg_class'] ?> col-6 col-sm-4 col-lg-3 py-5">
                        <div class="bs-card m-2">
                            <div class="post-time px-3 py-2">
                                <h4>Posted 
                                    <?php
                                                        
                                        // Return current date 
                                        date_default_timezone_set("Asia/Dhaka");
                                        $current_date = date_create(date('Y-m-d H:i:s'));                               
                                        $current_timestamp = date_timestamp_get($current_date);

                                        $db_date = date_create($row['time_stamp']); // getting row creates time
                                        $db_timestamp = date_timestamp_get($db_date); //converting data into timestamp

                                        $difference = $current_timestamp - $db_timestamp;

                                        $min = round($difference / 60);    
                                        $hour = round($min/60);

                                        if($hour > 0){
                                            $postTime = "$hour hour";
                                        }else{
                                            $postTime = "$min min";
                                        }
                                        
                                        echo "$postTime";

                                    ?> 
                                    ago
                                </h4>
                            </div>
                            <div class="bs-card-blood-group"><?php echo $row['blood_group']?></div>
                            <img src="resources/img/blood-drop.png" alt="" class="card-img bs-img">
                            <div class="bs-card-text">
                                <h3 class=" font-weight-bold"><?php echo $row['full_name']?></h3>
                                <h4><b> I need <span class=" text-red font-weight-bold"> <?php echo $row['blood_group']?> </span> Blood within 
                                    <span class=" text-red"> <?php echo $row['time']?></span> </b></h4>
                                <br>
                                <h4><b>Quantity : </b> <?php echo $row['quantity']?> bags</h4>
                                <h4><b>Hospital : </b><?php echo $row['Hospital']?></h4>
                                <h4><b>Contact : </b> <a href="tel: <?php echo $row['phone']?>" class="card-phone"><?php echo $row['phone']?></a> <h4>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                            }//ending while
                        }//ending if
                    ?>

                </div>

                
            </div>
        </section>
    </main>
    <!-- main section Ends -->


    <?php
        include('partial-template/_footer.php');
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

    <script>
        var mixer = mixitup('.filter-mixitup');
    </script>
</body>
</html>