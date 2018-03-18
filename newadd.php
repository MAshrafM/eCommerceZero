<?php
  $pageTitle = 'Create New Item';
  include "init.php";
  
  if(isset($_SESSION['user'])){
?>
<h1 class="text-center"> <?php echo $pageTitle; ?> </h1>
<div class="create-ad block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <?php echo $pageTitle; ?>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-8">
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <!-- name field -->
              <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control live-pre" autocomplete="off" data-class=".live-title" required="required" />
                </div>
              </div>
              <!-- Description field -->
              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea type="text" name="description" class="form-control live-pre" data-class=".live-desc" required="required"></textarea>
                </div>
              </div>
              <!-- Price field -->
              <div class="form-group">
                <label class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" name="price" class="form-control live-pre" data-class=".live-price" required="required" />
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
          <div class="col-md-4">
            <div class="thumbnail item-box live-preview">
                <span class="price-tag">$<span class="live-price"></span>0</span>
                <img src="./layout/images/holder.png" alt="holder" class="img-responsive"/>
                <div class="caption">
                  <h3 class="live-title">Title</h3>
                  <p class="live-desc">Description</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
<?php 
  } else {
    header('Location: login.php');
    exit();
  }
?>
<?php include $tpl."footer.php"; ?>