<?php
  // come from post request
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['user'];
    $password = $_POST['password'];
    $hashedPass = sha1($password);
    // check user exist
    $stmt = $db=>prepare("SELECT Username, Password FROM users WHERE Username = ? AND Password = ? AND GroupID = 1");
    $stmt->execute(array($username, $hashedPass));
    $count = $stmt->rowCount();
    // check count
    if ($count > 0){
      echo 'Welcome ' . $username;
    }
  }
?>

<form 
  class="login" 
  action="<?php echo $_SERVER['PHP_SELF'] ?>" 
  method="POST"
>
  <h4 class="text-center">
    Admin Login
  </h4>
  <input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off" />
  <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="new-password" />
  <input class="btn btn-primary btn-block" type="submit" value="login" />
</form>