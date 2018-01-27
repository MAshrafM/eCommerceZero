<?php 
  /*
  = Manage Item Page
  = ADD | EDIT | DELETE Items
  */
  $pageTitle = "Items";
  include 'init.php';
  if(isset($_SESSION['Username'])){
    $v = isset($_GET['v']) ? $_GET['v'] : 'Manage';
    if ($v == 'Manage') {
      // Manage Page
      include $item.'show.php';
    }  
    elseif ($v == 'Add') {
      // Add Members
      include $item.'add.php';
    } elseif ($v == 'Insert'){
      // Insert Member to db 
      include $item.'insert.php';
    } elseif ($v == 'Edit') {
      // Edit Page
      include $item.'edit.php';
    } elseif ($v == 'Update') {
      // Update Page
      include $item.'update.php';
    } elseif($v == 'Delete') {
      // Delete Page
      include $item.'Destroy.php';
    } elseif($v == 'Approve') {
      // Approve Page
      include $item.'Approve.php';
    }
  } else {
    $errorMsg = "Please Login.";
    redirectLink($errorMsg);
  }
  include $tpl.'footer.php';
?>