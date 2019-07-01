<!DOCTYPE html>
<html>
  <head>
      <title>CSS Grid test4</title>
  </head>

  <body onload=display_ct();>
    <!--import header-->
    <?php 
    include_once("templates/header.php");
    ?>
    <!-- header-->
    <br>
    <main class="csstest-4">
      <div class="row">
        <div class="inside inside-left">Left</div>
        <div class="inside inside-right">
          <div class="inside-right-margin-test"> RIght</div>
        
        </div>
      </div>

      <div class="row">
        <div class="inside inside-left">Left Left Left LeftLeft Left</div>
        <div class="inside inside-right">
          <div class="inside-right-margin-test"> RIghtRIghtRIghtRIghtRIghtRIght</div>
        </div>
      </div>

      <div class="row">
        <div class="inside inside-left">Left Left Left LeftLeft LeftLeft Left Left LeftLeft Left</div>
        <div class="inside inside-right">
          <div class="inside-right-margin-test"> RIghtRIghtRIghtRIghtRIghtRIghtRIghtRIghtRIghtRIghtRIghtRIght</div>
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