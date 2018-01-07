<?php
  // db
  include "connect.php";  
  // Routes
  $tpl = "includes/templates/"; // template dir
  $styles = "layout/styles/"; // styles dir
  $scripts = "layout/scripts/"; // scripts dir
  $lang = "includes/languages/" // lang dir
  // session
  session_start();
  // language
  include $lang."en.php";
  // header
  include $tpl."header.php";
  // Navbar
  if(!isset($noNavbar)){
    include $tpl."navbar.php";
  }
?>