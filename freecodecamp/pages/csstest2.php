<!DOCTYPE html>
<html>
  <head>
      <title>CSS Grid test2</title>
  </head>

  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    ?>
    <!-- header-->
    <br>
    <main class="csstest-2">
      <div class="grid">
          <div>
              <p>lorem ipsum etc </p>
          </div>
          <div>
              <p>lorem ipsum etclorem ipsum
              etclorem ipsum etclorem ipsum
              etclorem ipsum etclorem ipsum
              etclorem ipsum etclorem ipsum
              etclorem ipsum etclorem ipsum
              etclorem ipsum etclorem ipsum
              etclorem ipsum etclorem ipsum 
              etclorem ipsum etclorem ipsum
              etclorem ipsum etclorem ipsum
              etclorem ipsum etclorem ipsum
              etclorem ipsum etclorem ipsum
              etclorem ipsum etc </p>
          </div>
          <div class="nested">
              <div>
                  <p>lorem</p>
              </div>
              <div>
                  <p>lorem</p>
              </div>
              <div>
                  <p>lorem</p>
              </div>
          </div>
          <div>
              <p>lorem ipsum etc </p>
          </div>
          <div>
              <p>lorem ipsum etc </p>
          </div>
          <div>
              <p>lorem ipsum etc </p>
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