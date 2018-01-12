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
      
    } elseif ($v == 'Edit') {
      // Edit Page
      include $tpl.'edit.php';
    } elseif ($v == 'Update') {
      // Update Page
      include $tpl.'update.php';
    } elseif($v == 'Delete') {
      // Delete Page
      
    }
    
    include $tpl.'footer.php';
  } else {
    header('Location: index.php');
    exit();
  }
?>