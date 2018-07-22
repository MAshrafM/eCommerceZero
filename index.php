<?php
  $pageTitle = 'Home';
  include "init.php";
  
  $items = get("*", "items", "WHERE Approve = 1", "Item_ID");
?>
  
  
  <div class="container">
  <div class="row">
  <?php 
    if(empty($items)){
  ?>
    <div class="alert alert-danger">No Items Yet.</div>
  <?php 
    } else {
      forEach($items as $item) {
  ?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail item-box">
          <span class="price-tag">$<?php echo $item['Price']; ?></span>
          <img src="./layout/images/holder.png" alt="holder" class="img-responsive"/>
          <div class="caption">
            <h3><a href="item.php?tid=<?php echo $item['Item_ID']; ?>"><?php echo $item['Name']; ?></a></h3>
            <p><?php echo $item['Description'];?></p>
            <p class="date"><?php echo $item['Add_Date']; ?></p>
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