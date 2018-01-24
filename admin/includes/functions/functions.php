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
    Takes a msg, a url and an optional time duration before redirect.
    return a msg with a delay then redirect to the given url or to homepage if not.
  */
  function redirectLink($Msg, $url = null, $seconds = 3){
    if($url == null){
      $url = 'index.php';
    } else {
      if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
        $url = $_SERVER['HTTP_REFERER'];
      } else {
        $url = 'index.php';
      }
    }
    echo $Msg;
    echo "
      <div class='alert alert-info'>
        You will be redirected to $url in $seconds seconds.
      </div>
    ";
    header("refresh: $seconds; url=$url");
    exit();
  }
  /*
    Check Item Function
    check item in db 
    Takes an item to select, and a table to be select from and the value of the selection
    return number if an item is found
  */
  function checkItem($select, $from, $value){
    global $db;
    $statment = $db->prepare("SELECT $select FROM $from WHERE $select = ? ");
    $statment->execute(array($value));
    $count = $statment->rowCount();
    return $count;
  }
  /*
    Count number of Items
    takes an Item to be counted and the table of the item
    return the number of items found in that table.
  */
  function countItems($item, $table) {
    $global $db;
    $selection = $db->prepare("SELECT COUNT($item) FROM $table");
    $selection->execute();
    return $selection->fetchColumn();
  }
  /*
    Get Latest Records.
    select a field from a table with a limit number of records
  */
  function getLatest($select, $table, $order, $limit = 5){
    $global $db;
    $latest = $db->prepare("SELECT $select From $table ORDER BY $order DESC LIMIT $limit");
    $latest->execute();
    $rows = $latest->fetchAll();
    return $rows;
  }
?>