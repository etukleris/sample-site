<!DOCTYPE html>
<html style="height:100%;">
<head>
    <link rel="icon" type="image/ico" href="favicon.ico" sizes="16x16" />
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
    <link rel="import" href="templates/header-and-footer.php">
</head>
<body onload=display_ct();style="min-height:100%;">
  <!--import header-->
  <script>
    var link = document.querySelector('link[rel=import]');
    var content = link.import.querySelector('.header');
    document.body.appendChild(document.importNode(content, true));
  </script>
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
  <script>
    var link = document.querySelector('link[rel=import]');
    var content = link.import.querySelector('.footer');
    document.body.appendChild(document.importNode(content, true));
  </script>
  
  <!-- footer-->
</body>
</html>