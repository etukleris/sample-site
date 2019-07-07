<!DOCTYPE html>
<html>
  <head>
      <title>User profile page</title>
  </head>

  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    ?>
    <!-- header-->

    <main class="user-profile-page">
      <div class="user-profile-container">
        <?php
        if (isset($_SESSION['userId']) && isset($_SESSION['userCreationDate'])){
          echo "<p>Username: ".$_SESSION['userId']."</p>";
          echo "<p>User created: ".$_SESSION['userCreationDate']."</p>";
        }
        else {
          echo "<p>You are not logged in</p>";
        }
        ?>
      </div>
    </main>
    
    <!--import footer-->  
    <?php 
    include_once("templates/footer.php");
    ?>
    <!-- footer-->
  </body>
</html>