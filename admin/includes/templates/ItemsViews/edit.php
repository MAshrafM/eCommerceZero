<?php
  // Check item id exists and is numeric
  $itemid = isset($_GET['tid']) && is_numeric($_GET['tid']) ? intval($_GET['tid']) : 0;
  // Get record from db
  $stmt = $db->prepare("SELECT * FROM items WHERE Item_ID = ?");
  $stmt->execute(array($itemid));
  $row = $stmt->fetch();
  $count = $stmt->rowCount();
  
  // if exists view edit page
  if($count > 0) {
?>

<h1 class="text-center">Edit item</h1>
<div class="container">
  <form class="form-horizontal" action="?v=Update" method="POST">
    <input type="hidden" name="itemid" value="<?php echo $itemid; ?>" />
    <!-- name field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control" autocomplete="off" required="required" value="<?php echo $row['Name']; ?>"/>
      </div>
    </div>
    <!-- Description field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea type="text" name="description" class="form-control" required="required"><?php echo $row['Description']; ?></textarea>
      </div>
    </div>
    <!-- Price field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Price</label>
      <div class="col-sm-10">
        <input type="text" name="price" class="form-control" required="required" value="<?php echo $row['Price']; ?>"/>
      </div>
    </div>
    <!-- Country field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Country</label>
      <div class="col-sm-10">
        <input type="text" name="country" class="form-control" required="required" value="<?php echo $row['Country_Made']; ?>"/>
      </div>
    </div>
    <!-- Status field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Status</label>
      <div class="col-sm-10">
        <select name="status">
          <option value="1" <?php echo $row['Status'] == "1" ? 'selected' : '' ; ?>>New</option>
          <option value="2" <?php echo $row['Status'] == "2" ? 'selected' : '' ; ?>>Like New</option>
          <option value="3" <?php echo $row['Status'] == "3" ? 'selected' : '' ; ?>>Used</option>
          <option value="4" <?php echo $row['Status'] == "4" ? 'selected' : '' ; ?>>Old</option>
        </select>
      </div>
    </div>
    <!-- Member field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Members</label>
      <div class="col-sm-10">
        <select name="member">
          <?php 
            $stmt = $db->prepare("SELECT UserID, Username from users");
            $stmt->execute();
            $users = $stmt->fetchAll();
            forEach($users as $user){
              echo "<option value='". $user['UserID'] . "'";
              echo $row['Member_ID'] == $user['UserID'] ? 'selected' : '';
              echo ">".$user['Username'] ."</option>";
            }
          ?>
        </select>
      </div>
    </div>
    <!-- Category field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Category</label>
      <div class="col-sm-10">
        <select name="category">
          <?php 
            $stmtc = $db->prepare("SELECT ID, Name from categories");
            $stmtc->execute();
            $categories = $stmtc->fetchAll();
            forEach($categories as $category){
              echo "<option value='". $category['ID'] ."'";
              echo $row['Cat_ID'] == $category['ID'] ? 'selected' : '';
              echo ">".$category['Name'] ."</option>";
            }
          ?>
        </select>
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
    $errorMsg = "<div class='alert alert-danger'>No Item with this id exists in the database.</div>";
    redirectLink($errorMsg);
  }
  
?>