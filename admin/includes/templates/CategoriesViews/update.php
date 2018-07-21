<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $id = $_POST['catid'];
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $parent = $_POST['parent'];
    $ordering = $_POST['ordering'];
    $vis = $_POST['visible'];
    $com = $_POST['commenting'];
    $ads = $_POST['ads'];
    // validate form
    $formErrors = array();
    if(empty($name)){$formErrors[] = 'Category Name can not be empty';}
   
?>
<div class="container">
  <h1 class="text-center">Update Category</h1>
  <?php 
    if(empty($formErrors)){
      // update query
      $stmt = $db->prepare("UPDATE categories SET Name = ?, Description = ?, parent = ?, Ordering = ?, Visibility = ?, Allow_Comment = ?, Allow_Ads = ? WHERE ID = ?");
      $stmt->execute(array($name, $desc, $parent, $ordering, $vis, $com, $ads, $id)); 
      $Msg = "<div class='alert alert-success'>Category Updated</div>";
      redirectLink($Msg, 'back', 4);
      
    } else {
    // Show Errors
  ?>
    <div class="alert alert-danger">
      <ul>
      <?php foreach($formErrors as $error) { ?>
        <li><?php echo $error; ?></li>
      <?php } ?>
      </ul>
    </div>
  <?php
    }
  ?>
</div>
<?php 
  } else {
    $errorMsg = "<div class='alert alert-danger'>You Can not Browse This Page Directly.</div>";
    redirectLink($errorMsg, 6);
  }
?>
