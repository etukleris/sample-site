    <main class="user-profile-page">
      <div class="user-profile-container">
        <?php
          echo '<img class="user-profile-image" src="'.base_url('public/pictures/profile-pictures/').$userProfile['imageUser'].'" onerror="this.onerror=null; this.src=\''.base_url('public/pictures/default/noimage2.png').'\'" alt="User\'s image">';
          if (logged_in()) {
            if($_SESSION['userUid'] == $userProfile['idUsers']){
              if(isset($error)){ echo $error;}?>
            
              <?php echo form_open_multipart('user-profile-page/do_upload');?>
                <legend>Change profile picture</legend>
                <input type="hidden" name="userUid" value="<?php echo $userProfile['idUsers'] ?>">
                <input type="file" name="profile-image" size="20" />
                <input type="submit" value="upload" id="profile-submit-button"/>

              </form>
            
          <?php }
          }
          echo "<p>Username: ".$userProfile['uidUsers']."</p>";
          echo "<p>Time created: ".$userProfile['timeCreated']."</p>";
          echo "<p><a href=".base_url()."photos/".$userProfile['uidUsers'].">User's photos</a></p>";
        ?>
      </div>
    </main>
