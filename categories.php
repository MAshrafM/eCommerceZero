<?php 
  $pageTitle = $_GET['cname']) ? str_replace("-", " ", $_GET['cname']) : "General Items";
  include "init.php";
  // get item in category
  $items = getAllItems($_GET['cid']);
?>
<div class="container">
  <h1 class="text-center"><?php echo $_GET['cname']) ? str_replace("-", " ", $_GET['cname']): "General Item"; ?> </h1>
  <div class="row">
  <?php 
    if(empty($items)){
  ?>
    <div class="alert alert-danger">No Items in This Category</div>
  <?php 
    } else {
      forEach($items as $item) {
  ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail item-box">
          <span class="price-tag"><?php echo $item['Price']; ?></span>
          <img src="./layout/images/holder.png" alt="holder" class="img-responsive"/>
          <div class="caption">
            <h3><?php echo $item['Name']; ?></h3>
            <p><?php echo $item['Description'];?></p>
          </div>
        </div>
      </div>
  <?php
      }
    }
  ?>
  </div>
</div>
<?php include $tpl."footer.php"; ?>