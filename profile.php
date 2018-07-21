<?php
  $pageTitle = 'Profile';
  include "init.php";
  
  if(isset($_SESSION['MemberName'])){
    $info = getUserInfo($_SESSION['MemberName']);
    $items = getItems('Member_ID', $info['UserID'], 1);
    $comments = getUserCom($info['UserID']);
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
          <li><i class="fa fa-unlock-alt fa-fw"></i> <span>Name</span> : <?php echo $info['Username']; ?></li>
          <li><i class="fa fa-envelope-o fa-fw"></i> <span>Email</span> : <?php echo $info['Email']; ?></li>
          <li><i class="fa fa-user fa-fw"></i> <span>Full Name</span> : <?php echo $info['FullName'] ? $info['FullName'] : $info['Username']; ?></li>
          <li><i class="fa fa-calendar fa-fw"></i> <span>Register Date</span> : <?php echo $info['Date']; ?></li>
          <li><i class="fa fa-tags fa-fw"></i> <span>Fav Categories</span> : </li>
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
                <span class="price-tag">$<?php echo $item['Price']; ?></span>
                <?php if($item['Approve'] == 0) { ?>
                  <span class="approve-status">Waiting Approval</span> 
                <?php } ?>
                <img src="./layout/images/holder.png" alt="holder" class="img-responsive"/>
                <div class="caption">
                  <h3><a href="item.php?tid=<?php echo $item['item_ID']; ?>"><?php echo $item['Name']; ?></a></h3>
                  <p><?php echo $item['Description'];?></p>
                  <p class="date"><?php echo $item['Add_Date']; ?></p>
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