<?php
  if(isset($_SESSION['Username'])){
    include 'init.php';
    echo 'Welcome ' . $_SESSION['Username'];
    include $tpl."footer.php";
  } else {
    header('Location: index.php');
    exit();
  }
?>