<?php 
  function lang( $phrase ) {
    static $lang = array(
      // HomePage
      'MESSAGE' => 'مرحبا',
      'ADMIN' => 'المدير'
    );
    
    return $lang[$phrase];
  }
?>