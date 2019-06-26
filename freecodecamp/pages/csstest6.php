<!DOCTYPE html>
<html>
<head>
    <title>CSS Grid test6</title>
    <style>
    
        .grid-test-container{
          display:grid;
          width:300px;
          height:600px;
          grid-template-columns: 1fr 1fr 1fr;
          grid-template-rows: 1fr 1fr 1fr;
          border-style:solid;
          border-widht:1px;
          grid-template-areas: 
            "header header header"
            ". main ."
            "footer footer footer";
        }
        .grid-test-container > div:nth-child(odd){
            background:#ddd;
        }
        .grid-test-container > div:nth-child(even){
            background:green;
        }
        .box{
          //width:100px;
          text-align:center;
         
          
          height:100px;
         
        }
        .box p{
          vertical-align: middle;
          margin:0px;
          padding:0px;
          height:100%;
        }
        
        .box1{
          grid-area: header;
          
        }
        .box-main{
          grid-area:main;
       
        }
        .box6{
          grid-area:footer;
        }
        .nested-boxes{
          display:flex;
          flex-wrap:wrap;
          flex-direction:column;
          align-content:flex-start;
        }
        .box-within-a-box{
     
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
</head>
<body onload=display_ct();>
  <!--import header-->
  <?php 
  include_once("templates/header.php");
  ?>
  <!-- header-->
  <br>
  <p>Testing out grid template areas</p>
  <main>
    <div class="grid-test-container">
      <div class="box box1 box-header">
        <p>header </p>
      </div>
      <div class="box-main">
        <div class="box box2">
          <p>main1 </p>
        </div>
        <div class="box box3">
          <p>main2 </p>
        </div>
        <div class="box box4">
          <p>main3  </p>
        </div>
        <div class="box box5">
          <p>main4  </p>
        </div>
      </div>
      <div class="box nested-boxes box6">
      
        <?php for ($i = 0; $i<12; $i++) {
          echo '<div class="box-within-a-box"> </div>';
        }
        ?>
        <p>footer</p>
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