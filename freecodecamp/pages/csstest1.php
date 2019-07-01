<!DOCTYPE html>
<html>

  <head>
      <title>CSS Grid test</title>
  </head>

  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    ?>
    <!-- header-->
    <br>
    <main class="csstest-1">
      <div class="grid">
          <div>
              <p>lorem ipsum etc </p>
          </div>
          <div>
              <p>second column for grid</p>
          </div>
          <div>
              <p>lorem ipsum etc </p>
          </div>
          <div>
              <p>second column for grid</p>
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