<?php
    $con = mysqli_connect("http://us-cdbr-iron-east-02.cleardb.net", "bf55ab32c56d81", "e73d326f", "heroku_020f4fd77ef9ac8"); // check connection and, if broken, display an error message
    if (mysqli_connect_errno($con)) {
        echo "Unable to connect to the database: " . mysqli_connect_error();
        exit();
    }
   
?>