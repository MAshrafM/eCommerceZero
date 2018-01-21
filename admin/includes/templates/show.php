<?php 
  // select all users except admins
  $stmt = $db->prepare("SELECT * FROM users WHERE GroupID != 1");
  $stmt->execute();
  $rows = $stmt->fetchAll();
?>

<h1 class="text-center">Manage Members</h1>
<div class="container">
  <div class="table-responsive text-center">
    <table class="main-table table table-bordered">
      <tr>
        <th>#ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Full Name</th>
        <th>Register Date</th>
        <th>Control</th>
      </tr>
      <?php foreach($rows as $row) { ?>
        <tr>
          <td><?php echo $row['UserID']; ?></td>
          <td><?php echo $row['Username']; ?></td>
          <td><?php echo $row['Email']; ?></td>
          <td><?php echo $row['FullName']; ?></td>
          <td><?php echo $row['Date']; ?></td>
          <td>
          <a href="?v=Edit&uid=<?php echo $row['UserID']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
          <a href="?v=Delete&uid=<?php echo $row['UserID']; ?>" class="btn btn-danger confirm"><i class="fa fa-close"></i>Destroy</a>
        </td>
        </tr> 
      <?php } ?>
    </table>
  </div>
  <a href="?v=Add" class="btn btn-primary"><i class="fa fa-plus"></i> New Member</a>
</div>