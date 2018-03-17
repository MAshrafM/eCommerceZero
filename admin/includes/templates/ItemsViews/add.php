<h1 class="text-center">Add Item</h1>
<div class="container">
  <form class="form-horizontal" action="?v=Insert" method="POST">
    <!-- name field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control" autocomplete="off" required="required" />
      </div>
    </div>
    <!-- Description field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea type="text" name="description" class="form-control" required="required"></textarea>
      </div>
    </div>
    <!-- Price field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Price</label>
      <div class="col-sm-10">
        <input type="text" name="price" class="form-control" required="required" />
      </div>
    </div>
    <!-- Country field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Country</label>
      <div class="col-sm-10">
        <input type="text" name="country" class="form-control" required="required" />
      </div>
    </div>
    <!-- Status field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Status</label>
      <div class="col-sm-10">
        <select name="status">
          <option value="0">...</option>
          <option value="1">New</option>
          <option value="2">Like New</option>
          <option value="3">Used</option>
          <option value="4">Old</option>
        </select>
      </div>
    </div>
    <!-- Member field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Members</label>
      <div class="col-sm-10">
        <select name="member">
          <option value="0">...</option>
          <?php 
            $stmt = $db->prepare("SELECT UserID, Username from users");
            $stmt->execute();
            $users = $stmt->fetchAll();
            forEach($users as $user){
              echo "<option value=". $user['UserID'] .">".$user['Username'] ."</option>";
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
          <option value="0">...</option>
          <?php 
            $stmtc = $db->prepare("SELECT ID, Name from categories");
            $stmtc->execute();
            $categories = $stmtc->fetchAll();
            forEach($categories as $category){
              echo "<option value=". $category['ID'] .">".$category['Name'] ."</option>";
            }
          ?>
        </select>
      </div>
    </div>
    <!-- submit field -->
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="Add Item" class="btn btn-primary" />
      </div>
    </div>
  </form>
</div>