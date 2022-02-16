<?php
    $con = mysqli_connect("127.0.0.1", "azure", "6#vWHD_$", "gracieecomm"); // check connection and, if broken, display an error message
    if (mysqli_connect_errno($con)) {
        echo "Unable to connect to the database: " . mysqli_connect_error();
        exit();
    }
   
?>