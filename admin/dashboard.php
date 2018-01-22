<?php
  $pageTitle = 'Dashboard';
  include 'init.php';
  if(isset($_SESSION['Username'])){
  // Dashboard
?>
<div class="container home-stats text-center">
  <h1 class="text-center">Dashboard</h1>
  <div class="row">
    <div class="col-md-3">
      <div class="stat st-members">
        Total Members
        <span><a href="/members.php"><?php echo countItems('UserID', 'users'); ?></a></span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat st-pending">
        Pending Members
        <span>200</span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat st-items">
        Total Items
        <span>200</span>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat st-comments">
        Total Comments
        <span>200</span>
      </div>
    </div>
  </div>
</div>
<div class="container latest">
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-users"></i> Latest Registered Users.
        </div>
        <div class="panel-body">
          TO DO 
        </div>
      </div>
    </div>
    
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-tag"></i> Latest Items.
        </div>
        <div class="panel-body">
          TO DO 
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    include $tpl."footer.php";
  } else {
    header('Location: index.php');
    exit();
  }
?>