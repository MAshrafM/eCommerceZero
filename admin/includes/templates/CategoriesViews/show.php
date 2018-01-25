<?php 
  // select all users except admins
  $stmt = $db->prepare("SELECT * FROM categories");
  $stmt->execute();
  $rows = $stmt->fetchAll();
?>

<h1 class="text-center">Manage Categories</h1>
<div class="container">
  <div class="table-responsive text-center">
    <table class="main-table table table-bordered">
      <tr>
        <th>#ID</th>
        <th>Category</th>
        <th>Description</th>
        <th>Order</th>
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
  <a href="?v=Add" class="btn btn-primary"><i class="fa fa-plus"></i> New Category</a>
</div>