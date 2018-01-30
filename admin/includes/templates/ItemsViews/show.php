<?php 
  // select all users except admins
  $stmt = $db->prepare("
        SELECT 
          items.*,
          categories.Name AS Cat_Name,
          users.Username AS Member_Name 
        FROM items 
        INNER JOIN categories ON categories.ID = items.Cat_ID 
        INNER JOIN users ON users.UserID = items.Member_ID"
  );
  $stmt->execute();
  $rows = $stmt->fetchAll();
?>

<h1 class="text-center">Manage Items</h1>
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
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Date</th>
        <th>Category</th>
        <th>User</th>
        <th>Control</th>
      </tr>
      <?php foreach($rows as $row) { ?>
        <tr>
          <td><?php echo $row['Item_ID']; ?></td>
          <td><?php echo $row['Name']; ?></td>
          <td><?php echo $row['Description']; ?></td>
          <td><?php echo $row['Price']; ?></td>
          <td><?php echo $row['Add_Date']; ?></td>
          <td><?php echo $row['Cat_Name']; ?></td>
          <td><?php echo $row['Member_Name']; ?></td>
          <td>
            <a href="?v=Edit&tid=<?php echo $row['Item_ID']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
            <a href="?v=Delete&tid=<?php echo $row['Item_ID']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i> Destroy</a>
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
              <i class="fa fa-tag"></i> <?php echo $row['Name']; ?>
            </div>
            <div class="panel-body">
              <?php if($row['Description'] == '') {
                echo 'No Description for this category';
              } else {
              ?>
              
                <p><?php echo $row['Description']; ?></p>
              <?php
              }
              ?>
            </div>
            <div class="panel-footer">
                <div class="pull-left">
                  <span class="tag-r"><?php echo $row['Cat_Name']; ?></span>   
                  <span class="tag-y"><?php echo $row['Member_Name']; ?></span>
                </div>
                <div class="pull-right">
                  <a href="?v=Edit&tid=<?php echo $row['Item_ID']; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                  <a href="?v=Delete&tid=<?php echo $row['Item_ID']; ?>" class="btn btn-danger btn-sm confirm"><i class="fa fa-close"></i> Destroy</a>
                </div>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <a href="?v=Add" class="btn btn-primary"><i class="fa fa-plus"></i> New Item</a>
</div>