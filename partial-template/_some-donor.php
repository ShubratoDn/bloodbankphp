


<!-- Some donors Section starts -->
<section id="donor" class=" d-flex justify-content-center align-items-center">
    <div class="container-md container-fluid">
        <div class="donor">
            <h1 class="title text-center" data-aos="fade-down" data-aos-duration="800">
                <span class="title-style">Some of blood donors</span>
            </h1>

            <!-- some donors -->
            <div class="some-donor owl-carousel owl-theme" data-aos="fade-up" data-aos-duration="800">

                <!-- PHP CODES -->
                <?php

                    include("database/dbconnection.php");

                    $sql = "SELECT * FROM donor_info WHERE user_type='donor'";
                    $result = mysqli_query($con, $sql);

                    if(mysqli_num_rows($result)>0){
                        
                    while($row = mysqli_fetch_assoc($result)){

                ?> 
                    
                <!-- DONOR CARD -->
                <div class="card jumbotron p-0 eligible item">
                    <img src="<?php echo $row['photo']?>" alt="Donor" class="card-img">
                    <div class="card-blood-group"><?php echo $row['blood_group']?></div>
                    <div class="card-text">
                        <h3 class=" text-dark font-weight-bold"><?php echo $row['fname']." ". $row['lname']?></h3>
                        <h4><b>Blood Group :</b> <span class=" text-red font-weight-bold"><?php echo $row['blood_group']?></span></h4>
                        <br>
                        <h4><b>Last donate :</b> <?php echo $row['last_donate']?> ago</h4>
                        <h4><b>Address :</b><?php echo $row['address']?></h4>
                        <h4><b>Contact :</b> <a href="tel: <?php echo $row['phone1']?>" class="card-phone"><?php echo $row['phone1']?></a> <h4>
                        <small><a href="profile/view_profile.php?id=<?php echo $row['id']?>" class=" card-link">View profile <i class=" fa fa-angle-double-right text-red card-link-icon"></i></a></small>
                    </div>
                </div>
                <!-- DONOR CARD Ends -->

                <?php
                        }//ending while loop
                    }//ending first if 
                ?>

            </div>

            <!--View all button-->
            <div class="view-all">
                <a href="all-donors.php" class="view-all-link">See All Donor <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
</section>
