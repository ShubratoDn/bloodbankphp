
<?php
    // creating  connection to database
    $host = "localhost";
    $userName = "root";
    $c_pass = "";
    $db = "blood bank";
    // $db = "test";

    $con = mysqli_connect($host,  $userName, $c_pass,$db);

    if(mysqli_connect_error()){
        ?>
            <script>alert("connection failed  <?php echo "problem is : ". mysqli_connect_error(); ?>")</script>
            <?php
    }else{
        ?>
            <!-- <script>alert("connection success")</script> -->
        <?php
    }

?>
