<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $username = $_POST['username'];
    $full = $_POST['FullName'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $hashPass = sha1($pass);
    //Files
    $avatar = $_FILES['avatar'];
    $avatarName = $avatar['name'];
    $avatarSize = $avatar['size'];
    $avatarTemp = $avatar['tmp_name'];
    $avatarType = $avatar['type'];
    $avatarExt = strtolower(end(explode('.', $avatarName)));
    $avatarExtensions = array("jpeg", "jpg", "png", "gif");
    
    // validate form
    $formErrors = array();
    if(empty($username)){$formErrors[] = 'Username can not be empty';}
    if(empty($full)){$formErrors[] = 'Full Name can not be empty';}
    if(empty($email)){$formErrors[] = 'Email can not be empty';}
    if(empty($pass)){$formErrors[] = 'Password can not be empty';}
    if(strlen($username) < 4){$formErrors[] = 'Username must be larger than 4 characters';}
    if(strlen($username) > 20){$formErrors[] = 'Username must be less than 20 characters';}
    if(!in_array($avatarExt, $avatarExtensions)){
      $formErrors[] = $avatarExt . 'This extension is not allowed';
    }
    if($avatarSize > 4194305){
      $formErrors[] = $avatarSize . 'This size is not allowed';
    }
?>
<div class="container">
  <h1 class="text-center">Update Member</h1>
  <?php 
    if(empty($formErrors)){
      // check if user exists in db
      $check = checkItem("Username", "users", $username);
      if ($check == 1){
        $errorCheck = "<div class='alert alert-danger'>User Already Exists in db.</div>";
        redirectLink($errorCheck, 6);
      } else {    
        // Insert Member
        $pic = rand(0, 100000) . '_' . $avatarName;
        move_uploaded_file($avatarTemp, "uploads\avatars\\" . $pic );
        $stmt = $db->prepare("INSERT INTO users(Username, Password, Email, FullName, Avatar, RegStatus, Date) VALUES(:user, :pass, :email, :fname, :avatar, 1, now()) ");
        $stmt->execute(array(
          'user' => $username,
          'pass' => $hashPass,
          'email' => $email,
          'fname' => $full,
          'avatar' => $pic
        ));
        $Msg = "<div class='alert alert-success'>Member Added</div>";
        redirectLink($Msg, 'back', 4);
      }
    } else {
    // Show Errors
  ?>
    <div class="alert alert-danger">
      <ul>
      <?php foreach($formErrors as $error) { ?>
        <li><?php echo $error; ?></li>
      <?php } ?>
      </ul>
    </div>
  <?php
    }
  ?>
</div>
<?php 
  } else {
    $errorMsg = "<div class='alert alert-danger'>You Can not Brows This Page Directly.</div>";
    redirectLink($errorMsg, 6);
  }
?>
