<h1 class="text-center">Delete Member</h1>
<div class="container">
<?php
  // Check user id exists and is numeric
  $userid = isset($_GET['uid']) && is_numeric($_GET['uid']) ? intval($_GET['uid']) : 0;
  // Get record from db
  $stmt = $db->prepare("SELECT * FROM users WHERE UserID = ?");
  $stmt->execute(array($userid));
  $count = $stmt->rowCount();
  // if exists view edit page
  if($count > 0) {
    $stmt = $db->prepare("DELETE FROM users WHERE UserID = :userid");
    $stmt->bindParam(":userid", $userid);
    $stmt->execute();
?>
    <div class="alert alert-success">Member Deleted</div>
<?php 
  } else { 
    $errorMsg = "No Member is found.";
    redirectHome($errorMsg);
  } 
?>
</div>