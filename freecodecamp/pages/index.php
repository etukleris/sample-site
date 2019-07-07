

<!DOCTYPE html>
<html>
  <head>
    <title>testsite </title>
  </head>

  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    ?>
    <!-- header-->

    
   
    <main class="index-page">
      <?php 
      
        if (isset($_GET['login'])){
            if ($_GET['login'] == "success"){
            
            echo '<p class="login-success">You have just logged in!</p>';
         
            }
          }
          
        else if (logged_in()) {
          echo "<p>You are currently logged in</p>";
        }
        else
        {
           echo "<p>You are currently logged out</p>";
        }
      ?>
  
      <h2>Not just default CatPhotoApp from freecodecamp</h2>
      <p>Added more pages, user login/signup, db, image upload, headers & footers and so on</p>
      <p>Still learning and testing basic html, css, some js, db connection etc </p>
      
      <p>Click here to view more <a href="https://pixabay.com/images/search/cat/">cat photos</a>.</p>
      
      <a href="#"><img src="https://bit.ly/fcc-relaxing-cat" alt="A cute orange cat lying on its back." class="thick-green-border smaller-image shadow-test"></a>
      
      <div class="div-color-test silver-background div-padding-test">
        <p>Things cats love:</p>
        <ul id="ul-first-child-test">
          <li>cat nip</li>
          <li>laser pointers</li>
          <li class="lasagna-li">lasagna</li>
        </ul>
        <p>Top 3 things cats hate:</p>
        <ol>
          <li>flea treatment</li>
          <li>thunder</li>
          <li>other cats</li>
        </ol>
      </div>
      
      <form action="upload info/upload_image.php" method="post" enctype="multipart/form-data">
        <fieldset>
          <legend>Want to add a cat? Choose what best defines it</legend>
          
          <input id="indoor-or-outdoor1" type="radio" name="indoor-outdoor" value="Indoor" checked>
          <label for="indoor-or-outdoor1">Indoor</label>
          <input id="indoor-or-outdoor2" type="radio" value="Outdoor" name="indoor-outdoor">
          <label for="indoor-or-outdoor2" >Outdoor</label><br>
          
          <input id="personality1" type="checkbox" name="personality[]" value="Loving" checked>
          <label for="personality1">Loving</label>
          <input id="personality2" type="checkbox" name="personality[]" value="Lazy">
          <label for="personality2">Lazy</label>
          <input id="personality3" type="checkbox" name="personality[]" value="Energetic">
          <label for="personality3">Energetic</label><br>
          <!--<input type="text" placeholder="cat photo URL" required id="cat-submit-input">-->
          
          <input type="text" placeholder="your username"  id="cat-submit-username" name="cat-submit-username" required>
          <input type="file" name="cat-image" accept="image/png,image/jpeg,image/gif" required>
          <button type="submit" id="cat-submit-button" name="submit">Submit</button>
        </fieldset>
      </form>
      
    </main>
    
    <!--import footer-->
    <?php 
    include_once("templates/footer.php");
    ?>
    <!-- footer-->

  </body>
</html>