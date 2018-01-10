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
      'ITEMS' => 'Items',
      'MEMBERS' => 'Members',
      'STATISTICS' => 'Statistics',
      'LOGS' => 'Logs',
      'EDIT' => 'Edit',
      'SETTING' => 'Setting',
      'LOGOUT' => 'Logout',
      // MEMBERS
      'EMAIL' => 'Email',
      'FULLNAME' => 'Full Name',
      'SAVE' => 'Save'
    );
    
    return $lang[$phrase];
  }
?>