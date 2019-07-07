<?php

if(isset($_POST['submit'])){
  include('../dbconfig.php');
  if (!$con) {
    die('Could not connect: ' . $con->connect_error);
  }
  else{
    if (isset($_POST['submit'])) {

      //check if file is an image
      $type = $_FILES['profile-image']['type'];
      $allowedTypes = array("image/png", "image/jpeg", "image/gif");
      if (!in_array($type,$allowedTypes))
      {
        echo "<script>
        alert('File was not an image');
        window.location.href='../user-profile-page.php';
        </script>";
        exit;
      }
      
      //check if file exists, if it does, rename it
      $filename = pathinfo($_FILES['profile-image']['name'], PATHINFO_FILENAME);
      $fileextension = pathinfo($_FILES['profile-image']['name'], PATHINFO_EXTENSION);

      $increment = ''; //start with no suffix

      while(file_exists('../../profile-pictures/'.$filename . $increment . '.' . $fileextension)) {
          $increment++;
      }
      $basefilename = $filename . $increment . '.' . $fileextension;
      
      $updateUidUsers = $_POST['userUid'];
      $stmt = $con->prepare("UPDATE users SET imageUser = ? where idUsers = ?");
      $stmt->bind_param("ss",$basefilename, $updateUidUsers);

      $success = $stmt->execute();
      
      
      if($success)
      {
        move_uploaded_file($_FILES['profile-image']['tmp_name'], "../../profile-pictures/$basefilename");
        echo "<script>
        alert('profile picture has been updated');
        window.location.href='../index.php';
        </script>";
        
      }
      else{
        echo "<script>
        alert('Image was not updated');
        window.location.href='../index.php';
        </script>";
      }
    }
    
    mysqli_close($con);
  }
    
  } 
  else
  {
    header("Location: ../index.php");
    exit();
}
?>
