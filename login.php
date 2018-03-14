<?php
  include 'init.php';
  if(isset($_SESSION['MemberName'])){
    header('Location: index.php');
    exit();
  }
  $pageTitle = 'Login';
  // come from post request
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['login'])){
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
    } elseif (isset($_POST['signup'])) {
      $formErrors = array();
      $username = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
      if(strlen($username)<4){$formErrors[] = 'Username must be larger than 4 chars'}
      $pass1 = sha1($_POST['password']);
      $pass2 = sha1($_POST['password2']);
      if($pass1 !== $pass2){$formErrors[] = 'Password does not match'}
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      if(filter_var($email, FILTER_VALIDATE_EMAIL) != true){$formErrors[] = 'The Email is not valid'}
      
      if(empty($formErrors)){
        $check = checkItem("Username", "users", $username);
        if($check == 1){
          $Msg = '<div class="alert alert-danger">Sorry this User already exists';
          redirectLink($Msg, 'back');
        } else {
          // Insert
          $u = $db->prepare("INSERT INTO users(Username, Password, Email, RegStatus, Date) VALUES (:user, :pass, :email, :fname, 0, now())");
          $u->execute(array(
              'user' => $username,
              'pass' => $pass1,
              'email' => $email,
          ));
          $Msg = "<div class='alert alert-sucess'> Recored Inserted </div>";
          redirectLink($Msg);
        }
      }
    }
    
  }
  
?>
<div class="container login-page">
  <h4 class="text-center">
    <span class="active" data-class="login">Login</span> | <span data-class="signup">Signup</span>
  </h4>
  <!-- Flash Errors -->
  <?php 
    if(!empty($formErrors)){
      
  ?>
    <div class="errors">
      <ul>
        <?php foreach($formErrors as $error) { ?>
          <li class="msg"><?php echo $error; ?></li>
        <?php } ?>
      </ul>
    </div>
  <?php
    }
  ?>
  <!-- Login Form -->
  <form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input class="form-control" type="text" name="user" placeholder="<?php echo lang('USERLOGIN'); ?>" autocomplete="off" />
    <input class="form-control" type="password" name="password" placeholder="<?php echo lang('PASSLOGIN'); ?>" autocomplete="new-password" />
    <input class="btn btn-primary btn-block" name="login" type="submit" value="<?php echo lang('LOGIN'); ?>" />
  </form>
  <!-- Signup Form -->
  <form class="signup" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input class="form-control" type="text" name="user" placeholder="<?php echo lang('USERLOGIN'); ?>" autocomplete="off" required />
    <input class="form-control" type="password" name="password" placeholder="<?php echo lang('PASSLOGIN'); ?>" autocomplete="new-password" required />
    <input class="form-control" type="password" name="password2" placeholder="Repeat <?php echo lang('PASSLOGIN'); ?>" autocomplete="new-password" required />
    <input class="form-control" type="email" name="email" placeholder="<?php echo lang('EMAIL'); ?>" autocomplete="new-password" required />
    <input class="btn btn-success btn-block" name="signup" type="submit" value="Signup" />
  </form> 
  
</div>
<?php include $tpl."footer.php"; ?>