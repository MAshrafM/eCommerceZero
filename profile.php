<?php
  $pageTitle = 'Profile';
  include "init.php";
  
  if(isset($_SESSION['user'])){
    $getUser = $db->prepare("SELECT * FROM users WHERE Username = ?");
    $getUser = execute(array($_SESSION['user']));
    $info = $getUser->fetch();
?>
<h1 class="text-center"> Profile </h1>
<div class="info block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        My Information
      </div>
      <div class="panel-body">
      
      </div>
    </div>
  </div>
</div>
  
<div class="Ads block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        My Ads
      </div>
      <div class="panel-body">
      
      </div>
    </div>
  </div>
</div>

<div class="Comments block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        My Comments
      </div>
      <div class="panel-body">
      
      </div>
    </div>
  </div>
</div>
<?php 
  } else {
    header('Location: login.php');
    exit();
  }
?>
<?php include $tpl."footer.php"; ?>