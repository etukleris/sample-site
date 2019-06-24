<header class="header header-footer">
  <h1>Titlerooni, checking out the basics</h1>
  <nav>
    <div class="navbar">
      <a href="index.php">Home</a>
      <a href="photos.php">Photos</a>
      <div class="dropdown">
        <button class="dropbtn">CSS tests 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="csstest1.php">Css1</a>
          <a href="csstest2.php">Css2</a>
          <a href="csstest3.php">Css3</a>
          <a href="csstest4.php">Css4</a>
          <a href="csstest5.php">Css5</a>
          <a href="csstest6.php">Css6</a>
        </div>
      </div> 
    </div>
  </nav>
</header>

<footer class="footer header-footer">

  <script type="text/javascript"> 
    function display_c(){
      var refresh=1000; // Refresh rate in milli seconds
      mytime=setTimeout('display_ct()',refresh)
    }

    function display_ct() {
      var x = new Date();
      
      var month = x.getMonth()+1;
      if (month<10){month = '0'+month};
      var day = x.getDate();
      if (day<10){day = '0'+day};
      
      var hour = x.getHours();
      if (hour<10){hour='0'+hour};
      var minutes = x.getMinutes() ;
      if (minutes<10){minutes='0'+minutes};
      var seconds = x.getSeconds();
      if (seconds<10){seconds='0'+seconds};
      
      var x1="Your current local date & time is "  + x.getFullYear() + "-" + month + "-" + day; 
      x1 = x1 + ", " +  hour+ ":" +  minutes + ":" + seconds;
      document.getElementById('footer-time').innerHTML = x1;
      display_c();
     }
  </script>
  <p id="footer-time">Clock loading. Have a good day</p>
</footer>