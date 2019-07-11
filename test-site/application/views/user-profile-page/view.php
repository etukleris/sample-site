    <main class="user-profile-page">
      <div class="user-profile-container">
        <?php
          echo '<img class="user-profile-image" src="'.base_url('public/pictures/profile-pictures/').$userProfile['imageUser'].'" onerror="this.onerror=null; this.src=\''.base_url('public/pictures/default/noimage2.png').'\'" alt="User\'s image">';
          if (isset($_SESSION['userUid'])){

            if($_SESSION['userUid'] == $userProfile['idUsers']){
              echo '<form action="'.base_url('user-profile-page/uploadProfileImage').'" method="post" enctype="multipart/form-data">         
                      <legend>Change profile picture</legend>
                      <input type="hidden" name="userUid" value="'.$userProfile['idUsers'].'">
                      <input type="file" name="profile-image" accept="image/png,image/jpeg,image/gif" required>
                      <button type="submit" id="profile-submit-button" name="submit">Submit</button>                      
                    </form>';
            }
          }
          echo "<p>Username: ".$userProfile['uidUsers']."</p>";
          echo "<p>Time created: ".$userProfile['timeCreated']."</p>";
          echo "<p><a href=".base_url()."photos/".$userProfile['uidUsers'].">User's photos</a></p>";
        ?>
      </div>
    </main>
