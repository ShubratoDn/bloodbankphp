<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'head.php';
    ?>
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/login.css">
    <title>Reset Your Password</title>
    <style>
        .card{
            height: auto !important;
        }

    </style>
</head>
<body>
    
    <?php

        error_reporting(0);
        session_start();
        // including database connection
        include "../database/dbconnection.php";

        if(!$_SESSION['sendMail'] == 1){
            ?>
                <script>
                    location.replace("recover.php");
                </script>
            <?php
        }


        if(isset($_GET['token'])){//geting my id from  url

            $myToken = $_GET['token'];

            $sql = "SELECT * FROM donor_info WHERE token='$myToken'";
            $result = mysqli_query($con, $sql);
            if($row = mysqli_fetch_assoc($result)){
                $userFirstName =$row['fname'];



                // if Submit form then UPDATE PASSWORDs
                if($_POST['submit']){
            
                    $password = $_POST['password'];
                    $confirmpass = $_POST['confirmpass'];
        
                    $password = filter_var($password,FILTER_SANITIZE_STRING);
                    $confirmpass = filter_var($confirmpass,FILTER_SANITIZE_STRING);
        
                    // matching two password
                    if($password != $confirmpass){
                        $errorMsg .= "<div class=' alert-danger border rounded p-1  mb-3'><strong>Password not matching</strong></div>";
                    }else{
                        $password = md5($password);
                        $password = mysqli_real_escape_string($con, $password);
        
                        $sql_update = "UPDATE donor_info SET password='$password', confirmpass ='$confirmpass' WHERE token='$myToken'";
                        if(mysqli_query($con, $sql_update)){
                            ?>
                                <script>
                                    location.replace("login.php");
                                </script>
                            <?php
                 
                            session_destroy();
                            session_start();
                            $_SESSION['passwordUpdate'] = "<div class='alert alert-success rounded p-1 '><strong>Password changed sucessfull.</strong></div>";
                        }else{
                            $errorMsg .= "<div class=' alert-danger border rounded p-1  mb-3'><strong>Failed to Update your password</strong></div>";
                        }
        
                    }
                }

            }else{
                $errorMsg .= "<div class=' alert-danger border rounded p-1  mb-3'><strong>Failed to get Data</strong></div>";
            }
        }else{
            $errorMsg .= "<div class=' alert-danger border rounded p-1  mb-3'><strong>You can't change your password now</strong></div>";
        }


    ?>

    <section id="resetPassword">
        <div class="container-fluid jumbotron d-flex justify-content-center align-items-center w-100" style="height: 100vh;">
            <form action="" method="post" class=" col-lg-4 col-md-6 col-sm-10">
                <div class=" card w-100">
                    <div class=" card-header">
                        <h1>Create your new password</h1>
                    </div>
                    <div class="card-body">
                    
                        <?php echo @$errorMsg; ?>

                        <p class=" font-weight-bold">Hey <?php echo $userFirstName?> Enter you New Password and Confirm it</p>

                        <!-- password -->
                        <div class="d-flex align-items-center justify-content-center form-group input-group w-100 ">                            
                            <input type="password" class="form-input border m-0 password" name="password" placeholder="New Password" style="width: 80%" required >
                            <i class=" fa fa-eye-slash border" onclick="showPass(0)" style=" padding: 9.5px;"></i>
                        </div>

                        <!-- Confirm Password -->
                        <div class="d-flex align-items-center justify-content-center form-group input-group w-100">                            
                            <input type="password" class="form-input border m-0 password" name="confirmpass" placeholder="Confirm password" style="width: 80%;" required >
                            <i class=" fa fa-eye-slash border" onclick="showPass(1)" style=" padding: 9.5px;"></i>
                        </div>

                    </div>
                    <div class=" card-footer">                        
                        <input type="submit" name="submit" class="btn btn-primary btn-lg w-100" style="font-size: 16px;" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </section>




<script>
    function showPass(x){
        var pass =  document.querySelectorAll(".password");
        if(pass[x].type =="password"){
            pass[x].type = " text";
        }else{
            pass[x].type = "password" ;
        }
    }
</script>

</body>
</html>

