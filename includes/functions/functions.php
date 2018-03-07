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
    Get Records.
    select a field from a table with a limit number of records
  */
  function getAll($table){
    global $db;
    $latest = $db->prepare("SELECT * From $table");
    $latest->execute();
    $rows = $latest->fetchAll();
    return $rows;
  }
  /*
    Get All Items in a category.
    select a field from a table with a limit number of records
  */
  function getAllItems($cid){
    global $db;
    $latest = $db->prepare("SELECT * From items WHERE Cat_ID = ? ORDER BY Item_ID DESC");
    $latest->execute(array($cid));
    $rows = $latest->fetchAll();
    return $rows;
  }
  /* 
    Get Some Items
    Dependent on what we pass in for the where 
  */
  function getItems($where, $value){
    global $db;
    $items = $db->prepare("SELECT * From items WHERE $where = ? ORDER BY Item_ID DESC");
    $items->execute(array($value));
    $rows = $items->fetchAll();
    return $rows;
  }
  /*
    Check User Status
    Check whether a user is activated or not
  */
  function checkUserStatus($user){
    global $db;
    $stmt = $db->prepare("SELECT Username, RegStatus FROM users WHERE Username = ? AND RegStatus = 0");
    $stmt->execute(array($user));
    $status = $stmt->rowCount();
    return $status;
  }
  /*
    Get User Info
    Return User information using username stored in Session
  */
  function getUserInfo($uid){
    global $db;
    $getUser = $db->prepare("SELECT * FROM users WHERE Username = ?");
    $getUser = execute(array($uid);
    $info = $getUser->fetch();
    return $info;
  }
?>