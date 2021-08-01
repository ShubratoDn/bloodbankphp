

<!-- =============================== -->
        <!-- REQUEST BLOOD FORM -->
<!-- =============================== -->


<section id="req_blood" class=" d-flex justify-content-center align-items-center">
        <div class="container ">
            <div class="req-form py-5 m-auto col-xl-4 col-lg-5 col-md-8 col-sm-10 col-12">
                <h1 class="text-center  font-weight-bold">Request For Blood</h1>
                <hr>

                <?php

                error_reporting(0);

                $full_name = $_POST['full_name'];
                $b_group = $_POST['b_group'];
                $quantity = $_POST['quantity'];
                $time_n = $_POST['time_n'];
                $time_dh = $_POST['time_dh'];
                $location = $_POST['location'];
                $contact = $_POST['contact'];

                if(isset($_POST['submit'])){

                    switch($b_group){
                        case "A+" : 
                            $filter_bg_class = "Ap";
                            break;
                        case "A-" : 
                            $filter_bg_class = "An";
                            break;
                        case "B+" : 
                            $filter_bg_class = "Bp";
                            break;
                        case "B-" : 
                            $filter_bg_class = "Bn";
                            break;
                        case "AB+" : 
                            $filter_bg_class = "ABp";
                            break;
                        case "AB-" : 
                            $filter_bg_class = "ABn";
                            break;
                        case "O+" : 
                            $filter_bg_class = "Op";
                            break;
                        case "O-" : 
                            $filter_bg_class = "On";
                            break;
                    }

                    $full_name = filter_var($full_name, FILTER_SANITIZE_STRING);
                    $quantity= filter_var($quantity , FILTER_SANITIZE_NUMBER_INT);
                    $time_n= filter_var($time_n , FILTER_SANITIZE_NUMBER_INT);            
                    $location = filter_var($location , FILTER_SANITIZE_STRING);
                    $contact= filter_var($contact , FILTER_SANITIZE_NUMBER_INT); 
                    $time = $time_n." ".$time_dh ;

                    if(empty($b_group)){
                        $errmsg .= "<p class='alert alert-danger font-weight-bold'>Insert Blood Group</p>";
                    }

                    // including database connection
                    include("database/dbconnection.php");



                    // Checking for same req is valid or not
                    $sql_find = "SELECT * FROM `need_blood` WHERE full_name='$full_name' AND blood_group ='$b_group' AND quantity ='$quantity' AND time='$time' AND hospital='$location' AND phone = '$contact'";
                    $find_query= mysqli_query($con, $sql_find);
                    if(mysqli_fetch_assoc($find_query)){
                        $errmsg .= "<p class='alert alert-danger font-weight-bold'>Your request is already in pandding</p>";
                    }else{

                        if(!$errmsg){
                            // if same request is not exist
                            $sql_insert = "INSERT INTO `need_blood`(`full_name`, `blood_group`, `quantity`, `time`, `Hospital`, `phone`,`filter_bg_class`) VALUES ('$full_name', '$b_group','$quantity','$time','$location','$contact', '$filter_bg_class')";

                            if(mysqli_query($con, $sql_insert)){
                                $successmsg .= "<p class='alert alert-success'><b>Sucessful! </b> Your request is now in feed</p>";
                                ?>
                                    <script>
                                        setTimeout(function(){
                                            location.replace("index.php");
                                        }, 5000);
                                    </script>

                                <?php
                            }else{                
                                $errmsg .= "<p class='alert alert-danger'>Fail to upload your data</p>";
                            }
                        }
                    }


                }

                ?>

                <!-- form starts here -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <?php
                        echo $successmsg;
                        echo $errmsg;
                    ?>
                    <div class="input-div">
                        <label for="full-name">
                            <h4>Full Name</h4>
                         </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-user"></i>
                            </div><input type="text" name="full_name" id="full-name" placeholder="Enter Full Name" required>
                        </div>    
                    </div>                

                   <div class="input-div">
                        <label for="b_group">
                            <h4>Blood Group</h4>
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-tint"></i>
                            </div>
                            <select name="b_group" id="b_group" required>
                                <option value="">Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                   </div>

                   <div class="input-div">
                        <label for="quantity">
                            <h4>Quantity of blood</h4>
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-shopping-bag"></i>
                            </div>
                            <input type="number" name="quantity" id="quantity" placeholder="Quantity; Ex: 1 bag" required>
                            <h4>Bag</h4>
                        </div>
                   </div>

                   <div class="input-div">
                        <label for="time">
                            <h4>You need blood within</h4>
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-clock-o"></i>
                            </div>
                            <input type="number" name="time_n" id="time" placeholder="Time; Ex: 8 hour" style="width: 55%; " required>
                            <select name="time_dh">
                                <option value="Day">Day</option>
                                <option value="Hour">hour</option>
                            </select>
                        </div>
                   </div>
                   

                   <div class="input-div">
                        <label for="location">
                            <h4>Hospital Name</h4>
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-map-marker"></i>
                            </div>
                            <input type="text" name="location" id="location" placeholder="Where you need blood?" required>
                        </div>
                   </div>

                   <div class="input-div">
                        <label for="contact">
                            <h4>Phone</h4>
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-phone"></i>
                            </div>
                            <input type="text" name="contact" id="contact" placeholder="01*********" required>
                        </div>
                   </div>
                    
                   <input type="submit" name="submit" value="Request Now" class=" btn btn-primary btn-lg w-100" >
                </form>
                <!-- form Ends -->
            </div>
        </div>
    </section>