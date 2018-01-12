<?php
  // Check user id exists and is numeric
  $userid = isset($_GET['uid']) && is_numeric($_GET['uid']) ? intval($_GET['uid']) : 0;
  // Get record from db
  $stmt = $db->prepare("SELECT * FROM users WHERE UserID = ?");
  $stmt->execute(array($userid));
  $row = $stmt->fetch();
  $count = $stmt->rowCount();
  // if exists view edit page
  if($count > 0) {
?>

<h1 class="text-center"><?php echo lang('EDIT').' '.lang('MEMBERS'); ?></h1>
<div class="container">
  <form class="form-horizontal">
    <!-- username field -->
    <div class="form-group">
      <label class="col-sm-2 control-label"><?php echo lang('USERLOGIN'); ?></label>
      <div class="col-sm-10">
        <input type="text" name="username" class="form-control" autocomplete="off" value=<?php echo $row['Username']; ?> />
      </div>
    </div>
    <!-- fullname field -->
    <div class="form-group">
      <label class="col-sm-2 control-label"><?php echo lang('FULLNAME'); ?></label>
      <div class="col-sm-10">
        <input type="text" name="FullName" class="form-control" value=<?php echo $row['FullName']; ?> />
      </div>
    </div>
    <!-- Email field -->
    <div class="form-group">
      <label class="col-sm-2 control-label"><?php echo lang('EMAIL'); ?></label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" value=<?php echo $row['Email']; ?> />
      </div>
    </div>
    <!-- password field -->
    <div class="form-group">
      <label class="col-sm-2 control-label"><?php echo lang('PASSLOGIN'); ?></label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control" autocomplete="new-password" />
      </div>
    </div>   
    <!-- submit field -->
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="<?php echo lang('SAVE'); ?>" class="btn btn-primary" />
      </div>
    </div>
  </form>
</div>
<?php 
  } else {
    // Handle Error
    header("Location: index.php");
    exit();
  }
  
?>