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

    <main>
      <div style="width: 300px; display: block; margin-left: auto; margin-right: auto; text-align: center;">
        <h1>User login</h1>
        <form action="user logic/login logic.php" method="post">
          <input type="text" name="mailuid" placeholder="Username or email" ><br>
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