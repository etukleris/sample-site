<?php
function userExists($username, $con){
  $stmt = $con->prepare("SELECT uidUsers FROM users WHERE uidUsers = ?");
  $stmt->bind_param("s", $username);
  if($stmt->execute())
  {
      $stmt->bind_result($uidUsers);
      $stmt->store_result();
      $stmt->fetch();          
      if($stmt->num_rows > 0)
      {
          return 1;
      }
      else return 0;
  } else return -1; //sql error
}



function emailOrUserExists($emailOrId, $con){
  $stmt = $con->prepare("SELECT uidUsers, emailUsers FROM users WHERE emailUsers = ? or uidUsers = ?");
  $stmt->bind_param("ss", $emailOrId, $emailOrId);
  if($stmt->execute())
  {
      $stmt->bind_result($uidUsers, $emailUsers);
      $stmt->store_result();
      $stmt->fetch();          
      if($stmt->num_rows > 0)
      {
          return 1;
      }
      else return 0;
  } else return -1;
}

function logged_in () {
  if (isset($_SESSION['userId']) && isset($_SESSION['userUid'])) 
  {
    return true;
  } 
  else 
  {
    return false;
  }
}

?>