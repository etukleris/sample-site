<?php

if (isset($_POST['login-submit'])){
  include('../dbconfig.php');
  include('functions.php');
  if (!$con) {
    die('Could not connect: ' . $con->connect_error);
  }
  else {
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    
    if (empty($mailuid) || empty($password)){
      header("Location: ../login.php?error=nodata&mailuid=".$mailuid);
      exit();
    }
    else{
      if (emailOrUserExists($mailuid, $con)>0){
        
        $stmt = $con->prepare("SELECT idUsers, uidUsers, emailUsers, pwdUsers FROM users WHERE uidUsers = ? or emailUsers = ?");
        $stmt->bind_param("ss", $mailuid, $mailuid);
        if($stmt->execute())
        {
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
            
            $arr[] =$row;
            
          }
          $resultEmail = $arr[0]['emailUsers'];
          $resultUsername = $arr[0]['uidUsers'];
          $resultPwd = $arr[0]['pwdUsers'];
          $resultUserID = $arr[0]['idUsers'];
          
          $pwdCheck = password_verify($password, $resultPwd);
          
          if(!$pwdCheck){
            header("Location: ../login.php?error=wrongpwd&mailuid=".$mailuid);
            exit();
            
          }
          else if ($pwdCheck == True)
          {
            session_start();
            $_SESSION['userId'] = $resultUsername;
            $_SESSION['userUid'] = $resultUserID;
            
            header("Location: ../index.php?login=success");
            exit();
            
          }
          else
          {
            header("Location: ../login.php?error=wrongpwd");
            exit();
            
          }

        }
        else 
        {
          header("Location: ../login.php?error=nouser");
          exit();
        }
      }
     else{
          echo "<script>
          alert('User does not exist');
          window.location.href='../login.php';
          </script>";
        }
      
    }
    
    
  }
  
}

else 
{
  header("Location: ../index.php");
  exit();
  
}

?>