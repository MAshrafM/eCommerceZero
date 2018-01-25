<?php
  // db
  include "connect.php";  
  // Routes
  $tpl = "includes/templates/"; // template dir
  $memv = "includes/templates/MembersViews/"; // member views templates
  $styles = "layout/styles/"; // styles dir
  $scripts = "layout/scripts/"; // scripts dir
  $lang = "includes/languages/"; // lang dir
  $func = "includes/functions/"; // functions dir
  // session
  session_start();
  // language
  include $lang."en.php";
  // functions
  include $func."functions.php";
  // header
  include $tpl."header.php";
  // Navbar
  if(!isset($noNavbar)){
    include $tpl."navbar.php";
  }
?>