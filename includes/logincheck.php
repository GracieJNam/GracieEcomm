<?php
 	/*session_start();//start a session*/
    include "../includes/connect.php";
?>


<?php
 if (isset($_SESSION['login'])){
     echo "<p class='logincheck'>Hi, " . $_SESSION['login'] . "</em></p>";
 }
?>