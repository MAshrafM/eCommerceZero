<?php
  $pageTitle = 'Profile';
  include "init.php";
  
  if(isset($_SESSION['user'])){
    $info = $getUserInfo($_SESSION['user']);
    $items = $getItems('Member_ID', $info['UserID']);
    $comments = $getUserCom($info['UserID']);
?>
<h1 class="text-center"> Profile </h1>
<div class="info block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        My Information
      </div>
      <div class="panel-body">
        <ul class="list-unstyled">
          <li><i class="fa fa-unlock-alt fa-fw"></li><span>Name:</span> <?php echo $info['Username']; ?></li>
          <li><i class="fa fa-envelop-o fa-fw"></li><span>Email:</span> <?php echo $info['Email']; ?></li>
          <li><i class="fa fa-user fa-fw"></li><span>Full Name:</span> <?php echo $info['FullName'] ? $info['FullName'] : $info['Username']; ?></li>
          <li><i class="fa fa-calender fa-fw"></li><span>Register Date:</span> <?php echo $info['Date']; ?></li>
          <li><i class="fa fa-tags fa-fw"></li><span>Favorite Categories:</span> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
  
<div class="Ads block">
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">
        Ads
      </div>
      <div class="panel-body">
        <?php 
          if(empty($items)){
        ?>
          <div class="alert alert-danger">This User has no Ads, Create <a href="newad.php">New Ad</a>.</div>
        <?php 
          } else {
            forEach($items as $item) {
        ?>
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail item-box">
                <span class="price-tag"><?php echo $item['Price']; ?></span>
                <img src="./layout/images/holder.png" alt="holder" class="img-responsive"/>
                <div class="caption">
                  <h3><?php echo $item['Name']; ?></h3>
                  <p><?php echo $item['Description'];?></p>
                  <p class="date"><?php $item['Add_Date']; ?></p>
                </div>
              </div>
            </div>
        <?php
            }
          }
        ?>
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
        <?php 
          if(empty($comments)){
        ?>
          <div class="alert alert-danger">This User has no Comments</div>
        <?php 
          } else {
            forEach($comments as $comment) {
        ?>
            <p><?php echo $comment['Comment'];?></p>
        <?php
            }
          }
        ?>
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