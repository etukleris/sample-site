<?php

if(isset($_POST['signup-submit'])){
  include('dbconfig.php');
  session_start();
  if (!$con) {
    die('Could not connect: ' . $con->connect_error);
  }
  else {
  
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
      
    //should check if everything is actually correct and not forged.
    //i.e. name length, legitimate name, same passwords, legit email.
    //Only doing basic check for learning purposes
    if (empty($username) || empty($password)  || empty($email)){
      header("Location: signup?error=nodata&uid=".$username."&email=".$email);
      exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
      header("Location: signup?error=invalidusername&email=".$email);
      exit();
      
    }
    else if ($password != $passwordRepeat){
      header("Location: signup?error=passwordcheck&uid=".$username."&email=".$email);
      exit();
      
    }
    else {
      $userStatus = userExists($username, $con);
      $mailStatus = emailExists($email, $con);
      if ($userStatus >0) {
        header("Location: signup?error=userexists&email=".$email);
        exit();
        
      }
      else if ($mailStatus >0){
        header("Location: signup?error=emailexists&uid=".$username);
        exit();
      }
      else
      {
        $null = 'NULL';
        $timestamp = date('Y-m-d H:i:s');
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $con->prepare("INSERT INTO users (idUsers, uidUsers, pwdUsers, emailUsers, timeCreated) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $null, $username, $hashedPwd, $email, $timestamp);

        $success = $stmt->execute();
        if($success)
          {
            $stmt = $con->prepare("SELECT idUsers, uidUsers, emailUsers, pwdUsers, timeCreated FROM users WHERE uidUsers = ?");
            $stmt->bind_param("s" , $username);
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
          
        
              session_start();
              $_SESSION['userId'] = $resultUsername;
              $_SESSION['userUid'] = $resultUserID;
              $_SESSION['userCreationDate'] = $resultUserCreationDate;
            
              
              header("Location: index?login=success");
              exit();
       
            }
       
          }
          else{
            echo "<script>
            alert('Failed to create a user');
            window.location.href='signup';
            </script>";
          }
        
            

      }

    }
      
    mysqli_close($con);
  }
  
}
else 
{
  header("Location: ../signup.php");
  exit();
}
?>