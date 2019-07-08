<!DOCTYPE html>
<html>
  <head>
      <title>CSS Grid test3</title>
  </head>

  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    ?>
    <!-- header-->
    <br>
    <main class="csstest-3">
      <div class="grid">
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

      </div>
    </main>
    <!--import footer-->  
    <?php 
    include_once("templates/footer.php");
    ?>
    <!-- footer-->
  </body>
</html>