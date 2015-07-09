<?php
function CheckPageName($name) {
    return (basename($_SERVER['PHP_SELF']) == $name);
}
?>
 
<nav class="dashnavbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      
    <?php
    if((isset($_SESSION['login'])) || (isset($_SESSION['user'])))  
      // check to see if a member or admin is logged in and, if so, display the logged in menu items
     {
?>
         <li> 
             <a href="../pages/logout.php" class="logout <?php echo CheckPageName("logout.php") ? "active" : ""; ?>">Logout</a>
        </li>
         <li><a href="../pages/index.php">View Site</a></li>
     </ul>
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
     </ul>
     
   
<?php
    }

    $PAGENAME = basename(__FILE__);
?>     

 <!-- display the main navigation -->
     <ul class="nav navbar-nav">
         <li><a  href="../admin/index.php"  class ="login <?php echo CheckPageName("index.php") ? "active" : ""; ?>">Dashboard</a></li>
         <li><a  href="../admin/product.php"  class ="login <?php echo CheckPageName("product.php") ? "active" : "";
                                                                  echo CheckPageName("newproduct.php") ? "active" : "";
                                                                  echo CheckPageName("productupdate.php") ? "active" : ""; ?>">Products</a></li>
        <li><a  href="../admin/blog.php"  class ="products <?php echo CheckPageName("blog.php") ? "active" : "";
                                                                  echo CheckPageName("blognew.php") ? "active" : "";
                                                                  echo CheckPageName("blogupdate.php") ? "active" : ""; ?>">Blogs</a></li>
         <li><a  href="../admin/categories.php"  class ="blogs <?php echo CheckPageName("categories.php") ? "active" : "";
                                                                     echo CheckPageName("categorynew.php") ? "active" : "" ;
                                                                    echo CheckPageName("categoryupdate.php") ? "active" : "" ;?>">Categories</a></li>
         <li><a  href="../admin/administrators.php"  class ="categories <?php echo CheckPageName("administrators.php") ? "active" : "";
                                                                         echo CheckPageName("administratornew.php") ? "active" : ""; ?>">Administrators</a></li>
         <li><a  href="../admin/adminaccount.php" class ="adminaccount <?php echo CheckPageName("adminaccount.php") ? "active" : ""; ?>">My Account</a></li>
         <li><a  href="themes.php" class ="theme <?php echo CheckPageName("themes.php") ? "active" : ""; ?>">Themes</a></li>
          <li class="logincheck">
                 <?php include 'logincheck.php'; ?></li>
     </ul>
    </div><!-- navbar-collapse -->
    </nav> <!-- end main -->
 </div><!-- container-fluid -->


