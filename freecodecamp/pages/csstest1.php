<!DOCTYPE html>
<html>
<head>

    <title>CSS Grid test</title>
    <style>
        .grid{
            display:grid;
            grid-template-columns: 70% 30%;
            //grid-column-gap:1em;
            //grid-row-gap:1em;
            grid-gap:1em;
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
            margin-right: 16px;
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