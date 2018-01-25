<?php
  // Check user id exists and is numeric
  $catid = isset($_GET['cid']) && is_numeric($_GET['cid']) ? intval($_GET['cid']) : 0;
  // Get record from db
  $stmt = $db->prepare("SELECT * FROM categories WHERE ID = ?");
  $stmt->execute(array($catid));
  $row = $stmt->fetch();
  $count = $stmt->rowCount();
  
  // if exists view edit page
  if($count > 0) {
?>

<h1 class="text-center">Edit Category</h1>
<div class="container">
  <form class="form-horizontal" action="?v=Update" method="POST">
    <input type="hidden" name="catid" value="<?php echo $catid; ?>" />
    <!-- name field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control" autocomplete="off" required="required" value="<?php echo $row['Name']; ?>" />
      </div>
    </div>
    <!-- Description field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea type="text" name="description" class="form-control"><?php echo $row['Description']; ?></textarea>
      </div>
    </div>
    <!-- Ordering field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Ordering</label>
      <div class="col-sm-10">
        <input type="text" name="ordering" class="form-control" value="<?php echo $row['Ordering']; ?>"/>
      </div>
    </div>
    <!-- Visible field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Visible</label>
      <div class="col-sm-10">
        <div>
          <input id="vis-yes" type="radio" name="visible" value="0" <?php echo $row['Visibility'] == '0' ? 'checked' : ''; ?> />
          <label for="vis-yes">Yes</label>
        </div>
        <div>
          <input id="vis-no" type="radio" name="visible" value="1" <?php echo $row['Visibility'] == '1' ? 'checked' : ''; ?>/>
          <label for="vis-no">No</label>
        </div>
      </div>
    </div> 
    <!-- Visible field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Allow Comments</label>
      <div class="col-sm-10">
        <div>
          <input id="com-yes" type="radio" name="commenting" value="0" <?php echo $row['Allow_Comment'] == '0' ? 'checked' : ''; ?> />
          <label for="com-yes">Yes</label>
        </div>
        <div>
          <input id="com-no" type="radio" name="commenting" value="1" <?php echo $row['Allow_Comment'] == '1' ? 'checked' : ''; ?>/>
          <label for="com-no">No</label>
        </div>
      </div>
    </div>  
    <!-- Visible field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Allow Ads</label>
      <div class="col-sm-10">
        <div>
          <input id="ads-yes" type="radio" name="ads" value="0" <?php echo $row['Allow_Ads'] == '0' ? 'checked' : ''; ?> />
          <label for="ads-yes">Yes</label>
        </div>
        <div>
          <input id="ads-no" type="radio" name="ads" value="1" <?php echo $row['Allow_Ads'] == '1' ? 'checked' : ''; ?>/>
          <label for="ads-no">No</label>
        </div>
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
    $errorMsg = "<div class='alert alert-danger'>No Category with this id exists in the database.</div>";
    redirectLink($errorMsg);
  }
  
?>