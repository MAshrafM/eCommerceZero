<?php 
  /*
  = Manage Member Page
  = ADD | EDIT | DELETE Members
  */
  $pageTitle = "Members";
  include 'init.php';
  if(isset($_SESSION['Username'])){
    $v = isset($_GET['v']) ? $_GET['v'] : 'Manage';
    if ($v == 'Manage') {
      // Manage Page
      include $tpl.'show.php';
    }  
    elseif ($v == 'Add') {
      // Add Members
      include $tpl.'add.php';
    } elseif ($v == 'Insert'){
      // Insert Member to db 
      include $tpl.'insert.php';
    } elseif ($v == 'Edit') {
      // Edit Page
      include $tpl.'edit.php';
    } elseif ($v == 'Update') {
      // Update Page
      include $tpl.'update.php';
    } elseif($v == 'Delete') {
      // Delete Page
      include $tpl.'Destroy.php';
    }
  } else {
    $errorMsg = "Please Login.";
    redirectHome($errorMsg);
  }
  include $tpl.'footer.php';
?>