<?php
  $pageTitle = 'Dashboard';
  include 'init.php';
  if(isset($_SESSION['Username'])){
  // Dashboard
  
  $latestUsers = getLatest("*", "users", "UserID");
  $latestItems = getLatest("*", "items", "Item_ID")
?>
<div class="container home-stats text-center">
  <h1 class="text-center">Dashboard</h1>
  <div class="row">
    <div class="col-md-3">
      <div class="stat st-members">
        <i class="fa fa-users"></i>
        <div class="info">
          Total Members
          <span><a href="./members.php"><?php echo countItems('UserID', 'users'); ?></a></span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat st-pending">
        <i class="fa fa-plus"></i>
        <div class="info">
          Pending Members
          <span><a href="./members.php?v=Manage&page=Pending"><?php echo checkItem('RegStatus', 'users', 0); ?></a></span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat st-items">
        <i class="fa fa-tag"></i>
        <div class="info">
          Total Items
          <span><a href="./items.php"><?php echo countItems('Item_ID', 'items'); ?></a></span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="stat st-comments">
        <i class="fa fa-comments"></i>
        <div class="info">
          Total Comments
          <span>200</span>
        </div>
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
          <ul class="list-unstyled latest-users">
            <?php 
              foreach ($latestUsers as $user){
            ?>
              <li>
                <?php echo $user['Username']; ?> 
                <a href="./members.php?v=Edit&uid=<?php echo $user['UserID']; ?>">
                  <span class="btn btn-primary pull-right">
                    <i class="fa fa-edit"></i> 
                      Edit
                  </span>
                </a>
                <?php
                  if($user['RegStatus'] == 0) {
                ?>
                  <a href="./members.php?v=Activate&uid=<?php echo $user['UserID']; ?>">
                    <span class="btn btn-info pull-right">
                      <i class="fa fa-check"></i> Activate
                    </span>
                  </a>
                <?php
                  }
                ?>                
              </li>
            <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-tag"></i> Latest Items.
        </div>
        <div class="panel-body">
          <ul class="list-unstyled latest-users">
            <?php 
              foreach ($latestItems as $item){
            ?>
              <li>
                <?php echo $item['Name']; ?> 
                <a href="./items.php?v=Edit&tid=<?php echo $item['Item_ID']; ?>">
                  <span class="btn btn-primary pull-right">
                    <i class="fa fa-edit"></i> 
                      Edit
                  </span>
                </a>
                <?php
                  if($item['Approve'] == 0) {
                ?>
                  <a href="./items.php?v=Approve&tid=<?php echo $item['ItemID']; ?>">
                    <span class="btn btn-info pull-right">
                      <i class="fa fa-check"></i> Aprrove
                    </span>
                  </a>
                <?php
                  }
                ?>                
              </li>
            <?php
              }
            ?>
          </ul>
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