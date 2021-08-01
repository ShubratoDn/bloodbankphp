<!-- who need bloods section starts -->
<section id="need-blood">
    <div class="container-md container-fluid">
        <div class="need-blood ">
            <h1 class="title text-center" data-aos="fade-down" data-aos-duration="800">
                <span class="title-style text-white">They need  blood</span>
            </h1>

            <!-- carousel -->
            <div class="owl-carousel owl-theme" data-aos="fade-up" data-aos-duration="800">

                <?php
                    include("database/dbconnection.php");

                    $sql = "SELECT * FROM `need_blood` ";
                    $result =  mysqli_query($con, $sql);

                    if(mysqli_num_rows($result)>0){

                    while($row = mysqli_fetch_assoc($result)){

                ?>

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

                                $min = floor($difference / 60);
                                $hour = floor($min / 60);
                                $day = 0;

                                if($hour > 23){
                                    $day++;
                                    $hour = $hour - 24; 
                                    $postTime = "$day day $hour hour ";
                                }

                                if($day == 0 && $hour == 0 ){
                                    $postTime = "$min min";
                                }

                                if($day == 0 && $hour > 0 ){
                                    $postTime = "$hour hour";
                                }

                                echo $postTime;
                               
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

                <?php
                        }//ending while
                    }//ending if
                ?>

            </div>
            <!-- carousel ends -->
        </div>

        <!--View all button-->
        <div class="view-all">
            <a href="needs-blood.php" class="view-all-link">See More <i class="fa fa-angle-double-right"></i></a>
        </div>
    </div>
</section>
<!-- who need bloods section Ends -->