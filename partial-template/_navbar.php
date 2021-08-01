    <nav class="navbar">
        <div class="container-fluid">
            <a href="index.php" class="nav-logo col-lg-3">
                <img src="resources/img/logo.png" alt="logo" class="logo">
                <div class="logo-text">
                    Blood Bank
                </div>
            </a>

            <i class=" fa fa-bars nav-collapse text-white" onclick="openNav()"></i>

            <div class="nav-items col-lg-9">
                <button  class="nav-exit d-none btn border-0" onclick="closeNav()">&times;</button>
                <a onclick="closeNav()" href="index.php" class="nav-btn active">Home</a>
                <a href="#" class="nav-btn" onclick="preventListener(event)">
                    <div class="dropdown">
                        <div class="dropdown-btn prevent-listener">
                            Blood Group <i class=" fa fa-angle-down dropdown-icon"></i>
                        </div>
                        <div class="dropdown-items">
                            <a onclick="closeNav()" href="#search-donor" class=" dropdown-item">A+</a>
                            <a onclick="closeNav()" href="#search-donor" class=" dropdown-item">A-</a>
                            <a onclick="closeNav()" href="#search-donor" class=" dropdown-item">B+</a>
                            <a onclick="closeNav()" href="#search-donor" class=" dropdown-item">B-</a>
                            <a onclick="closeNav()" href="#search-donor" class=" dropdown-item">AB+</a>
                            <a onclick="closeNav()" href="#search-donor" class=" dropdown-item">AB-</a>
                            <a onclick="closeNav()" href="#search-donor" class=" dropdown-item">O+</a>
                            <a onclick="closeNav()" href="#search-donor" class=" dropdown-item">O-</a>
                        </div>
                    </div>
                </a>
                <a onclick="closeNav()" href="#donor" class="nav-btn">Donor</a>
                <a onclick="closeNav()" href="#need-blood" class="nav-btn">Blood Needs</a>
                <a onclick="closeNav()" href="more.html" class="nav-btn">More</a>

                <!-- if login -->
                <?php 
                    $userType = $_SESSION["usertype"];
                    if(isset($_SESSION['usertype'])){
                        if($userType == 'donor'){
                            echo '  <div class="join col-lg-4 text-right m-0 p-0">
                                    <div class="me">
                                        <img src="'.$_SESSION['profile_pic'].'" alt="profile" title="My Profile" class="profile">
                                        <a href="#" class=" prevent-listener profile-name" onclick="preventListener(event)">'.$_SESSION["username"].'</a>
            
                                        <div class="profile-collapse">
                                            <p><a href="profile/profile.php?id='.$_SESSION['userid'].'" class=" profile-collapse-item">My Profile</a></p>
                                            <p><a href="join/logout.php" class=" profile-collapse-item">Logout</a></p>
                                        </div>
                                    </div>
                                </div>'; 
                            
                            $loggedin = true;
                        }

                        if($userType == 'user'){
                            echo '  <div class="join col-lg-4 text-right m-0 p-0">
                                        <div class="me">
                                            <img src="resources/img/profile.svg" alt="profile" title="My Profile" class="profile">
                                            <a href="#" class=" prevent-listener profile-name" onclick="preventListener(event)">'.$_SESSION["username"].'</a>
                
                                            <div class="profile-collapse">
                                                <p><a href="join/register.php" class=" profile-collapse-item">Donate Blood</a></p>
                                                <p><a href="join/logout.php" class=" profile-collapse-item">Logout</a></p>
                                            </div>
                                        </div>
                                    </div>'; 
                                $loggedin = true;
                        }
                    
                    }
                ?>
                        
                    <div class="join col-lg-4 text-right m-0 p-0 <?php if($loggedin == true){echo "d-none";}?> ">
                        <a href="join/login.php" class="join-btn btn">Login</a>
                        <a href="join/signup.php" class="join-btn btn">Signup</a>
                        <a href="join/register.php" class="join-btn btn">Registration</a>
                    </div>

                
            </div>
        </div>
    </nav>