<?php
session_start();

?>

<!DOCTYPE html>



<head>
  <title>testsite </title>
  <style>
    body{
      background:url(https://i.imgur.com/MJAkxbh.png);
    }
    h2 {color: red;}
    .div-color-test > p{color: green;}
    .div-color-test > ul >li{color: blue;}
    .div-color-test > ul > .lasagna-li {color: orange;}
    
    p {
      font-size: 16px;
      font-family: monospace;
    }

    .thick-green-border {
      border-color: green;
      border-width: 10px;
      border-style: solid;
      border-radius: 50%;
    }

    .smaller-image {
      width: 100px;
    }
    .silver-background{
      background-color: silver;
    }
    .div-padding-test{
      border: 1px solid black;
      padding: 0px 0px 0px 0px;
      margin: 0px 0px  0px 0px;
     }
    .div-padding-test >p:first-child{
      padding: 5px 0px 0px 5px;
      margin: 1px 0px  0px 0px;
    }
    .div-padding-test > ul>li:first-child{
      background-color:purple;
    }
    .shadow-test{
      box-shadow: 2px 1px 1px 2px grey;
    }
    
    #cat-submit-input{
      height: 13px;
      padding: 5px 10px 8px 10px;
    }
    #cat-submit-button{
      border-radius: 5px;
      color: white;
      background-color: #0F5897;
      padding: 5px 10px 8px 10px;
    }

    #cat-submit-button:hover {
      animation-name: button-background-color;
      animation-duration: 500ms;
      animation-fill-mode: forwards;
    }
    @keyframes button-background-color {
      100% {
      background-color: #4791d0;
    }
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

  <h2>Somewhat default CatPhotoApp from freecodecamp</h2>
  <p>Testing basic html, css, some js, db connection etc </p>
  
  <?php 
    if (logged_in()) {
      echo "<p>You are currently logged in</p>";
    }
    else
    {
       echo "<p>You are currently logged out</p>";
    }
  ?>
 
  <main>
    <p>Click here to view more <a href="https://pixabay.com/images/search/cat/">cat photos</a>.</p>
    
    <a href="#"><img src="https://bit.ly/fcc-relaxing-cat" alt="A cute orange cat lying on its back." class="thick-green-border smaller-image shadow-test"></a>
    
    <div class="div-color-test silver-background div-padding-test">
      <p>Things cats love:</p>
      <ul id="ul-first-child-test">
        <li>cat nip</li>
        <li>laser pointers</li>
        <li class="lasagna-li">lasagna</li>
      </ul>
      <p>Top 3 things cats hate:</p>
      <ol>
        <li>flea treatment</li>
        <li>thunder</li>
        <li>other cats</li>
      </ol>
    </div>
    
    <form action="upload info/upload_image.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Want to add a cat? Choose what best defines it</legend>
        
        <input id="indoor-or-outdoor1" type="radio" name="indoor-outdoor" value="Indoor" checked>
        <label for="indoor-or-outdoor1">Indoor</label>
        <input id="indoor-or-outdoor2" type="radio" value="Outdoor" name="indoor-outdoor">
        <label for="indoor-or-outdoor2" >Outdoor</label><br>
        
        <input id="personality1" type="checkbox" name="personality[]" value="Loving" checked>
        <label for="personality1">Loving</label>
        <input id="personality2" type="checkbox" name="personality[]" value="Lazy">
        <label for="personality2">Lazy</label>
        <input id="personality3" type="checkbox" name="personality[]" value="Energetic">
        <label for="personality3">Energetic</label><br>
        <!--<input type="text" placeholder="cat photo URL" required id="cat-submit-input">-->
        
        <input type="text" placeholder="your username"  id="cat-submit-username" name="cat-submit-username" required>
        <input type="file" name="cat-image" accept="image/png,image/jpeg,image/gif" required>
        <button type="submit" id="cat-submit-button" name="submit">Submit</button>
      </fieldset>
    </form>
    
  </main>
  
  <!--import footer-->
  
  
  <?php 
  include_once("templates/footer.php");
  ?>
  <!-- footer-->

</body>