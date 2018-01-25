<?php 
  /*
  = Manage Categories Page
  = ADD | EDIT | DELETE Members
  */
  $pageTitle = "Categories";
  include 'init.php';
  if(isset($_SESSION['Username'])){
    $v = isset($_GET['v']) ? $_GET['v'] : 'Manage';
    if ($v == 'Manage') {
      // Manage Page
      include $cat.'show.php';
    }  
    elseif ($v == 'Add') {
      // Add Members
      include $cat.'add.php';
    } elseif ($v == 'Insert'){
      // Insert Member to db 
      include $cat.'insert.php';
    } elseif ($v == 'Edit') {
      // Edit Page
      include $cat.'edit.php';
    } elseif ($v == 'Update') {
      // Update Page
      include $cat.'update.php';
    } elseif($v == 'Delete') {
      // Delete Page
      include $cat.'Destroy.php';
    } 
  } else {
    $errorMsg = "Please Login.";
    redirectLink($errorMsg);
  }
  include $tpl.'footer.php';
?>