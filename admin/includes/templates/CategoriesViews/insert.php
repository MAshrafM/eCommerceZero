<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $name = $_POST['name'];
    $desc = $_POST['description'];
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
      // check if category exists in db
      $check = checkItem("Name", "categories", $name);
      if ($check == 1){
        $errorCheck = "<div class='alert alert-danger'>Category Already Exists in db.</div>";
        redirectLink($errorCheck, 6);
      } else {    
        // Insert Category
        $stmt = $db->prepare("INSERT INTO categories(Name, Description, Ordering, Visibility, Allow_Comment, Allow_Ads) VALUES(:name, :desc, :ordering, :vis, :com, :ads) ");
        $stmt->execute(array(
          'name' => $name,
          'desc' => $desc,
          'ordering' => $ordering,
          'vis' => $vis,
          'com' => $com,
          'ads' => $ads
        ));
        $Msg = "<div class='alert alert-success'>Category Added</div>";
        redirectLink($Msg, 'back', 4);
      }
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
    $errorMsg = "<div class='alert alert-danger'>You Can not Brows This Page Directly.</div>";
    redirectLink($errorMsg, 6);
  }
?>
