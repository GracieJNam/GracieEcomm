<?php
    $con = mysqli_connect("localhost", "root", "111111", "wd6_nam_7108842810"); // check connection and, if broken, display an error message
    if (mysqli_connect_errno($con)) {
        echo "Unable to connect to the database: " . mysqli_connect_error();
        exit();
    }
   
?>