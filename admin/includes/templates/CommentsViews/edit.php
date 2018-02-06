<?php
  // Check comment id exists and is numeric
  $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;
  // Get record from db
  $stmt = $db->prepare("SELECT * FROM comments WHERE ComID = ?");
  $stmt->execute(array($comid));
  $row = $stmt->fetch();
  $count = $stmt->rowCount();
  
  // if exists view edit page
  if($count > 0) {
?>

<h1 class="text-center">Edit comment</h1>
<div class="container">
  <form class="form-horizontal" action="?v=Update" method="POST">
    <input type="hidden" name="comid" value="<?php echo $comid; ?>" />
    <!-- Comment field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Comment</label>
      <div class="col-sm-10">
        <textarea type="text" name="comment" class="form-control" required="required"><?php echo $row['Comment']; ?></textarea>
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
    $errorMsg = "<div class='alert alert-danger'>No comment with this id exists in the database.</div>";
    redirectLink($errorMsg);
  }
  
?>