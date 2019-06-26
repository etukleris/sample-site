<!DOCTYPE html>
<html>
<head>
    <title>CSS Grid test4</title>
    <style>
        .row {
          display: table-row;
         
          
        }
        .inside {
          display: table-cell;
          
          border-spacing:5px
        }
        .inside-left {
          background: lightgreen;
          border: 1px solid grey;
        }
        .inside-right-margin-test{
          margin-left:10px;
          border: 1px solid grey;
        }
    </style>
    <link href="../css/header-and-footer.css" rel="stylesheet">

</head>
<body onload=display_ct();>
  <!--import header-->
  <?php 
  include_once("templates/header.php");
  ?>
  <!-- header-->
  <br>
  <main>
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