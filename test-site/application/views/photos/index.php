  <main class="photos-page">
  
    <?php
    
        
    if (isset($_GET['user-photos'])){
      $userPhotos = $_GET['user-photos'];
      echo "<h1>User's $userPhotos photos</h1>";
    } else {
      $userPhotos = "";
    }
    echo '<div class="posts-container">';

      foreach ($photos as $photos_item):
        if (($photos_item["useradded"] == $userPhotos) || ($userPhotos == "")){
          echo '<div class="post-images">';
            echo '<img class="user-image" src="'.base_url('public/pictures/uploaded-pictures/').$photos_item["imagename"].'" onerror="this.onerror=null; this.src=\''.base_url('public/pictures/default/noimage2.png').'\'" alt="User\'s image">';
            echo '<div class="hover-image-container">';
              echo '<p class="hover-image-text">' . '<a href="/test-site/user-profile-page?user='.$photos_item["useradded"].'">'.$photos_item["useradded"].'</a>' . '\'s image.Cat type: ' . $photos_item["cattype"].'<br>'; 
              if ($photos_item["catcharacteristics"] == "NULL"){
                echo 'Cat characteristics: Regular </p>';
              }
              else {
                echo 'Cat characteristics: ' . $photos_item["catcharacteristics"].'</p>';
              }
            echo '</div>';
          echo '</div>'; 
        }
      endforeach;
    echo '</div>';
    
    ?>
  </main>