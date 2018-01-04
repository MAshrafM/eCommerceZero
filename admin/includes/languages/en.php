<?php 
  function lang( $phrase ) {
    static $lang = array(
      // HomePage
      'MESSAGE' => 'Welcome',
      'ADMIN' => 'Administrator'
    );
    
    return $lang[$phrase];
  }
?>