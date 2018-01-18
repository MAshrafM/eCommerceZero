<?php 
  /*
    getTitle() Function that echo page titles in case pageTitle is defined
    else it echos a default title for other pages.
  */
  function getTitle(){
    global $pageTitle;
    if(isset($pageTitle)){
      echo $pageTitle;
    } else {
      echo 'Default';
    }
  }
  /*
    Redirect function
    Takes an error msg and an optional time duration before redirect.
  */
  function redirectHome($errorMsg, $seconds = 3){
    echo "
      <div class='container text-center'>
        <div class='alert alert-danger'>".
          $errorMsg.
        "</div>
    ";
    echo "
        <div class='alert alert-info'>
          You will be redirected to Homepage in ". $seconds ." seconds.
        </div>
      </div>
    ";
    header("refresh: $seconds; url=index.php");
    exit();
  }
  /*
    Check Item Function
    check item in db 
  */
  function checkItem($select, $from, $value){
    global $db;
    $statment = $db->prepare("SELECT $select FROM $from WHERE $select = ? ");
    $statment->execute(array($value));
    $count = $statment->rowCount();
    return $count;
  }
?>