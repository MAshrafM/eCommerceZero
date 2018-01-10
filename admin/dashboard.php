<?php
  $pageTitle = 'Dashboard';
  include 'init.php';
  if(isset($_SESSION['Username'])){
    echo 'Welcome ' . $_SESSION['Username'];
    include $tpl."footer.php";
  } else {
    header('Location: index.php');
    exit();
  }
?>