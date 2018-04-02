<?php
  $pageTitle = 'Item';
  include "init.php";
  $itemID = isset($_GET['tid']) && is_numeric($_GET['tid']) ? intval($_GET['tid']) : 0;
  $stmt = $db->prepare("SELECT * FROM items WHERE Item_ID = ?");
  $stmt->execute(array($itemID));
  $item = $stmt->fetch();
  
?>
<h1 class="text-center"> <?php echo $item['Name']; ?> </h1>


<?php include $tpl."footer.php"; ?>