<?php
    //session_start();
    include "connect.php";
?>

<?php
 if(!isset($_SESSION['admin'])){
 
    header('location:../pages/index.php'); //if the 'admin' session is not set redirect to the front end index.php
 }
?>