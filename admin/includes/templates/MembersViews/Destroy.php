<h1 class="text-center">Delete Member</h1>
<div class="container">
<?php
  // Check user id exists and is numeric
  $userid = isset($_GET['uid']) && is_numeric($_GET['uid']) ? intval($_GET['uid']) : 0;
  $count = checkItem('userid', 'users', $userid);
  // if exists view edit page
  if($count > 0) {
    $stmt = $db->prepare("DELETE FROM users WHERE UserID = :userid");
    $stmt->bindParam(":userid", $userid);
    $stmt->execute();
    $Msg = "<div class='alert alert-success'>Member Deleted</div>";
    redirectLink($Msg, 'back', 4);
  } else { 
    $errorMsg = "<div class='alert alert-danger'>No Member is found.</div>";
    redirectLink($errorMsg);
  } 
?>
</div>