<!DOCTYPE html>
<html>
  <head>
      <title>CSS Grid test5</title>
  </head>

  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    ?>
    <!-- header-->
    <br>
    <p>Testing out flexbox instead of grid</p>
    <main class="csstest-5">
      <div class="flex-test-container">
        <div class="box box1">
          <p>box 1 </p>
        </div>
        <div class="box box2">
          <p>box 2 </p>
        </div>
        <div class="box box3">
          <p>box 3 </p>
        </div>
        <div class="box box4">
          <p>box 4 </p>
        </div>
        <div class="box nested-boxes box5">
        
          <?php for ($i = 0; $i<12; $i++) {
            echo '<div class="box-within-a-box"> </div>';
          }
          ?>
        </div>

      </div>
    </main>
    <!--import footer-->  
    <?php 
    include_once("templates/footer.php");
    ?>
    <!-- footer-->
  </body>

</html>