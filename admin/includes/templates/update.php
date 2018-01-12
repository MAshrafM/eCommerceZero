<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $id = $_POST['userid'];
    $username = $_POST['username'];
    $full = $_POST['FullName'];
    $email = $_POST['email'];
    empty($_POST['newpassword']) ? $pass = $_POST['oldpassword'] : $pass = sha1($_POST['newpassword']);
    // validate form
    $formErrors = array();
    if(empty($username)){$formErrors[] = 'Username can not be empty';}
    if(empty($full)){$formErrors[] = 'Full Name can not be empty';}
    if(empty($email)){$formErrors[] = 'Email can not be empty';}
    if(strlen($username) < 4){$formErrors[] = 'Username must be larger than 4 characters';}
    if(strlen($username) > 20){$formErrors[] = 'Username must be less than 20 characters';}
?>
<div class="container">
  <h1 class="text-center">Update Member</h1>
  <?php 
    if(empty($formErrors)){
      // update query
      $stmt = $db->prepare("UPDATE users SET Username = ?, Email = ?, FullName = ?, Password = ? WHERE UserID = ?");
      $stmt->execute(array($username, $email, $full, $pass, $id)); 
  ?>
    <div class="alert alert-success">Member Updated</div>
  <?php
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
  }
?>
