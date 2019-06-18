<!DOCTYPE html>
<html>
<head>
    <title>CSS Grid test5</title>
    <style>
    
        .flex-test-container{
          display:flex;
          flex-wrap:wrap;
          align-content: flex-start;
          width:300px;
          height:300px;
          border-style:solid;
          border-widht:1px;
        }
        .flex-test-container > div:nth-child(odd){
            background:#ddd;
        }
        .flex-test-container > div:nth-child(even){
            background:green;
        }
        .box{
          width:100px;
          height:100px;
          
        }
        
        .nested-boxes{
          display:flex;
          flex-wrap:wrap;
          flex-direction:column;
          align-content:flex-start;
        }
        .box-within-a-box{
          //border: 1px black solid;
          width:20px;
          height:20px;
        }
        .box-within-a-box:nth-child(odd){
          background:blue;
        }
        .box-within-a-box:nth-child(even){
          background:yellow;
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
  <p>Testing out flexbox instead of grid</p>
  <main>
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
  <script>
    var link = document.querySelector('link[rel=import]');
    var content = link.import.querySelector('.footer');
    document.body.appendChild(document.importNode(content, true));
  </script>
  <!-- footer-->
</body>

</html>