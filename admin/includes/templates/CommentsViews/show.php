<?php 
  $query = '';
  if(isset($_GET['page']) && $_GET['page'] == 'Pending') {
    $query = 'AND Status = 0';
  }
  // select all users except admins
  $stmt = $db->prepare("SELECT comments.*, items.Name AS ItemName, users.Username AS UserName FROM comments
                        INNER JOIN items ON items.Item_ID = comments.tID
                        INNER JOIN users ON users.UserID = comments.uID
                        $query");
  $stmt->execute();
  $rows = $stmt->fetchAll();
?>

<h1 class="text-center">Manage Comments</h1>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="view-option pull-right">
        <span data-view='table' class="glyphicon glyphicon-th-list active"></span> 
        <span data-view='grid'class="glyphicon glyphicon-th-large"></span>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="view-table">
  <div class="table-responsive text-center">
    <table class="main-table table table-bordered">
      <tr>
        <th>#ID</th>
        <th>Comment</th>
        <th>Item Name</th>
        <th>User Name</th>
        <th>Added Date</th>
        <th>Control</th>
      </tr>
      <?php foreach($rows as $row) { ?>
        <tr>
          <td><?php echo $row['ComID']; ?></td>
          <td><?php echo $row['Comment']; ?></td>
          <td><?php echo $row['ItemName']; ?></td>
          <td><?php echo $row['UserName']; ?></td>
          <td><?php echo $row['ComDate']; ?></td>
          <td>
          <a href="?v=Edit&comid=<?php echo $row['ComID']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
          <a href="?v=Delete&comid=<?php echo $row['ComID']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i> Destroy</a>
          <?php
            if($row['Status'] == 0) {
          ?>
          <a href="?v=Activate&comid=<?php echo $row['ComID']; ?>" class="btn btn-info activate"><i class="fa fa-check"></i> Activate</a>
          <?php
            }
          ?>
        </td>
        </tr> 
      <?php } ?>
    </table>
  </div>
  </div>
  <div class="view-grid">
    <div class="row">
      <?php foreach($rows as $row) { ?>
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <i class="fa fa-tag"></i> <?php echo $row['UserName']; ?>
            </div>
            <div class="panel-body">
              <?php if($row['Comment'] == '') {
                echo 'No Comment for this item';
              } else {
              ?>
              
                <p><?php echo $row['Comment']; ?></p>
              <?php
              }
              ?>
            </div>
            <div class="panel-footer">
                <div class="pull-left">
                  <span class="tag-r"><?php echo $row['ItemName']; ?></span>   
                  <span class="tag-b"><?php echo $row['ComDate']; ?></span>
                </div>
                <div class="pull-right">
                  <a href="?v=Edit&comid=<?php echo $row['ComID']; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                  <a href="?v=Delete&comid=<?php echo $row['ComID']; ?>" class="btn btn-danger btn-sm confirm"><i class="fa fa-close"></i> Destroy</a>
                  <?php
                    if($row['Status'] == 0) {
                  ?>
                  <a href="?v=Approve&comid=<?php echo $row['ComID']; ?>" class="btn btn-info btn-sm activate"><i class="fa fa-check"></i> Approve</a>
                  <?php
                    }
                  ?>
                </div>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
