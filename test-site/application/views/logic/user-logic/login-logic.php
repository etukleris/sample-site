<?php

if (isset($_POST['login-submit'])){
  include('dbconfig.php');

  if (!$con) {
    die('Could not connect: ' . $con->connect_error);
  }
  else {
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    
    if (empty($mailuid) || empty($password)){
      header("Location: login?error=nodata&mailuid=".$mailuid);
      exit();
    }
    else{
      if (emailOrUserExists($mailuid, $con)>0){
        
        $stmt = $con->prepare("SELECT idUsers, uidUsers, emailUsers, pwdUsers, timeCreated FROM users WHERE uidUsers = ? or emailUsers = ?");
        $stmt->bind_param("ss", $mailuid, $mailuid);
        if($stmt->execute())
        {
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
            
            $arr[] = $row;
            
          }
          $resultEmail = $arr[0]['emailUsers'];
          $resultUsername = $arr[0]['uidUsers'];
          $resultPwd = $arr[0]['pwdUsers'];
          $resultUserID = $arr[0]['idUsers'];
          $resultUserCreationDate = $arr[0]['timeCreated'];
          
          $pwdCheck = password_verify($password, $resultPwd);
          
          if(!$pwdCheck){
            header("Location: login?error=wrongpwd&mailuid=".$mailuid);
            exit();
            
          }
          else if ($pwdCheck == True)
          {
            session_start();
            $_SESSION['userId'] = $resultUsername;
            $_SESSION['userUid'] = $resultUserID;
            $_SESSION['userCreationDate'] = $resultUserCreationDate;
            
            header("Location: index?login=success");
            exit();
            
          }
          else
          {
            header("Location: login?error=wrongpwd");
            exit();
            
          }

        }
        else 
        {
          header("Location: login?error=nouser");
          exit();
        }
      }
     else{
          echo "<script>
          alert('User does not exist');
          window.location.href='login';
          </script>";
        }
      
    }
    
    
  }
  
}

else 
{
  header("Location: index");
  exit();
  
}

?>