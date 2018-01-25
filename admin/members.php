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
      include $memv.'show.php';
    }  
    elseif ($v == 'Add') {
      // Add Members
      include $memv.'add.php';
    } elseif ($v == 'Insert'){
      // Insert Member to db 
      include $memv.'insert.php';
    } elseif ($v == 'Edit') {
      // Edit Page
      include $memv.'edit.php';
    } elseif ($v == 'Update') {
      // Update Page
      include $memv.'update.php';
    } elseif($v == 'Delete') {
      // Delete Page
      include $memv.'Destroy.php';
    } elseif($v == 'Activate'){
      // Activate Pending Members
      include $memv.'Activate.php';
    }
  } else {
    $errorMsg = "Please Login.";
    redirectLink($errorMsg);
  }
  include $tpl.'footer.php';
?>