<!DOCTYPE html>
<html>
<head>
    <title>CSS Grid test2</title>
    <style>
        .grid{
            display:grid;
            //grid-template-columns:1fr 1fr 1fr;
            grid-template-columns:repeat(3, 1fr);
            grid-gap:1em;
            grid-auto-rows:minmax(100px,auto);
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
        
        .nested{
            display:grid;
            grid-template-columns:repeat(3, 1fr);
            grid-auto-rows: 70px;
            grid-gap: 1em;
        }
        .nested > div{
            border:#333 1px solid;
            padding:1em;
        }
    </style>
    <link href="../css/header-and-footer.css" rel="stylesheet">
    <link rel="import" href="templates/header-and-footer.php">
</head>
<body onload=display_ct();>
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
  <script>
    var link = document.querySelector('link[rel=import]');
    var content = link.import.querySelector('.footer');
    document.body.appendChild(document.importNode(content, true));
  </script>
  <!-- footer-->
</body>

</html>