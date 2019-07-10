  <main class="photos-page">
  <h2>These are the images submitted by people</h2>
  <?php 
    include('dbconfig.php');
    if (!$con) {
      die('Could not connect: ' . $con->connect_error);
    }
    else{
      $sql = "SELECT dateadded, useradded, imagename, cattype, catcharacteristics FROM pictures";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        echo '<div class="posts-container">';
        // output data of each row
          while($row = $result->fetch_assoc()) {
            echo '<div class="post-images">';
              echo '<img class="user-image" src="'.base_url('public/pictures/uploaded-pictures/').$row["imagename"].'" onerror="this.onerror=null; this.src=\''.base_url('public/pictures/default/noimage2.png').'\'" alt="User\'s image">';
              echo '<div class="hover-image-container">';
                echo '<p class="hover-image-text">' . $row["useradded"] . '\'s image.Cat type: ' . $row["cattype"].'<br>'; 
                if ($row["catcharacteristics"] == "NULL"){
                  echo 'Cat characteristics: Regular </p>';
                }
                else {
                  echo 'Cat characteristics: ' . $row["catcharacteristics"].'</p>';
                }
              echo '</div>';
            echo '</div>'; 
            
          }
        echo '</div>';
        
      }
      else
      {
        echo '<p>No results</p>';
      }
      
    }
      
  ?>
  </main>
 