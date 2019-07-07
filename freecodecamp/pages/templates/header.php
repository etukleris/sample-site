<?php 
include("user logic/functions.php"); 

session_start();


?>
<!-- import css -->
<link href="../css/mainstyles.css" rel="stylesheet">
<link href="../css/header-and-footer.css" rel="stylesheet">



<header class="header header-footer">
  <h1>Titlerooni, checking out the basics</h1>
  <nav>
    <div class="navbar">
      <a href="index.php">Home</a>
      <a href="photos.php">Photos</a>
      <div class="dropdown">

        <button class="dropbtn">CSS tests 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="csstest1.php">Css1</a>
          <a href="csstest2.php">Css2</a>
          <a href="csstest3.php">Css3</a>
          <a href="csstest4.php">Css4</a>
          <a href="csstest5.php">Css5</a>
          <a href="csstest6.php">Css6</a>
          
        </div>
      </div> 
      
      <?php 
        if (logged_in()) 
        {
           echo '<a href="user logic/logout.php" style="float:right;">Logout</a>';
           echo '<a href="user-profile-page.php" style="float:right;">Profile</a>';
        }
        else 
        {
          echo '<a href="login.php" style="float:right;">Login</a>';
        }

        
      ?>
   </div>
  </nav>
</header>
