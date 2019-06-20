<!DOCTYPE html>
<html>

<head>
  <title>Users' submitted cat photos</title>
  
  <style>
  
  .posts-container{
    display: flex;
    flex-wrap: wrap;
    align-content: flex-start;
    
  }
  .post-images{
    

    width:  20%;
    height: 20%;
    overflow: hidden;
    
    
  }
  .hover-image-container{
    background:white;
    padding-left:2px;
    padding-right:2px;
    margin-left:2px;
    margin-right:2px;
  }
  .post-images .hover-image-container{
    position:relative;
    bottom:50px;
    left:0px;
    visibility:hidden;
  }
  .post-images:hover .hover-image-container{
    visibility:visible;
  }
  .hover-image-text{
    font-size: 12px;
    line-height:12px;
  }
  .user-image{
    max-width: 100%;
    max-height: 100%;
    margin: auto;
  

    }
  
  </style>
  
  <link href="../css/header-and-footer.css" rel="stylesheet">
  <link rel="import" href="templates/header-and-footer.php">
</head>

<body onload=display_ct();>
  <!--import header-->
  <script>
    var link = document.querySelector('link[rel=import]');
    var content = link.import.querySelector('.header');
    document.body.appendChild(document.importNode(content, true));
  </script>
  <!-- header-->
  
  <h2>These are the images submitted by people</h2>
  
  <main>
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
              echo '<img class="user-image" src="../pictures/'.$row["imagename"].'" onerror="this.onerror=null; this.src=\'../pictures/noimage2.png\'" alt="User\'s image">';
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
      
    }
      
  ?>
  
  
  
  </main>
  
  <!--import footer-->
  <script>
    var link = document.querySelector('link[rel=import]');
    var content = link.import.querySelector('.footer');
    document.body.appendChild(document.importNode(content, true));
  </script>
  <!-- footer-->
</body>
