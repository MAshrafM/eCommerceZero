<?php 
  $sort = 'asc';
  $sort_array = array('asc', 'desc');
  if(isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)) {
    $sort = $_GET['sort'];
  }
  // select all users except admins
  $stmt = $db->prepare("SELECT * FROM categories ORDER BY Ordering $sort");
  $stmt->execute();
  $rows = $stmt->fetchAll();
?>

<h1 class="text-center">Manage Categories</h1>
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
        <th>Category</th>
        <th>Description</th>
        <th>
          <?php 
            if($sort == 'asc'){
          ?>
              <a href="?sort=desc">Order <span class="caret"></span></a>
          <?php
            } else {
          ?>
              <a class="dropup" href="?sort=asc">Order <span class="caret"></span></a>
          <?php
            }
          ?>
        </th>
        <th>Visible</th>
        <th>Comment</th>
        <th>Ads</th>
        <th>Control</th>
      </tr>
      <?php foreach($rows as $row) { ?>
        <tr>
          <td><?php echo $row['ID']; ?></td>
          <td><?php echo $row['Name']; ?></td>
          <td><?php echo $row['Description']; ?></td>
          <td><?php echo $row['Ordering']; ?></td>
          <td><?php echo $row['Visibility'] ? 'No' : 'Yes'; ?></td>
          <td><?php echo $row['Allow_Comment'] ? 'No' : 'Yes'; ?></td>
          <td><?php echo $row['Allow_Ads'] ? 'No' : 'Yes'; ?></td>
          <td>
          <a href="?v=Edit&cid=<?php echo $row['ID']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
          <a href="?v=Delete&cid=<?php echo $row['ID']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i> Destroy</a>
          
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
                  <?php echo $row['Visibility'] ? "<span class='tag-r'>Hidden</span>" : ''; ?>
                  <?php echo $row['Allow_Comment'] ? "<span class='tag-y'>Comment Disabled</span>" : ''; ?>
                  <?php echo $row['Allow_Ads'] ? "<span class='tag-b'>Ads Disabled</span>" : ''; ?>
                </div>
                <div class="pull-right">
                  <a href="?v=Edit&cid=<?php echo $row['ID']; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                  <a href="?v=Delete&cid=<?php echo $row['ID']; ?>" class="btn btn-danger btn-sm confirm"><i class="fa fa-close"></i> Destroy</a>
                </div>
                <div class="clearfix"></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <a href="?v=Add" class="btn btn-primary"><i class="fa fa-plus"></i> New Category</a>
</div>