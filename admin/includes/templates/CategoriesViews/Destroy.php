<h1 class="text-center">Delete Category</h1>
<div class="container">
<?php
  // Check user id exists and is numeric
  $catid = isset($_GET['cid']) && is_numeric($_GET['cid']) ? intval($_GET['cid']) : 0;
  $count = checkItem('ID', 'categories', $catid);
  // if exists view edit page
  if($count > 0) {
    $stmt = $db->prepare("DELETE FROM categories WHERE ID = :catid");
    $stmt->bindParam(":catid", $catid);
    $stmt->execute();
    $Msg = "<div class='alert alert-success'>Category Deleted</div>";
    redirectLink($Msg, 'back', 4);
  } else { 
    $errorMsg = "<div class='alert alert-danger'>No Category is found.</div>";
    redirectLink($errorMsg);
  } 
?>
</div>