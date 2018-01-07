<?php 
  function lang( $phrase ) {
    static $lang = array(
      // HomePage
      'MESSAGE' => 'Welcome',
      'ADMIN' => 'Administrator',
      // Login
      'LOGIN' => 'Admin Login',
      'USERLOGIN' => 'Username',
      'PASSLOGIN' => 'Password',
      // Navigation
      'BRAND' => 'eComZero',
      'HOME' => 'Home',
      'CAT' => 'Categories',
      'EDIT' => 'Edit',
      'SETTING' => 'Setting',
      'LOGOUT' => 'Logout'
    );
    
    return $lang[$phrase];
  }
?>