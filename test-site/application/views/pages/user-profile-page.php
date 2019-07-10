    <main class="user-profile-page">
      <div class="user-profile-container">

      
        <?php
          if (isset($_GET['user'])){
            include_once("dbconfig.php");
            if (userExists($_GET['user'], $con)){
              
              $stmt = $con->prepare("SELECT idUsers, uidUsers, timeCreated, imageUser FROM users WHERE uidUsers = ?");
              $stmt->bind_param("s",  $_GET['user']);
              if($stmt->execute())
              {
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                  
                  $arr[] =$row;
                  
                }
                $resultUserID = $arr[0]['idUsers'];
                $resultUsername = $arr[0]['uidUsers'];
                $resultUserCreationDate = $arr[0]['timeCreated'];
                $resultUserImageName =$arr[0]['imageUser'];
                
            
                echo '<img class="user-profile-image" src="'.base_url('public/pictures/profile-pictures/').$resultUserImageName.'" onerror="this.onerror=null; this.src=\''.base_url('public/pictures/default/noimage2.png').'\'" alt="User\'s image">';
                if (isset($_SESSION['userUid'])){
        
                  if($_SESSION['userUid'] == $resultUserID){
                    echo '<form action="upload-profile-image" method="post" enctype="multipart/form-data">         
                            <legend>Change profile picture</legend>
                            <input type="hidden" name="userUid" value="'.$resultUserID.'">
                            <input type="file" name="profile-image" accept="image/png,image/jpeg,image/gif" required>
                            <button type="submit" id="profile-submit-button" name="submit">Submit</button>                      
                          </form>';
                  }
                      
                }
                echo "<p>Username: ".$resultUsername."</p>";
                echo "<p>Time created: ".$resultUserCreationDate."</p>";
                echo "<p><a href='photos?user-photos=".$_SESSION['userId']."'>User's photos</a></p>";
                
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
