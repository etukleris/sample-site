<?php 
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/mainstyles.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/header-and-footer.css');?>"/>
    <!-- import css -->

  </head>

  <body onload=display_ct();>


  <header class="header header-footer"> 
    <h1>Titlerooni, checking out the basics</h1>
    <nav>
      <div class="navbar">
        <a href="<?php echo base_url('index')?>">Home</a>
        <a href="<?php echo base_url('photos')?>">Photos</a>
        <div class="dropdown">
          <button class="dropbtn">CSS tests 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="<?php echo base_url('csstest1')?>">Css1</a>
            <a href="<?php echo base_url('csstest2')?>">Css2</a>
            <a href="<?php echo base_url('csstest3')?>">Css3</a>
            <a href="<?php echo base_url('csstest4')?>">Css4</a>
            <a href="<?php echo base_url('csstest5')?>">Css5</a>
            <a href="<?php echo base_url('csstest6')?>">Css6</a>
          </div>
        </div> 
        <a href="<?php echo base_url('dummy')?>">Dummy page</a>
        
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
