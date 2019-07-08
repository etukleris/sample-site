<!DOCTYPE html>
<html>
  <head>
      <title>User sign up page</title>
  </head>

  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    ?>
    <!-- header-->

    <main class="signup-page">
    
    <?php 
      if (isset($_GET['uid'])){
        $uid = $_GET['uid'];
          
        }
      else{
        $uid = "";
        }
      if (isset($_GET['email'])){
        $email = $_GET['email'];
      }
      else{
        $email = "";
      }
    
    
    
    
      if (isset($_GET['error'])){
       
        if ($_GET['error'] == "nodata"){
          
         echo '<p class="signup-error-message">Fill in all the fields!</p>';
       
        }
        else if ($_GET['error'] == "invalidusername"){
          
         echo '<p class="signup-error-message">Username should only contain letters and numbers!</p>';
         
        } 
        
        else if ($_GET['error'] == "passwordcheck"){
          
         echo '<p class="signup-error-message">Your passwords do not match!</p>';
          
        } 
        else if ($_GET['error'] == "userexists"){
          
         echo '<p class="signup-error-message">Username already exists!</p>';
          
        } 
        else if ($_GET['error'] == "emailexists"){
          
         echo '<p class="signup-error-message">Email already exists!</p>';
          
        } 
      }
    ?>
      <div class="signup-container">
        <h1>User signup</h1>
        <form action="user logic/signup logic.php" method="post">
        <input type="text" name="uid" placeholder="Username" value="<?php echo $uid ?>" required><br>
        <input type="email" name="mail" placeholder="E-mail" value="<?php echo $email ?>" required><br>
        <input type="password" name="pwd" placeholder="Password" required><br>
        <input type="password" name="pwd-repeat" placeholder="Repeat your password" required><br>
        <button type="submit" name="signup-submit">Signup</button>
      
      </form>
      </div>

    </main>
    
    <!--import footer-->  
    <?php 
    include_once("templates/footer.php");
    ?>
    <!-- footer-->
  </body>
</html>