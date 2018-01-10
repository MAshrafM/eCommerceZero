<?php
  include 'init.php';
  if(isset($_SESSION['Username'])){
    $pageTitle = 'Dashboard';
    echo 'Welcome ' . $_SESSION['Username'];
    include $tpl."footer.php";
  } else {
    header('Location: index.php');
    exit();
  }
?>