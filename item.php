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

<?php
  } else {
    $Msg = "<p class='alert alert-danger'>There is Such ID for this item</p>"
    redirectLink($Msg)
  }
?>
<?php include $tpl."footer.php"; ?>