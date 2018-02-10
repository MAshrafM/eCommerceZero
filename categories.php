<?php 
  $pageTitle = str_replace("-", " ", $_GET['cname']);
  include "init.php";
  
  $items = getAllItems($_GET['cid']);
?>
<div class="container">
  <h1 class="text-center"><?php echo str_replace("-", " ", $_GET['cname']); ?> </h1>
  <?php 
    if(empty($items)){
  ?>
    <div class="alert alert-danger">No Items in This Category</div>
  <?php 
    } else {
      forEach($items as $item) {
        echo $item['Name'];
  ?>
      
  <?php
      }
    }
  ?>
</div>
<?php include $tpl."footer.php"; ?>