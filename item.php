<?php
  $pageTitle = 'Item';
  include "init.php";
  $itemID = isset($_GET['tid']) && is_numeric($_GET['tid']) ? intval($_GET['tid']) : 0;
  $stmt = $db->prepare("
              SELECT items.*, 
                     categories.Name AS category_name
                     users.Username
              FROM items
              INNER JOIN categories
              ON categories.ID = items.Cat_ID
              INNER JOIN users
              ON users.UserID = items.Member_ID
              WHERE Item_ID = ?");
  $stmt->execute(array($itemID));
  $count = $stmt->rowCount();
  // check errors
  if($count > 0){
    $item = $stmt->fetch();
  
?>
<h1 class="text-center"> <?php echo $item['Name']; ?> </h1>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <img src="./layout/images/holder.png" alt="holder" class="img-responsive img-thumbnail center-block"/>
    </div>
    <div class="col-md-9 item-info">
      <h2><?php echo $item['Name']; ?></h2>
      <p><?php echo $item['Description']; ?></p>
      <ul class="list-unstyled">
        <li><i class="fa fa-calender fa-fw"></i><span>Added Date</span> :<?php echo $item['Add_Date']; ?></li>
        <li><i class="fa fa-money fa-fw"></i><span>Price</span> : $<?php echo $item['Price']; ?></li>
        <li><i class="fa fa-building fa-fw"></i><span>Made In</span> : <?php echo $item['Country_Made']; ?></li>
        <li><i class="fa fa-tag fa-fw"></i><span>Category </span>: <a href="categories.php?cid=<?php echo $item['Cat_ID']; ?>&cname=<?php echo str_replace(" ", "-", $item['category_name']); ?>"><?php echo $item['category_name']; ?></a></li>
        <li><i class="fa fa-user fa-fw"></i><span>Added By</span> : <a href="#"><?php echo $item['Username']; ?></a></li>
      </ul>
    </div>
  </div>
  <hr class="chr">
    <div class="row">
      <div class="col-md-offset-3">
        <?php if(isset($_SESSION['user'])) { ?>
        <div class="add-comment">
          <h3>Add Your Comment: </h3>
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?tid=' . $item['Item_ID']; ?>">
            <textarea name="comment"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-primary">
          </form>
          <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
              $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
              $uid = $item['Member_ID'];
              $tid = $_SESSION['uid'];
              
              if(!empty($comment)){
                $stmt = $db->prepare("INSERT INTO comments(comment, status, comment_date, tid, uid) VALUES(:comment, 0, NOW(), :tid, :uid)");
                $stmt->execute(array(
                  ':comment' => $comment,
                  ':tid' => $tid,
                  ':uid' => $uid
                ));
                if($stmt) {echo '<div class="alert alert-success">Added Comment</div>';}
              }
            }
          ?>
        </div>
        <?php } else { ?>
          <h3><a href="login.php">Login or Register</a> to Add Comments.</h3>
        <?php ?>
      </div>
    </div>
  <hr class="chr">
  <?php
      $stmt = $db->prepare("SELECT comments.*, users.Username AS UserName FROM comments
      INNER JOIN users ON users.UserID = comments.uID
      WHERE tid = ? AND status = 1
      ORDER BY ComID DESC");
      $stmt->execute(array($item['Item_ID']));
      $rows = $stmt->fetchAll();
      foreach($comments as $comment) {
            
  ?>
    <div class="row">
      <div class="col-md-3">
        <?php echo $comment['UserName']; ?>
      </div>
      <div class="col-md-9">
        <?php echo $comment['comment']; ?>
      </div>
    </div>
  <?php } ?>
  
</div>
<?php
  } else {
    // error msg and redirect
    $Msg = "<p class='alert alert-danger'>There is Such ID for this item</p>"
    redirectLink($Msg)
  }
?>
<?php include $tpl."footer.php"; ?>