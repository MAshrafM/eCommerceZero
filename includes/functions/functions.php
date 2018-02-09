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
?>