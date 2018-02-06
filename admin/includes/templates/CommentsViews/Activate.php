<h1 class="text-center">Approve Comment</h1>
<div class="container">
<?php
  // Check comment id exists and is numeric
  $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;
  $count = checkItem('ComID', 'comments', $comid);
  // if exists view edit page
  if($count > 0) {
    $stmt = $db->prepare("UPDATE comments SET Status = 1 WHERE ComID = :comid");
    $stmt->bindParam(":comid", $comid);
    $stmt->execute();
    $Msg = "<div class='alert alert-success'>Comment Approved</div>";
    redirectLink($Msg, 'back', 4);
  } else { 
    $errorMsg = "<div class='alert alert-danger'>No Comment is found.</div>";
    redirectLink($errorMsg);
  } 
?>
</div>