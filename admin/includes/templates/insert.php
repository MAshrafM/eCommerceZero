<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $username = $_POST['username'];
    $full = $_POST['FullName'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $hashPass = sha1($pass);
    // validate form
    $formErrors = array();
    if(empty($username)){$formErrors[] = 'Username can not be empty';}
    if(empty($full)){$formErrors[] = 'Full Name can not be empty';}
    if(empty($email)){$formErrors[] = 'Email can not be empty';}
    if(empty($pass)){$formErrors[] = 'Password can not be empty';}
    if(strlen($username) < 4){$formErrors[] = 'Username must be larger than 4 characters';}
    if(strlen($username) > 20){$formErrors[] = 'Username must be less than 20 characters';}
?>
<div class="container">
  <h1 class="text-center">Update Member</h1>
  <?php 
    if(empty($formErrors)){
      // check if user exists in db
      $check = checkItem("Username", "users", $username);
      if ($check == 1){
        $errorCheck = "User Already Exists in db.";
        redirectLink($errorCheck, 6);
      } else {    
        // Insert Member
        $stmt = $db->prepare("INSERT INTO users(Username, Password, Email, FullName) VALUES(:user, :pass, :email, :fname) ");
        $stmt->execute(array(
          'user' => $username,
          'pass' => $hashPass,
          'email' => $email,
          'fname' => $full
        ));
        $Msg = "<div class='alert alert-success'>Member Added</div>"
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
    $errorMsg = "You Can not Brows This Page Directly.";
    redirectLink($errorMsg, 6);
  }
?>
