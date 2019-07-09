<?php 
#include("../user logic/functions.php"); 

session_start();


?>
<!-- import css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/mainstyles.css');?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/header-and-footer.css');?>"/>
<link href="../css/mainstyles.css" rel="stylesheet">
<link href="../css/header-and-footer.css" rel="stylesheet">



<header class="header header-footer"> 
  <h1>Titlerooni, checking out the basics</h1>
  <nav>
    <div class="navbar">
      <a href="index">Home</a>
      <a href="photos">Photos</a>
      <div class="dropdown">
        <button class="dropbtn">CSS tests 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="csstest1">Css1</a>
          <a href="csstest2">Css2</a>
          <a href="csstest3">Css3</a>
          <a href="csstest4">Css4</a>
          <a href="csstest5">Css5</a>
          <a href="csstest6">Css6</a>
        </div>
      </div> 
      <a href="dummy">Dummy page</a>
      
      <?php 
        if (logged_in()) 
        {
           echo '<a href="logout" style="float:right;">Logout</a>';
           if (isset($_SESSION['userId'])){
             echo '<a href="user-profile-page?user='.$_SESSION['userId'].'" style="float:right;">Profile</a>';
           }
        }
        else 
        {
          echo '<a href="login" style="float:right;">Login</a>';
        }

        
      ?>
   </div>
  </nav>
</header>
