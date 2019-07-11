<?php

if(isset($_POST['submit'])){
  include('dbconfig.php');
  if (!$con) {
    die('Could not connect: ' . $con->connect_error);
  }
  else{
    if (isset($_POST['submit'])) {

      //check if file is an image
      $type = $_FILES['cat-image']['type'];
      $allowedTypes = array("image/png", "image/jpeg", "image/gif");
      if (!in_array($type,$allowedTypes))
      {
        echo "<script>
        alert('File was not an image');
        window.location.href='index';
        </script>";
        exit;
      }
      
      //check if file exists, if it does, rename it
      $filename = pathinfo($_FILES['cat-image']['name'], PATHINFO_FILENAME);
      $fileextension = pathinfo($_FILES['cat-image']['name'], PATHINFO_EXTENSION);

      $increment = ''; //start with no suffix

      while(file_exists(FCPATH.'public/pictures/uploaded-pictures/'.$filename . $increment . '.' . $fileextension)) {
          $increment++;
      }
      $basefilename = $filename . $increment . '.' . $fileextension;
      
      $username = $_POST['cat-submit-username'];
      $cattype = $_POST['indoor-outdoor'];
      if (!$_POST['personality']){
        $catcharacteristics = 'NULL';
      }
      else {
        $catcharacteristics = implode(",", $_POST['personality']);
      }
      $timestamp = date('Y-m-d H:i:s');
      $null = 'NULL';
      
      $stmt = $con->prepare("INSERT INTO pictures (id, dateadded, useradded, imagename, cattype, catcharacteristics) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("isssss", $null, $timestamp, $username, $basefilename, $cattype, $catcharacteristics);

      $success = $stmt->execute();
      
      
      if($success)
      {
        move_uploaded_file($_FILES['cat-image']['tmp_name'], FCPATH."public/pictures/uploaded-pictures/$basefilename");
        echo "<p>Image has been uploaded</p>";
        echo "<script>
        alert('image has been uploaded');
        </script>";
        header("Location: ".base_url()."index");
      }
      else{
        echo "<script>
        alert('Image was not uploaded');
        </script>";
        header("Location: index?login=success");
      }
    }
    
    mysqli_close($con);
  }
    
  } 
  else
  {
    header("Location: index");
    exit();
  }
  ?>
