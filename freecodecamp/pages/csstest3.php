<!DOCTYPE html>
<html>
<head>
    <title>CSS Grid test3</title>
    <style>
        .grid{
            display:grid;
            grid-template-columns:1fr 2fr 1fr;
            grid-auto-rows:minmax(100px, auto);
            grid-gap:1em;
            justify-items:stretch;
            align-items:stretch;
        }
        .grid > div{
            background:#eee;
            padding:1em;
        }
        .grid > div:nth-child(odd){
            background:#ddd;
        }
        .grid > div:nth-child(even){
            background:green;
        }
        

        .box1{
            //align-self:start;
            grid-column:1/3;
            grid-row:1/3;
        }
        
        .box2{
            //align-self:end;
            grid-column:3;
            grid-row:1/3;
        }
        
        .box3{
            //justify-self:end;
            grid-column:2/4;
            grid-row:3;
        }
        
        .box4{
            grid-column:1;
            grid-row:2/4;
            border:2px solid #333;
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