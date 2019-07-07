<!DOCTYPE html>
<html>
  <head>
      <title>User profile page</title>
  </head>

  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    include_once("dbconfig.php");
    ?>
    <!-- header-->

    <main class="user-profile-page">
      <div class="user-profile-container">
      
      
        <?php
          if (isset($_GET['user'])){
            if (userExists($_GET['user'], $con)){
              
              $stmt = $con->prepare("SELECT uidUsers, timeCreated, imageUser FROM users WHERE uidUsers = ?");
              $stmt->bind_param("s",  $_GET['user']);
              if($stmt->execute())
              {
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                  
                  $arr[] =$row;
                  
                }
                $resultUsername = $arr[0]['uidUsers'];
                $resultUserCreationDate = $arr[0]['timeCreated'];
                $resultUserImageName =$arr[0]['imageUser'];
                
                
                echo '<img class="user-profile-image" src="../profile-pictures/'.$resultUserImageName.'" onerror="this.onerror=null; this.src=\'../profile-pictures/noimage2.png\'" alt="User\'s image">';
                echo "<p>Username: ".$resultUsername."</p>";
                echo "<p>Time created: ".$resultUserCreationDate."</p>";
                
              }
              else{
                echo "Error within query";
              }
            }
            else {
              echo "<p>USER DOES NOT EXIST</p>";
            }
          }
          else {
            echo "<p>Place for user profile</p>";
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