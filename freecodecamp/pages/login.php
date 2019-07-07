<!DOCTYPE html>
<html>
  <head>
     <title>User login page</title>
  </head>
  
  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    ?>
    <!-- header-->

    <main class="login-page">
    
    <?php 
      if (isset($_GET['mailuid'])){
        $mailuid = $_GET['mailuid'];
          
      }
      else{
        $mailuid = "";
      }
        
        
      if (isset($_GET['error'])){
        if ($_GET['error'] == "nodata"){
          
         echo '<p class="login-error-message">Fill in all the fields!</p>';
       
        }
        else if ($_GET['error'] == "wrongpwd"){
          
         echo '<p class="login-error-message">Password was incorret!</p>';
         
        }
      }
    ?>
        
        
      <div class="login-container">
        <h1>User login</h1>
        <form action="user logic/login logic.php" method="post">
          <input type="text" name="mailuid" placeholder="Username or email" value="<?php echo $mailuid ?>" ><br>
          <input type="password" name="pwd" placeholder="Password" ><br>
          <button type="submit" name="login-submit">Login</button>
        
        </form>
        <br>
        <p>Don't have an account? You can sign up <a href="signup.php">here</a></p>
      </div>

    </main>
    
    <!--import footer-->  
    <?php 
    include_once("templates/footer.php");
    ?>
    <!-- footer-->
  </body>
</html>