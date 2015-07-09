<?php
    function CheckPageName($name) {
        return (basename($_SERVER['REQUEST_URI']) == $name);
}
?>
<body>
    <div class="container-fluide">
        <div class="row">
         <div class="clear"></div>
         
     <div class="search col-md-12">
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
           
           <div id="navbar" class="navbar-collapse collapse">
             <ul class="nav navbar-nav navbar-right">
                <li><a href="../pages/index.php" class ="home <?php echo CheckPageName("index.php") ? "active" : ""; ?>">Home</a></li>
                <li><a href="../pages/registration.php" class ="create <?php echo CheckPageName("registration.php") ? "active" : ""; ?>">Create New Account</a></li>

             </ul>
         </div><!-- end navigation -->
    </nav> <!-- end main -->
        
          
           <div id="myCarousel" class="carousel slide" >
         <!-- indicators -->
         <ol class="carousel-indicators">
             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <li data-target="#myCarousel" data-slide-to="1"></li>
             <li data-target="#myCarousel" data-slide-to="2"></li>

         </ol>
         <!-- wrapper for slides -->
         <div class="carousel-inner">
             <div class="item active">
             <img src="../images/image1.png" alt="image">
             </div>
             <div class="item">
             <img src="../images/image2.png" alt="image">
             </div>
             <div class="item">
             <img src="../images/image3.png" alt="image">
             </div>
             <div class="item">
             <img src="../images/image4.png" alt="image">
             </div>
             <div class="item">
             <img src="../images/image5.png" alt="image">
             </div>
             <div class="item">
             <img src="../images/image6.png" alt="image">
             </div>
         </div>
<!-- controls -->
         <a class="left carousel-control" href="#myCarousel" data-slide="prev">
             <span class="icon-prev"></span>
         </a>
         <a class="right carousel-control" href="#myCarousel" data-slide="next">
             <span class="icon-next"></span>
         </a>
        </div><br />
       </div>
    </div>
</div>

      

<div id="container">
        