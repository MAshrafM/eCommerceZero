<h1 class="text-center">Delete Item</h1>
<div class="container">
<?php
  // Check item id exists and is numeric
  $itemid = isset($_GET['tid']) && is_numeric($_GET['tid']) ? intval($_GET['tid']) : 0;
  $count = checkItem('Item_ID', 'items', $itemid);
  // if exists view edit page
  if($count > 0) {
    $stmt = $db->prepare("DELETE FROM items WHERE Item_ID = :itemid");
    $stmt->bindParam(":itemid", $itemid);
    $stmt->execute();
    $Msg = "<div class='alert alert-success'>Item Deleted</div>";
    redirectLink($Msg, 'back', 4);
  } else { 
    $errorMsg = "<div class='alert alert-danger'>No Item is found.</div>";
    redirectLink($errorMsg);
  } 
?>
</div>