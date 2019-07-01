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

    <main>
      <div style="width: 300px; display: block; margin-left: auto; margin-right: auto; ">
        <h1>User signup</h1>
        <form action="user logic/signup logic.php" method="post">
        <input type="text" name="uid" placeholder="Username" required><br>
        <input type="email" name="mail" placeholder="E-mail" required><br>
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