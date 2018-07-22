<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $id = $_POST['userid'];
    $username = $_POST['username'];
    $full = $_POST['FullName'];
    $email = $_POST['email'];
    empty($_POST['newpassword']) ? $pass = $_POST['oldpassword'] : $pass = sha1($_POST['newpassword']);
    $avatar = $_FILES['avatar'] ? $_FILES['avatar'] : NULL;
    if($avatar){
      $avatarName = $avatar['name'];
      $avatarSize = $avatar['size'];
      $avatarTemp = $avatar['tmp_name'];
      $avatarType = $avatar['type'];
      $avatarExt = strtolower(end(explode('.', $avatarName)));
      $avatarExtensions = array("jpeg", "jpg", "png", "gif");
    }
    // validate form
    $formErrors = array();
    if(empty($username)){$formErrors[] = 'Username can not be empty';}
    if(empty($full)){$formErrors[] = 'Full Name can not be empty';}
    if(empty($email)){$formErrors[] = 'Email can not be empty';}
    if(strlen($username) < 4){$formErrors[] = 'Username must be larger than 4 characters';}
    if(strlen($username) > 20){$formErrors[] = 'Username must be less than 20 characters';}
    if($avatar){
      if(!in_array($avatarExt, $avatarExtensions)){
        $formErrors[] = $avatarExt . 'This extension is not allowed';
      }
      if($avatarSize > 4194305){
        $formErrors[] = $avatarSize . 'This size is not allowed';
      }
    }
?>
<div class="container">
  <h1 class="text-center">Update Member</h1>
  <?php 
    if(empty($formErrors)){
      // check unique name
      $checkName = $db->prepare("SELECT * FROM users WHERE Username = ? AND UserID != ?");
      $checkName->execute(array($username, $id));
      $checkNameResult = $checkName->fetch();
      if($checkNameResult == 1) {
        $Msg = "<div class='alert alert-danger'>Member Exists in Database</div>";
        redirectLink($Msg, 'back', 4);
      } else {
        if($avatar){
          $pic = rand(0, 100000) . '_' . $avatarName;
          move_uploaded_file($avatarTemp, "uploads\avatars\\" . $pic );
          // update query
          $stmt = $db->prepare("UPDATE users SET Username = ?, Email = ?, FullName = ?, Password = ?, Avatar = ? WHERE UserID = ?");
          $stmt->execute(array($username, $email, $full, $pass, $pic, $id));
        } else {
          // update query
          $stmt = $db->prepare("UPDATE users SET Username = ?, Email = ?, FullName = ?, Password = ? WHERE UserID = ?");
          $stmt->execute(array($username, $email, $full, $pass, $id));
        }
         
        $Msg = "<div class='alert alert-success'>Member Updated</div>";
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
    $errorMsg = "<div class='alert alert-danger'>You Can not Browse This Page Directly.</div>";
    redirectLink($errorMsg, 6);
  }
?>
