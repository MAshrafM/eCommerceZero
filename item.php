<?php
  $pageTitle = 'Item';
  include "init.php";
  $itemID = isset($_GET['tid']) && is_numeric($_GET['tid']) ? intval($_GET['tid']) : 0;
  $stmt = $db->prepare("SELECT * FROM items WHERE Item_ID = ?");
  $stmt->execute(array($itemID));
  $count = $stmt->rowCount();
  if($count > 0){
    $item = $stmt->fetch();
  
?>
<h1 class="text-center"> <?php echo $item['Name']; ?> </h1>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <img src="./layout/images/holder.png" alt="holder" class="img-responsive img-thumbnail center-block"/>
    </div>
    <div class="col-md-9">
      <h2><?php echo $item['Name']; ?></h2>
      <p><?php echo $item['Description']; ?></p>
      <span><?php echo $item['Add_Date']; ?></span>
      <div>Price: $<?php echo $item['Price']; ?></div>
      <div>Made In: <?php echo $item['Country_Made']; ?></div>
    </div>
  </div>
</div>
<?php
  } else {
    $Msg = "<p class='alert alert-danger'>There is Such ID for this item</p>"
    redirectLink($Msg)
  }
?>
<?php include $tpl."footer.php"; ?>