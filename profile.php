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
          <div class="alert alert-danger">This User has no Ads</div>
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