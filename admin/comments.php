<?php 
  /*
  = Manage Comment Page
  = ADD | EDIT | DELETE Comments
  */
  $pageTitle = "Comments";
  include 'init.php';
  if(isset($_SESSION['Username'])){
    $v = isset($_GET['v']) ? $_GET['v'] : 'Manage';
    if ($v == 'Manage') {
      // Manage Page
      include $com.'show.php';
    } elseif ($v == 'Insert'){
      // Insert Comment to db 
      include $com.'insert.php';
    } elseif ($v == 'Edit') {
      // Edit Page
      include $com.'edit.php';
    } elseif ($v == 'Update') {
      // Update Page
      include $com.'update.php';
    } elseif($v == 'Delete') {
      // Delete Page
      include $com.'Destroy.php';
    } elseif($v == 'Activate'){
      // Activate Pending Comments
      include $com.'Activate.php';
    }
  } else {
    $errorMsg = "Please Login.";
    redirectLink($errorMsg);
  }
  include $tpl.'footer.php';
?>