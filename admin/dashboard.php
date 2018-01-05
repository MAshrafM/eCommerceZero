<?php
  if(isset($_SESSION['Username'])){
    echo 'Welcome ' . $_SESSION['Username'];
  } else {
    header('Location: index.php');
    exit();
  }
?>