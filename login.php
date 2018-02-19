<?php
  include 'init.php';
  if(isset($_SESSION['MemberName'])){
    header('Location: index.php');
    exit();
  }
  $pageTitle = 'Login';
  // come from post request
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['user'];
    $password = $_POST['password'];
    $hashedPass = sha1($password);
    // check user exist
    $stmt = $db->prepare("SELECT UserID, Username, Password FROM users WHERE Username = ? AND Password = ?");
    $stmt->execute(array($username, $hashedPass));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
    // check count
    if ($count > 0){
      echo "found";
      $_SESSION['MemberName'] = $username;
      header('Location: index.php');
      exit();
    }
  }
  
?>
<div class="container login-page">
  <h4 class="text-center">
    <span class="active" data-class="login">Login</span> | <span data-class="signup">Signup</span>
  </h4>
  <!-- Login Form -->
  <form class="login">
    <input class="form-control" type="text" name="user" placeholder="<?php echo lang('USERLOGIN'); ?>" autocomplete="off" />
    <input class="form-control" type="password" name="password" placeholder="<?php echo lang('PASSLOGIN'); ?>" autocomplete="new-password" />
    <input class="btn btn-primary btn-block" type="submit" value="<?php echo lang('LOGIN'); ?>" />
  </form>
  <!-- Signup Form -->
  <form class="signup">
    <input class="form-control" type="text" name="user" placeholder="<?php echo lang('USERLOGIN'); ?>" autocomplete="off" />
    <input class="form-control" type="password" name="password" placeholder="<?php echo lang('PASSLOGIN'); ?>" autocomplete="new-password" />
    <input class="form-control" type="password" name="password2" placeholder="Repeat <?php echo lang('PASSLOGIN'); ?>" autocomplete="new-password" />
    <input class="form-control" type="email" name="email" placeholder="<?php echo lang('EMAIL'); ?>" autocomplete="new-password" />
    <input class="btn btn-success btn-block" type="submit" value="Signup" />
  </form> 
  
</div>
<?php include $tpl."footer.php"; ?>