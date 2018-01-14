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
      // Insert Member
  ?>
    <div class="alert alert-success">Member Added</div>
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
