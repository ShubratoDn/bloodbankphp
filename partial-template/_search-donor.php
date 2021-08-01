<!-- search blood in your Area -->
<section id="search-donor">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 border-right col-md-6" data-aos="flip-right" data-aos-duration="800">
                <div class="search-donor ">
                    <!-- search for blood donor -->
                    <h1 class="title search-donor-title" >
                        Search a <span class="title-style">blood donor</span>  in your area : 
                    </h1>

                    <?php
                        // getting inputs value and head to serach page
                        $bg_group = $_GET['bloodGroup'];
                        $bg_group = urlencode($bg_group);
                        
                        $district = $_GET['district'];
                        $upazila = $_GET['upazila'];

                        if(isset($_GET['submitsearch'])){
                            ?>
                                <script>
                                    location.replace("search_result.php?bg=<?php echo $bg_group?> & district=<?php echo $district?> & upazila=<?php echo $upazila?>");
                                </script>
                            <?php
                        }
                    
                    ?>

                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="get" class=" text-center">

                        <!-- datalist for blood group -->
                        <div class="input-group px-5">
                            <select name="bloodGroup" id="blood-group" required>
                                <option value="">Choose Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                            <select name="district" id="district" class=" " onchange="populate_dropdown()" required>
                                <option value="">Choose District</option>
                                <option value="Sirajganj">Sirajganj</option>
                                <option value="Pabna">Pabna</option>
                                <option value="Naogaon">Naogaon</option>
                            </select>
                            <select name="upazila" id="upazila" class="">
                                <option value="">Upazila</option>
                            </select>
                        </div>
                        <input type="submit" name="submitsearch" id="" class=" btn btn-primary d-block m-auto search-donor-btn" value="Search">
                    </form>
                </div>
            </div>


            <div class="col-12 col-md-6" data-aos="flip-left"  data-aos-duration="800">
                <!-- request for blood -->
                <div class="req-blood">
                    <h1 class="title">
                        emergency need <span class=" title-style">blood</span>?
                    </h1>
                    <h1 class=" text-dark">
                        Fill up a form to apply a request for <span class=" text-dark"> Blood Require</span>
                    </h1>
                    <a href="req_blood.php" class=" btn btn-primary d-block m-auto search-donor-btn">Fill form</a>
                </div>
            </div>
        </div>
    </div>
</section>