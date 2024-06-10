<?php

    // require 'constants.php';

    // Connect To The Database
     session_start();
    $con = new mysqli("localhost","root","","blog");
    
    if(mysqli_errno($con)){
        die(mysqli_error($con));
    }
    ?>