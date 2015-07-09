<?php
function CheckPageName($name) {
    return (basename($_SERVER['PHP_SELF']) == $name);
}
?>


<nav id="navigation" class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
   </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
             <li>
                    <a href="../index.php" class ="home <?php echo CheckPageName("index.php") ? "active" : ""; ?>">Home</a>
             </li>
             <li><a href="../pages/shop.php" class ="Shop <?php echo CheckPageName("shop.php") ? "active" : "";
                                                               echo CheckPageName("productdetail.php") ? "active" : "";
                                                               echo CheckPageName("category.php") ? "active" : "";
                                                               echo CheckPageName("archives.php") ? "active" : ""; ?>">Shop</a>
            </li>
            <li class="dropdown">
             <a href="#" class = "dropdown-toggle session <?php echo CheckPageName("blog.php") ? "active" :""; 
                                                                echo CheckPageName("blogpost.php") ? "active1" : "";  ?>" data-toggle="dropdown" role="button" aria-expanded="false">Blog &#9660;</a>
              <ul class="dropdown-menu" role="menu">

                   <?php
                        $sql = "SELECT * FROM blog order by blogId";
                        $result = mysqli_query($con, $sql);

                        while($row = mysqli_fetch_array($result))
                        //use a while loop to display all the rows in the database

                        {
                           echo "<li><a href='blogpost.php?blogId=" . $row['blogId'] . "'>" .  $row['blogTitle'] ./*"-" .$row['subTitle'].*/ "</a></li>";              
                        }
                 ?>

                </ul>
            </li>
            <li>
                    <a href="../pages/contactus.php" class ="contact <?php echo CheckPageName("contactus.php") ? "active" : ""; ?>">Contact Us</a>
            </li>
            <li><a href="../pages/shoppingcart.php" class ="Shopping_Cart 
                  <?php echo CheckPageName("shoppingcart.php") ? "active1" : ""; 
                        echo CheckPageName("shopconfirm.php") ? "active1" : "";  
                        echo CheckPageName("shopsuccess.php") ? "active1" : ""; ?>">
                   <?php
                    // count products in cart
                   if (isset($_SESSION['cart'])){
                       $cart_count=count($_SESSION['cart']); 
                        } 
                       else{
                        $cart_count=0;
                       }
                    ?>

                    <img id ="navcartimg" src="../images/shopping_cart.png" />

                    <?php echo " <p class='cartsum'>&nbsp;(&nbsp;" . $cart_count . "&nbsp;)</p>"; ?> 
                </a>
            </li>
           <?php

                 if((isset($_SESSION['login'])) || (isset($_SESSION['member'])))
                  // check to see if a member or admin is logged in and, if so, display the logged in menu items
                 {
            ?>
            <li>
                 <a href="../pages/logout.php" class="logout <?php echo CheckPageName("logout.php") ? "active" : ""; ?>">Logout</a>
            </li>
             <li>
                 <a href="../pages/account.php" class ="create <?php echo CheckPageName("account.php") ? "active" : ""; ?>">My Account</a>
             </li>
             <li class="logincheck">
                 <?php include '../includes/logincheck.php'; ?>
             </li>


            <?php
                }
                    elseif(isset($_SESSION['admin'])){
            ?>
                        <li>
                 <a href="../admin/index.php" class ="Dashboard <?php echo CheckPageName("../admin/index.php") ? "active" : ""; ?>">Dashboard</a>
             </li>
             <li>
                 <a href="../pages/logout.php" class="logout <?php echo CheckPageName("logout.php") ? "active" : ""; ?>">Logout</a>
             </li>
                 <?php       
                    }
                    else //if a member or admin is not logged in display the not logged in menu items
                {
           ?>
             <li>
                 <a href="../pages/login.php" class ="login <?php echo CheckPageName("login.php") ? "active" : ""; ?>">Login</a>
             </li>
             <li>
                 <a href="../pages/registration.php" class ="create <?php echo CheckPageName("registration.php") ? "active" : ""; ?>">Sign Up</a>
             </li>
   
       <?php
            }

        ?>
        
         </ul>
     </div><!-- navbar end--> 
</nav> <!-- end navigation --> 