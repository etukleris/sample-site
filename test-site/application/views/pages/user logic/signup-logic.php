<?php

if(isset($_POST['signup-submit'])){
  include('../dbconfig.php');
  include('functions.php');
  
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
      header("Location: ../signup.php?error=nodata&uid=".$username."&email=".$email);
      exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
      header("Location: ../signup.php?error=invalidusername&email=".$email);
      exit();
      
    }
    else if ($password != $passwordRepeat){
      header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
      exit();
      
    }
    else {
      $userStatus = userExists($username, $con);
      $mailStatus = emailExists($email, $con);
      if ($userStatus >0) {
        header("Location: ../signup.php?error=userexists&email=".$email);
        exit();
        
      }
      else if ($mailStatus >0){
        header("Location: ../signup.php?error=emailexists&uid=".$username);
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
            echo "<script>
            alert('User has been created');
            window.location.href='../login.php?creation=success';
            </script>";
            
          }
          else{
            echo "<script>
            alert('Failed to create a user');
            window.location.href='../signup.php';
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